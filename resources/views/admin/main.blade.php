@extends('main')

@section('content')
    <div class="admin-box">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">应用</a>
            <a class="logout-btn" href="/logout">退出</a>
        </nav>

        @yield('box')
    </div>
@endsection