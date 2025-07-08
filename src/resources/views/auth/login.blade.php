@extends('layouts.app')
@section('no_header', true)

@section('content')
<style>
    html,
    body {
        height: 100%;
    }

    body {
        min-height: 100vh;
        height: 100%;
        background: linear-gradient(135deg, #f8cdda 0%, #fff6f6 50%, #f88fa7 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .auth-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        padding: 40px 32px 32px 32px;
        width: 370px;
        margin: 40px auto;
        text-align: center;
    }

    .auth-card h1 {
        font-size: 2.2rem;
        margin-bottom: 8px;
        color: #d16ba5;
        font-family: 'Arial Rounded MT Bold', 'Arial', sans-serif;
        letter-spacing: 2px;
    }

    .auth-card .subtitle {
        color: #888;
        font-size: 1.15rem;
        margin-bottom: 22px;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-size: 1rem;
        color: #444;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 12px 10px;
        border: 1.5px solid #eee;
        border-radius: 8px;
        font-size: 1rem;
        background: #fafafa;
        transition: border 0.2s;
    }

    .form-group input:focus {
        outline: none;
        border-color: #f88fa7;
        background: #fff;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.93rem;
        margin-top: 4px;
        margin-bottom: 0;
        text-align: left;
        font-weight: normal;
        line-height: 1.3;
    }

    .submit-btn {
        width: 100%;
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px 0;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 8px;
        transition: background 0.2s;
        letter-spacing: 1px;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
    }

    .link {
        color: #7b6ff6;
        font-size: 0.97rem;
        display: block;
        margin-top: 12px;
        text-decoration: underline;
        letter-spacing: 0.5px;
    }

    .link:hover {
        color: #d16ba5;
    }
</style>
<div class="auth-card">
    <h1>PiGLy</h1>
    <div class="subtitle">ログイン</div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="メールアドレスを入力">
            @error('email')<div class="error-message">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" placeholder="パスワードを入力">
            @error('password')<div class="error-message">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="submit-btn">ログイン</button>
    </form>
    <a href="{{ route('register.step1') }}" class="link">アカウント作成はこちら</a>
</div>
@endsection