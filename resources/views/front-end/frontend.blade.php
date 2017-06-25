@extends('front-end.core')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @foreach($menu as $menuItem)
                    <ul class="nav navbar-nav">
                        @if($menuItem['children'] != null)
                            <li class="dropdown">
                                <a href="{{($menuItem['translation']['url'])}}" class="dropdown-toggle"
                                   data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false"> {{($menuItem['translation']['name'])}} <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($menuItem['children'] as $child)
                                        <li>
                                            <a href="{{($child['translation']['url'])}}">{{($child['translation']['name'])}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{($menuItem['translation']['url'])}}">{{($menuItem['translation']['name'])}}</a>
                            </li>
                        @endif
                    </ul>
                @endforeach
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"> Kalbos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($languageMenu as $key => $language)
                            <li><a href="{{$key}}">{{($language)}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"> Kambariai <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($vrRooms as $vrRoom)

                                    <li><a href="/{{app()->getLocale() . '/pages/'. ($vrRoom['translation']['slug'])}}">{{($vrRoom['translation']['title'])}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>

            </div>
        </div>
    </nav>



@endsection