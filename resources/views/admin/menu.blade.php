<div id="menu">
    <h3>
        {{trans('app.admin-menu')}}
    </h3>
    <ul>
        <li><a href="{{route('app.language.index')}}">{{trans('app.language')}}</a></li>
        <li><a href="{{route('app.menu.index')}}">{{trans('app.menu')}}</a></li>
        <li><a href="{{route('app.categories.index')}}">{{trans('app.categories')}}</a></li>
        <li><a href="{{route('app.pages.index')}}">{{trans('app.pages')}}</a></li>
        <li><a href="{{route('app.users.index')}}">{{trans('app.users')}}</a></li>
        <li><a href="{{route('app.order.index')}}">{{trans('app.orders')}}</a></li>
    </ul>
</div>