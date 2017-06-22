@extends('front-end.core')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">

        @foreach($menu as $menuItems)
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    @foreach($menuItems as $menuItem)
                        <ul class="nav navbar-nav">
                            @if($menuItem['children'] != null)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false"> {{($menuItem['translation']['name'])}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($menuItem['children'] as $item)
                                        <li><a href="#">{{($item['translation']['name'])}}</a></li>
                                            @endforeach
                                    </ul>
                                </li>
                            @else
                            <li><a href="#">{{($menuItem['translation']['name'])}}</a></li>
                            @endif
                            @endforeach

                        </ul>

                </div>
        </div>
    </nav>


    @endforeach

@endsection