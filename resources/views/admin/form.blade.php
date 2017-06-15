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

                @if($field['key'] == 'language_code')

                    {{Form::select($field['key'], $field['options'])}}<br/>

                @else
                    {{Form::select($field['key'], $field['options'], null, ['placeholder' => ''])}}<br/>
                @endif
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

@section('scripts')
    <script>

        $('#language_code').bind("change", function()
        {
//            console.log(window.location.href)
            window.location.href="?language_code=" + $('#language_code').val()
//            alert($('#language_code').val())
        })


    </script>
@endsection