@extends('layouts.app')

@section('content')
<style>
    body {
        min-height: 100vh;
        background: none;
        display: block;
    }

    .main-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(209, 107, 165, 0.10);
        padding: 40px 40px 32px 40px;
        width: 900px;
        margin: 48px auto 0 auto;
        max-width: 98vw;
        position: relative;
    }

    .summary-row {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(209, 107, 165, 0.06);
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        margin-bottom: 32px;
        padding: 32px 0 24px 0;
        gap: 0;
        border: none;
    }

    .summary-box {
        flex: 1;
        text-align: center;
        padding: 0 0 0 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }

    .summary-box:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 20%;
        right: 0;
        width: 1px;
        height: 60%;
        background: #eee;
    }

    .summary-label {
        color: #888;
        font-size: 1.05rem;
        margin-bottom: 8px;
        font-weight: 400;
        letter-spacing: 1px;
    }

    .summary-value {
        color: #222;
        font-size: 2.3rem;
        font-weight: bold;
        margin-bottom: 0;
        letter-spacing: 1px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .summary-value .unit {
        font-size: 1.1rem;
        color: #aaa;
        margin-left: 4px;
        margin-bottom: 2px;
    }

    .summary-diff {
        color: #d16ba5;
        font-size: 2.3rem;
        font-weight: bold;
        margin-bottom: 0;
        letter-spacing: 1px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .summary-diff .unit {
        font-size: 1.1rem;
        color: #aaa;
        margin-left: 4px;
        margin-bottom: 2px;
    }

    .main-card h2 {
        color: #d16ba5;
        font-size: 1.7rem;
        margin-bottom: 24px;
        text-align: center;
        letter-spacing: 2px;
    }

    .button-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .add-btn {
        background: linear-gradient(90deg, #f8cdda 0%, #f88fa7 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 10px 36px;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s, box-shadow 0.2s;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(248, 141, 167, 0.08);
        margin-left: auto;
        margin-right: 0;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-btn:hover {
        background: linear-gradient(90deg, #f88fa7 0%, #f8cdda 100%);
        box-shadow: 0 4px 16px rgba(248, 141, 167, 0.18);
    }

    .goal-btn {
        background: #fff6f6;
        color: #d16ba5;
        border: 1.5px solid #d16ba5;
        border-radius: 8px;
        padding: 10px 24px;
        font-size: 1.05rem;
        font-weight: bold;
        cursor: pointer;
        margin-right: 8px;
        transition: background 0.2s, color 0.2s;
        text-decoration: none;
    }

    .goal-btn:hover {
        background: #d16ba5;
        color: #fff;
    }

    .logout-btn {
        background: #fff6f6;
        color: #ff6b6b;
        border: 1.5px solid #ff6b6b;
        border-radius: 8px;
        padding: 10px 24px;
        font-size: 1.05rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        text-decoration: none;
    }

    .logout-btn:hover {
        background: #ff6b6b;
        color: #fff;
    }

    .search-row {
        display: flex;
        align-items: center;
        margin-bottom: 18px;
        gap: 0;
    }

    .search-section {
        flex: 1;
        background: none;
        box-shadow: none;
        padding: 0;
        margin-bottom: 0;
    }

    .search-form {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .search-form input[type="date"] {
        padding: 8px 12px;
        border: 1.5px solid #eee;
        border-radius: 6px;
        font-size: 1rem;
        background: #fafbfc;
        color: #888;
        width: 140px;
    }

    .search-btn {
        background: #888;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 24px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        margin-left: 8px;
        transition: background 0.2s;
    }

    .search-btn:hover {
        background: #d16ba5;
    }

    .reset-btn {
        background: #fff6f6;
        color: #d16ba5;
        border: 1.5px solid #d16ba5;
        border-radius: 6px;
        padding: 8px 24px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        margin-left: 8px;
        transition: background 0.2s, color 0.2s;
    }

    .reset-btn:hover {
        background: #d16ba5;
        color: #fff;
    }

    .weight-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 24px;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(209, 107, 165, 0.04);
    }

    .weight-table th,
    .weight-table td {
        border-bottom: 1px solid #eee;
        padding: 14px 10px;
        text-align: center;
        font-size: 1.05rem;
    }

    .weight-table th {
        background: #fff;
        color: #888;
        font-weight: bold;
        font-size: 1.1rem;
        border-bottom: 2px solid #f8cdda;
    }

    .weight-table tr:hover {
        background: #fafbfc;
        transition: background 0.2s;
    }

    .btn-edit {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0 6px;
        color: #d16ba5;
        font-size: 1.3rem;
        transition: color 0.2s;
        vertical-align: middle;
    }

    .btn-edit:hover {
        color: #f88fa7;
    }

    .edit-icon {
        width: 22px;
        height: 22px;
        vertical-align: middle;
        fill: #d16ba5;
        transition: fill 0.2s;
    }

    .btn-edit:hover .edit-icon {
        fill: #f88fa7;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 16px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .modal-bg {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.25);
        z-index: 999;
        display: none;
        align-items: center;
        justify-content: center;
        min-height: 100%;
        overflow-y: auto;
    }

    .modal-bg.active {
        display: flex;
    }

    .modal-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
        max-width: 600px;
        width: 100%;
        margin: 40px 24px;
        box-sizing: border-box;
        padding: 40px 40px 32px 40px;
        position: relative;
        z-index: 1000;
    }

    .modal-close {
        position: absolute;
        top: 18px;
        right: 24px;
        font-size: 1.5rem;
        color: #aaa;
        background: none;
        border: none;
        cursor: pointer;
    }
</style>

<script>
    function openModal() {
        document.getElementById('modal-bg').classList.add('active');
    }

    function closeModal() {
        document.getElementById('modal-bg').classList.remove('active');
    }
</script>

<div class="main-card">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="summary-row">
        <div class="summary-box">
            <div class="summary-label">目標体重</div>
            <div class="summary-value">{{ $targetWeight !== null ? number_format($targetWeight, 1) : '-' }}<span class="unit">kg</span></div>
        </div>
        <div class="summary-box">
            <div class="summary-label">目標まで</div>
            <div class="summary-diff">{{ $diff !== null ? ($diff > 0 ? '+' : '') . number_format($diff, 1) : '-' }}<span class="unit">kg</span></div>
        </div>
        <div class="summary-box">
            <div class="summary-label">最新体重</div>
            <div class="summary-value">{{ $currentWeight !== null ? number_format($currentWeight, 1) : '-' }}<span class="unit">kg</span></div>
        </div>
    </div>

    <h2>体重管理</h2>

    <div class="search-row">
        <div class="search-section">
            <form method="GET" action="{{ route('weight_logs.search') }}" class="search-form">
                <input type="date" name="start_date" value="{{ request('start_date') }}" placeholder="年/月/日">
                <span>〜</span>
                <input type="date" name="end_date" value="{{ request('end_date') }}" placeholder="年/月/日">
                <button type="submit" class="search-btn">検索</button>
            </form>
        </div>
        <a href="#" class="add-btn" onclick="openModal();return false;">データ追加</a>
    </div>

    @if(request('start_date') && request('end_date'))
    <div style="margin-bottom: 16px; color: #666;">
        {{ request('start_date') }}〜{{ request('end_date') }}の検索結果 {{ $weightLogs->total() }}件
    </div>
    @endif

    <table class="weight-table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重(kg)</th>
                <th>摂取カロリー</th>
                <th>運動時間</th>
                <th>運動内容</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse($weightLogs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td>{{ number_format($log->weight, 1) }}kg</td>
                <td>{{ $log->calories }}cal</td>
                <td>{{ substr($log->exercise_time, 0, 5) }}</td>
                <td>{{ $log->exercise_content }}</td>
                <td>
                    <a href="{{ route('weight_logs.edit', $log->id) }}" class="btn-edit" title="編集">
                        <svg class="edit-icon" viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75l11.06-11.06-3.75-3.75L3 17.25zm14.71-9.04a1.003 1.003 0 0 0 0-1.42l-2.5-2.5a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                        </svg>
                    </a>
                    <form method="POST" action="{{ route('weight_logs.destroy', $log->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">データがありません</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {!! $weightLogs->links('vendor.pagination.default') !!}
</div>

<div class="modal-bg" id="modal-bg">
    <div class="modal-card">
        <button class="modal-close" onclick="closeModal()">&times;</button>
        @include('weight_logs.modal_create')
    </div>
</div>
@endsection