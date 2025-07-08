@extends('layouts.app')

@section('content')
<style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8cdda 0%, #f88fa7 100%);
    }

    .main-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        padding: 32px 24px;
        width: 500px;
        margin: 80px auto;
        /* 上下に余白を持たせて中央寄せ */
    }

    .main-card h2 {
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

    .button-group {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 24px;
    }

    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
    }

    .btn-secondary {
        background: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 16px;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<div class="main-card">
    <h2>目標体重設定</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('weight_targets.update') }}">
        @csrf

        <div class="form-group">
            <label for="target_weight">目標体重(kg)</label>
            <input type="number" step="0.1" id="target_weight" name="target_weight" value="{{ old('target_weight', optional($weightTarget)->target_weight) }}" required>
            @error('target_weight')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="button-group">
            <a href="{{ route('weight_logs.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</div>
@endsection