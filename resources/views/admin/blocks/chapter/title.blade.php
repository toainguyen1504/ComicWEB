<h2>
    <a id="home" href="{{ route('admin.dashboard.index') }}"> Home </a>
    <a id="module" href="#"> / @yield('module') </a>
    <span> / {{ $chapter->name }} </span>
    <span> / @yield('action') </span>
</h2>
