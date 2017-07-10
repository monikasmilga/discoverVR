@extends('admin.core')

@section('content')

    <div id="list">
        <div id="pagetitle">
            {{ $pageTitle }}
        </div>


        {!! Form::open(['url' => $route, 'files' => true]) !!}

        @foreach($fields as $field)

            {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}<br/>



            @if($field['type'] == 'dropdown')

                @if(isset($record[$field['key']]))

                    @if (in_array($field['key'], ['language_code', 'user_id', 'status', 'time', 'experience_id']))

                        {{--@if($field['key'] == 'language_code' || $field['key'] == 'user_id' || $field['key'] == 'status' || $field['key'] == 'time' || $field['key'] == 'experience_id')--}}

                        {{Form::select($field['key'], $field['options'], $record[$field['key']])}}<br/>

                    @else
                        {{Form::select($field['key'], $field['options'], $record[$field['key']], ['placeholder' => ''])}}
                        <br/>
                    @endif

                @else
                    @if($field['key'] == 'language_code' || $field['key'] == 'user_id' || $field['key'] == 'status' || $field['key'] == 'time' || $field['key'] == 'experience_id')

                        {{Form::select($field['key'], $field['options'])}}<br/>

                    @else
                        {{Form::select($field['key'], $field['options'], null, ['placeholder' => ''])}}<br/>
                    @endif
                @endif


            @elseif($field['type'] == 'singleline')

                @if(isset($record[$field['key']]))
                    {{Form::text($field['key'], $record[$field['key']])}}<br/>
                @else
                    {{Form::text($field['key'])}}<br/>
                @endif


            @elseif($field['type'] == 'checkbox')

                @foreach($field['options'] as $option)


                    @if(isset($record[$field['key']]))
                        {{Form::checkbox($option['name'], $option['value'], $record[$field['key']])}}
                    @else
                        {{Form::checkbox($option['name'], $option['value'])}}
                    @endif


                    {!! Form::label($option['title']) !!}<br/>
                @endforeach

            @elseif($field['type'] == 'textarea')
                @if(isset($record[$field['key']]))
                    {{Form::textarea($field['key'], $record[$field['key']])}}<br/>
                @else
                    {{Form::textarea($field['key'])}}<br/>
                @endif

            @elseif($field['type'] == 'file')
                @if(isset($record[$field['key']]))
                    <img src="{{asset ($record['path'])}}">

                    {{Form::file('file'),$record[$field['key']]}}
                @else
                    {{Form::file('file')}}
                @endif

            @elseif($field['type'] == 'reservations')
                <div id="reservations"></div>
                <div id="reservations-invisible" style="display: none;"></div>
            @endif




        @endforeach

        <div style="padding-top: 20px">
            {{ Form::submit(trans('app.submit')) }}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script>

        $('#language_code').bind("change", function () {
//            console.log(window.location.href)
            window.location.href = "?language_code=" + $('#language_code').val()
//            alert($('#language_code').val())
        })

        function getAvailableHours() {
            $.ajax({
                url: '{{route('app.order.reservation')}}',
                type: 'GET',
                data: {
                    time: $('#time').val(),
                    experience_id: $('#experience_id').val(),
                },
                success: function (response) {

                    generateCheckBoxes($('#time').val(), response);
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }

        if ($('#time').length > 0 && $('#experience_id').length > 0) {

            $('#time').bind("change", getAvailableHours);
            $('#experience_id').bind("change", getAvailableHours);

            function prepareForCheckBox(day, reserved) {

                // new date
                var date = new Date(day + ' 00:00:00');

                // checking if date is today
                if (date.toDateString() == new Date().toDateString())
                    date = new Date();

                // closing time property
                var closingTime = 22;

                // opening time property
                var openingTime = 10;

                // available times for this
                var availableTimes = [];

                // allow reservation 2 hours from now
                date.setHours(date.getHours() + 2);

                // moving minutes to dividable by 10
                date.setMinutes(Math.ceil(date.getMinutes() / 10) * 10);

                // while it is not closing time execute
                while (date.getHours() < closingTime) {
                    // cheking if hours are more than opening time
                    if (date.getHours() >= openingTime) {
                        // creating reservation time visible for users
                        var time = date.getHours() + ':' + pad(date.getMinutes(), 2);
                        // creating dateTime / id which will be recorded in the databse
                        var dateTime = day + ' ' + time + ':00';

                        // adding data to array
                        availableTimes.push(
                            {
                                title: time,
                                id: dateTime,
                                // cheking if time is reserved
                                reserved: reserved.indexOf(dateTime) >= 0 ? 1 : 0
                            });
                    }

                    // interval each 10 minutes
                    // increasing time by 10 minutes
                    date.setMinutes(date.getMinutes() + 10);
                }

                // function which adds zeros from left size of the number 1 -> 001
                function pad(num, size) {
                    var s = num + "";
                    while (s.length < size) s = "0" + s;
                    return s;
                }

                return availableTimes;
            }
        }

        function generateCheckBoxes(time, resp) {
            var a = prepareForCheckBox(time, resp);
            var checkboxes = '';
            var exp = $('#experience_id').val();
            a.forEach(function (entry) {
                //ToDO check if entry is reserved, If yes then check and disable it else normal
                if (entry.reserved === 1)
                    checkboxes += '<input type="checkbox" name="' + exp + '[]" value="' + entry.id + '" checked disabled > ' + entry.title + '<br>';
                else
                    checkboxes += '<input type="checkbox" name="' + exp + '[]" value="' + entry.id + '">' + entry.title + '<br>';
            });
            $('#reservations').html(checkboxes);
            $("input[name|='" + exp + "[]']").bind('click', function (e) {
                console.log($(e.currentTarget).val());
                $('#reservations-invisible').append('<input id="' + $(this).attr('value') + '" type="checkbox" name="' + $(this).attr('name') + '" value="' + $(this).attr('value') + '" checked>');
            });

        }


    </script>
@endsection
