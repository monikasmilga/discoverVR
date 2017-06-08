@extends('admin.core')

@section('content')

    <div id="list">

        @if(sizeof($list)>0)
            <table>
                <tr>
                    @foreach($list[0] as $key => $value)
                        <th>{{$key}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($list as $record)
                        @foreach($record as $recordItem)
                            <td>{{$recordItem}}</td>
                        @endforeach
                </tr>
                @endforeach
            </table>

        @else {{trans('app.no-data')}}
        @endif

    </div>

@endsection