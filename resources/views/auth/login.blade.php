@extends('main')

@section('content')
    <div class="login-box">
        <h2 class="title">
            常盘庄
        </h2>
        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="请输入用户名" value="{{ session('_old_input.name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message  }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="请输入密码" value="{{ session('_old_input.password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message  }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input name="remember_me" type="checkbox" class="form-check-input" id="remember=me">
                <label class="form-check-label" for="remember-me">记住密码</label>
            </div>
            <button type="submit" class="btn btn-primary">登录</button>
        </form>
    </div>
@endsection

@section('style')
    .login-box {
        width: 25vw;
        margin: 0 auto;
        margin-top: 20vh;
        padding: 20px;
        max-width: 450px;
        background-color: #fff;
        box-sizing: border-box;
    }
    .login-box h2 {
        text-align: center;
        margin-bottom: 40px;
    }
    .login-box button {
        width: 100%;
    }
    .login-box .form-group {
        margin-bottom: 20px;
    }
    .login-box .form-check {
        float: right;
        margin-bottom: 10px;
    }
@endsection