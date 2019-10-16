@extends('admin.main')

@section('box')
    <div class="create-client-box box">
        <h3>添加应用</h3>

        <form method="POST" action="/client">
            @csrf
            <div class="form-group">
                <label for="name">名称</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="请输入名称" value="{{ session('_old_input.name') }}" >
                @error('name')
                <div class="invalid-feedback">{{ $message  }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="redirect">重定向地址</label>
                <input name="redirect" class="form-control @error('redirect') is-invalid @enderror" id="redirect" placeholder="请输入重定向地址" value="{{ session('_old_input.redirect') }}" >
                @error('redirect')
                <div class="invalid-feedback">{{ $message  }}</div>
                @enderror
            </div>
            <div class="form-group">
                <a href="/" class="btn btn-secondary">返回</a>
                <button type="submit" class="btn btn-primary">创建</button>
            </div>
        </form>

    </div>
@endsection

@section('style')
    .create-client-box .form-group:last-child {
        text-align: right;
    }
@endsection