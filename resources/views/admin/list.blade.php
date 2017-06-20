@extends('admin.core')

@section('content')

    <div id="list">
        <div id="pagetitletitle">
            {{ $pageTitle }} <br/>
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
                        @if(isset($edit))
                            <th> {{ trans('app.edit') }}</th>
                        @endif
                        @if(isset($delete))
                            <th> {{ trans('app.delete') }}</th>
                        @endif
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
                                        @if(isset($recordItem['name']))
                                            {{ $recordItem['name'] . ' ' . $recordItem['language_code'] }}
                                        @else
                                            {{ $recordItem['title'] . ' ' . $recordItem['language_code'] }}
                                        @endif
                                    </td>

                                @elseif($key == 'image')
                                    <td>
                                        @if(isset($recordItem['path']))
                                            <img src="{{ $recordItem['path'] }}">
                                            @else
                                        No image
                                            @endif
                                    </td>

                                @elseif($key == 'role')

                                    <td>
                                        {{ $recordItem['role_id'] }}
                                    </td>

                                @else
                                    <td>{{ $recordItem }}</td>
                                @endif
                            @endforeach
                            @if(isset ($edit))
                                <td><a class="btn btn-info"
                                       href="{{ route($edit, $record['id']) }}">{{ trans('app.edit') }}</a></td>
                            @endif
                            @if(isset ($delete))
                                <td>
                                    <button class="btn btn-warning"
                                            onclick="deleteItem('{{route( $delete, $record['id'])}}', 0)">{{ trans('app.delete') }}</button>
                                </td>
                            @endif

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

        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {},
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('Error');
                }
            });
        }

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