@extends('admin.core')

@section('content')

    <div id="list">
        <div id="title">
            {{ $title }}
        </div>


        {!! Form::open(['url' => route($route), 'files' => true]) !!}

        @foreach($fields as $field)

            @if($field['type'] == 'dropdown')

                {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}<br/>
                {{Form::select($field['key'], $field['options'])}}<br/>

            @elseif($field['type'] == 'singleline')

                {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}<br/>
                {{Form::text($field['key'])}}<br/>

            @endif


        @endforeach


        {{ Form::submit(trans('app.submit')) }}


        {!! Form::close() !!}
    </div>
@endsection