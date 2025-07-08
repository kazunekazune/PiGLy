@extends('layouts.app')

@section('content')
<style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8cdda 0%, #f88fa7 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        padding: 32px 24px;
        width: 400px;
        max-width: 90vw;
    }

    .auth-card h2 {
        color: #d16ba5;
        font-size: 1.7rem;
        margin-bottom: 24px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 4px;
        font-size: 0.95rem;
        color: #555;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        background: #fafafa;
    }

    .form-group input:focus {
        outline: none;
        border-color: #f88fa7;
        background: #fff;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.9rem;
        margin-top: 4px;
    }

    .submit-btn {
        width: 100%;
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 8px;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
    }

    .login-link {
        text-align: center;
        margin-top: 16px;
        color: #666;
    }

    .login-link a {
        color: #d16ba5;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="auth-card">
    <h2>会員登録</h2>

    @if($errors->any())
    <div style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 6px; padding: 12px; margin-bottom: 16px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">お名前</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus placeholder="お名前を入力">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" placeholder="パスワードを入力">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">パスワード（確認用）</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="パスワード（確認用）を入力">
        </div>

        <button type="submit" class="submit-btn">登録</button>
    </form>

    <div class="login-link">
        既にアカウントをお持ちの方は<a href="{{ route('login') }}">こちら</a>
    </div>
</div>
@endsection