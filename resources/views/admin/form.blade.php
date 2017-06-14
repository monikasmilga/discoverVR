@extends('admin.core')

@section('content')

    <div id="list">
        <div id="title">
            {{ $title }}
        </div>


        {!! Form::open(['url' => $route, 'files' => true]) !!}

        @foreach($fields as $field)

            {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}<br/>

            @if($field['type'] == 'dropdown')

                {{Form::select($field['key'], $field['options'])}}<br/>

            @elseif($field['type'] == 'singleline')

                {{Form::text($field['key'])}}<br/>

            @elseif($field['type'] == 'checkbox')
                @foreach($field['options'] as $option)
                    {{Form::checkbox($option['name'], $option['value'])}}
                    {!! Form::label($option['title']) !!}<br/>
                @endforeach
            @endif


        @endforeach


        {{ Form::submit(trans('app.submit')) }}


        {!! Form::close() !!}
    </div>
@endsection