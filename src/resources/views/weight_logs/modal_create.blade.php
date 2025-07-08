<style>
    .modal-title {
        color: #222;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 28px;
        text-align: left;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 22px;
        position: relative;
    }

    .form-label-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }

    .label-required {
        background: #e74c3c;
        color: #fff;
        font-size: 0.85rem;
        border-radius: 4px;
        padding: 2px 8px;
        font-weight: bold;
        margin-left: 4px;
        letter-spacing: 1px;
    }

    .input-unit {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
        font-size: 1rem;
        pointer-events: none;
    }

    .form-group input {
        width: 100%;
        min-width: 0;
        padding: 10px;
        border: 1.5px solid #f8cdda;
        border-radius: 8px;
        font-size: 1rem;
        background: #fafafa;
        color: #d16ba5;
        transition: border 0.2s;
        box-sizing: border-box;
    }

    .form-group textarea {
        width: 100%;
        min-height: 64px;
        padding: 10px;
        border: 1.5px solid #f8cdda;
        border-radius: 8px;
        font-size: 1rem;
        background: #fafafa;
        color: #d16ba5;
        transition: border 0.2s;
        resize: vertical;
        box-sizing: border-box;
    }

    .form-group textarea:focus {
        outline: none;
        border-color: #f88fa7;
        background: #fff;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.95rem;
        margin-top: 4px;
        margin-bottom: 0;
        text-align: left;
        font-weight: normal;
        line-height: 1.5;
    }

    .button-group {
        display: flex;
        gap: 24px;
        justify-content: center;
        margin-top: 32px;
    }

    .btn {
        padding: 14px 0;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        width: 180px;
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
        background: #f5f5f7;
        color: #888;
        border: 1.5px solid #ddd;
    }

    .btn-secondary:hover {
        background: #e0e0e0;
        color: #222;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 6px;
        padding: 12px 16px;
        margin-bottom: 16px;
    }

    .form-input-unit {
        width: 100%;
        padding-right: 48px !important;
        box-sizing: border-box;
    }
</style>
<div class="modal-title">Weight Logを追加</div>
@if($errors->any())
<div class="alert-danger">
    <ul style="margin: 0; padding-left: 20px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('weight_logs.store') }}">
    @csrf
    <div class="form-group">
        <div class="form-label-row">
            <label for="date">日付</label>
            <span class="label-required">必須</span>
        </div>
        <input id="date" type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" class="form-input-unit">
        @error('date')<div class="error-message">{!! nl2br(e($message)) !!}</div>@enderror
    </div>
    <div class="form-group">
        <div class="form-label-row">
            <label for="weight">体重</label>
            <span class="label-required">必須</span>
        </div>
        <input id="weight" type="number" name="weight" value="{{ old('weight') }}" step="0.1" placeholder="体重を入力" class="form-input-unit">
        <span class="input-unit">kg</span>
        @error('weight')<div class="error-message">{!! nl2br(e($message)) !!}</div>@enderror
    </div>
    <div class="form-group">
        <div class="form-label-row">
            <label for="calories">摂取カロリー</label>
            <span class="label-required">必須</span>
        </div>
        <input id="calories" type="number" name="calories" value="{{ old('calories') }}" placeholder="摂取カロリーを入力" class="form-input-unit">
        <span class="input-unit">cal</span>
        @error('calories')<div class="error-message">{!! nl2br(e($message)) !!}</div>@enderror
    </div>
    <div class="form-group">
        <div class="form-label-row">
            <label for="exercise_time">運動時間</label>
            <span class="label-required">必須</span>
        </div>
        <input id="exercise_time" type="time" name="exercise_time" value="{{ old('exercise_time', '00:00') }}" class="form-input-unit">
        @error('exercise_time')<div class="error-message">{!! nl2br(e($message)) !!}</div>@enderror
    </div>
    <div class="form-group">
        <div class="form-label-row">
            <label for="exercise_content">運動内容</label>
        </div>
        <textarea id="exercise_content" name="exercise_content" placeholder="運動内容を追加">{{ old('exercise_content') }}</textarea>
        @error('exercise_content')<div class="error-message">{!! nl2br(e($message)) !!}</div>@enderror
    </div>
    <div class="button-group">
        <a href="#" class="btn btn-secondary" onclick="closeModal();return false;">戻る</a>
        <button type="submit" class="btn btn-primary">登録</button>
    </div>
</form>