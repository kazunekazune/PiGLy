@extends('layouts.app')

@section('content')
<style>
    body {
        min-height: 100vh;
        background: linear-gradient(120deg, #f8cdda 0%, #f88fa7 100%);
        /* display: flex; align-items: center; justify-content: center; */
    }

    .modal-bg {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(248, 205, 218, 0.18);
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12);
        padding: 36px 32px 32px 32px;
        width: 420px;
        margin: 0 auto;
        position: relative;
        z-index: 20;
    }

    .modal-card h2 {
        color: #d16ba5;
        font-size: 1.5rem;
        margin-bottom: 18px;
        text-align: center;
        letter-spacing: 2px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 4px;
        font-size: 1rem;
        color: #555;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1.5px solid #f8cdda;
        border-radius: 8px;
        font-size: 1rem;
        background: #fafafa;
        color: #d16ba5;
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

    .button-group {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 24px;
    }

    .btn {
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.2s;
    }

    .btn-primary {
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
    }

    .btn-secondary {
        background: #fff6f6;
        color: #d16ba5;
        border: 1.5px solid #d16ba5;
    }

    .btn-secondary:hover {
        background: #d16ba5;
        color: #fff;
    }

    .btn-danger {
        background: #fff6f6;
        color: #ff6b6b;
        border: 1.5px solid #ff6b6b;
    }

    .btn-danger:hover {
        background: #ff6b6b;
        color: #fff;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 6px;
        padding: 12px 16px;
        margin-bottom: 16px;
    }
</style>
<div class="modal-bg">
    <div class="modal-card">
        <h2>データ編集</h2>
        @if($errors->any())
        <div class="alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date">日付</label>
                <input id="date" type="date" name="date" value="{{ old('date', $weightLog->date) }}">
                @error('date')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="weight">体重(kg)</label>
                <input id="weight" type="number" name="weight" value="{{ old('weight', $weightLog->weight) }}" step="0.1" placeholder="体重を入力">
                @error('weight')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="calories">摂取カロリー</label>
                <input id="calories" type="number" name="calories" value="{{ old('calories', $weightLog->calories) }}" placeholder="摂取カロリーを入力">
                @error('calories')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="exercise_time">運動時間</label>
                <input id="exercise_time" type="time" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
                @error('exercise_time')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="exercise_content">運動内容</label>
                <input id="exercise_content" type="text" name="exercise_content" value="{{ old('exercise_content', $weightLog->exercise_content) }}" placeholder="運動内容を入力">
                @error('exercise_content')<div class="error-message">{{ $message }}</div>@enderror
            </div>
            <div class="button-group">
                <a href="{{ route('weight_logs.index') }}" class="btn btn-secondary">戻る</a>
                <button type="submit" class="btn btn-primary">更新</button>
                <form method="POST" action="{{ route('weight_logs.destroy', $weightLog->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection