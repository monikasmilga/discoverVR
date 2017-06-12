@extends('admin.core')

@section('content')

    <div id="list">
        <div>
            {{ $title }}
        </div>


        {!! Form::open(['url' => route($route), 'files' => true]) !!}

        @foreach($fields as $field)

            @if($field['type'] == 'dropdown')

                {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}
                {{Form::select($field['key'], $field['options'])}}<br/>

            @elseif($field['type'] == 'singleline')

                {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}
                {{Form::text($field['key'])}}

            @endif


        @endforeach


        {{ Form::submit('Click Me!') }}


        {!! Form::close() !!}
    </div>
@endsection