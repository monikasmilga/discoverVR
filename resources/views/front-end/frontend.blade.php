@extends('front-end.core')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @foreach($menu as $menuItem)
                    <ul class="nav navbar-nav">
                        @if($menuItem['children'] != null)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"> {{($menuItem['translation']['name'])}}
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($menuItem['children'] as $child)
                                        <li><a href="#">{{($child['translation']['name'])}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="#">{{($menuItem['translation']['name'])}}</a></li>
                        @endif
                    </ul>
                @endforeach

            </div>
        </div>
    </nav>



@endsection