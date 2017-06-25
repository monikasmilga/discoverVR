@extends('front-end.core')

@section('title', $title )

@section('content')

<div id="pages_title">

    {{$title}}

</div>
    <div>

        <img src="{{$page['image']['path']}}">

    </div>

    <h4>{{$description_long}}</h4>

    @endsection