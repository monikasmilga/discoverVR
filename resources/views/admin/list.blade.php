@extends('admin.core')

@section('content')

    <div id="list">
        <div id="title">
            {{ $title }} <br/>
            @if(isset($route))
                <a class="btn btn-primary" href="{{ $route }}">{{trans('app.new')}}</a>
            @endif

        </div>
        <div>

        </div>
        <div>
            @if(sizeof($list)>0)

                <table class="table table-striped">
                    <tr>
                        @foreach($list[0] as $key => $value)
                            <th>{{$key}}</th>
                        @endforeach
                    </tr>

                    @foreach($list as $record)
                        <tr id="{{$record['id']}}">
                            @foreach($record as $key => $recordItem)

                                @if($key == 'is_active')

                                    <td>
                                        @if($recordItem == 1)
                                            <button class="btn btn-danger"
                                                    onclick="toggleActive('{{route($callToAction, $record['id'])}}', 0)">{{trans('app.disable')}}</button>
                                            <button class="btn btn-success" style="display:none"
                                                    onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)">{{trans('app.activate')}}</button>
                                        @else
                                            <button class="btn btn-success"
                                                    onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)">{{trans('app.activate')}}</button>
                                            <button class="btn btn-danger" style="display:none"
                                                    onclick="toggleActive('{{route($callToAction, $record['id'])}}', 0)">{{trans('app.disable')}}</button>
                                        @endif
                                    </td>
                                @elseif($key == 'translation')
                                    <td>
                                        {{ $recordItem['name'] }}
                                    </td>
                                @else
                                    <td>{{$recordItem}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>

            @else {{trans('app.no-data')}} <br/>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toggleActive(URL, value) {
//            alert('Hello')
//            console.log(URL, value);

            $.ajax({
                url: URL,
                type: 'POST',
                data: {
                    is_active: value
                },
                success: function (response) {
                    var $danger = ($('#' + response.id).find('.btn-danger'))
                    var $success = ($('#' + response.id).find('.btn-success'))

                    console.log($danger, $success)

                    if (response.is_active === '1') {
                        $success.hide();
                        $danger.show()
                    } else {
                        $success.show();
                        $danger.hide()
                    }
                }
            })
        }

        //                    console.log(   $('td').hide())  //jei norim istrinti visai .remove()

        //                    if(response.is_active)
        //                    {
        //
        //                    }

    </script>
@endsection