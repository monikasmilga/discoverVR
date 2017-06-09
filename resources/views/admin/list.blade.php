@extends('admin.core')

@section('content')

    <div id="list">

        @if(sizeof($list)>0)

            <table class="table table-striped">
                <tr>
                    @foreach($list[0] as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($list as $record)

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
                            @else
                                <td>{{$recordItem}}</td>
                            @endif
                        @endforeach
                </tr>
                @endforeach
            </table>

        @else {{trans('app.no-data')}}
        @endif

    </div>

@endsection

@section('scripts')
    <script>
        function toggleActive(URL, value) {
            alert('Hello')
        }

    </script>
@endsection