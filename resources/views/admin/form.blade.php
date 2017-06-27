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

        if ($('#time').length > 0 && $('#experience_id').length > 0) {

            $('#time').bind("change", getAvailableHours);
            $('#experience_id').bind("change", getAvailableHours);

            function getAvailableHours() {
                console.log($('#experience_id').val());
                console.log($('#time').val());
            }
        }


    </script>
@endsection
