@extends('layouts.app')

@section('no_header')
@endsection

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
        padding: 40px 32px;
        width: 340px;
        margin: 40px auto;
        text-align: center;
    }

    .auth-card h1 {
        font-size: 2rem;
        margin-bottom: 8px;
        color: #d16ba5;
        font-family: 'Arial Rounded MT Bold', 'Arial', sans-serif;
    }

    .auth-card .subtitle {
        color: #888;
        font-size: 1.1rem;
        margin-bottom: 18px;
    }

    .form-group {
        margin-bottom: 16px;
        text-align: left;
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
        color: #e74c3c;
        font-size: 0.9rem;
        margin-bottom: 8px;
        text-align: left;
    }

    .submit-btn {
        width: 100%;
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 0;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        margin-top: 8px;
        margin-bottom: 8px;
        transition: background 0.2s;
    }

    .submit-btn:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
    }

    .link {
        color: #d16ba5;
        font-size: 0.95rem;
        display: block;
        margin-top: 8px;
        text-decoration: none;
    }

    .link:hover {
        text-decoration: underline;
    }
</style>
<div class="auth-card">
    <h1>PiGLy</h1>
    <div class="subtitle">新規会員登録</div>
    <form method="POST" action="{{ route('register.store.step2') }}">
        @csrf
        <div class="form-group">
            <label for="current_weight">現在の体重(kg)</label>
            <input id="current_weight" type="number" name="current_weight" value="{{ old('current_weight') }}" step="0.1" placeholder="現在の体重を入力">
            @error('current_weight')<div class="error-message">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="target_weight">目標体重(kg)</label>
            <input id="target_weight" type="number" name="target_weight" value="{{ old('target_weight') }}" step="0.1" placeholder="目標体重を入力">
            @error('target_weight')<div class="error-message">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="submit-btn">アカウント作成</button>
    </form>
</div>
@endsection