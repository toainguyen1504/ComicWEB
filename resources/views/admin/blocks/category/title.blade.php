<h2>
    <a id="home" href="{{route('admin.dashboard.index')}}"> Home </a> 
    <a id="module" href="{{route('admin.category.index')}}"> / @yield('module') </a>
     <span> / @yield('action') </span>
</h2>
<a href="{{ route('admin.category.create') }}" class="main__title-add">Add @yield('module')</a>