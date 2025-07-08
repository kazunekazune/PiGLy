<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy - 体重管理アプリ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: #fafbfc;
            font-family: 'Noto Sans JP', 'Montserrat', Arial, sans-serif;
            color: #222;
        }

        .header {
            width: 100%;
            background: #fff;
            border-bottom: 1.5px solid #f8cdda;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 64px;
            box-sizing: border-box;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            font-family: 'Montserrat', 'Noto Sans JP', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #d16ba5;
            letter-spacing: 2px;
            margin-right: 18px;
        }

        .header-title {
            font-size: 1.1rem;
            color: #aaa;
            font-weight: 400;
            letter-spacing: 1px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-btn {
            display: flex;
            align-items: center;
            background: #fff6f6;
            color: #d16ba5;
            border: 1.5px solid #d16ba5;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            gap: 6px;
        }

        .header-btn:hover {
            background: #d16ba5;
            color: #fff;
        }

        .header-btn svg {
            width: 18px;
            height: 18px;
            vertical-align: middle;
            fill: currentColor;
        }

        @media (max-width: 600px) {
            .header {
                padding: 0 10px;
            }

            .logo {
                font-size: 1.3rem;
            }

            .header-title {
                font-size: 0.9rem;
            }
        }

        .main-content-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: calc(100vh - 64px);
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    @if (!View::hasSection('no_header'))
    <div class="header">
        <div class="header-left">
            <span class="logo">PiGLy</span>
        </div>
        <div class="header-right">
            <a href="{{ route('weight_targets.edit') }}" class="header-btn" style="background:#f5f5f7; color:#333; border:none;">
                <svg viewBox="0 0 24 24">
                    <path d="M19.14,12.94a1,1,0,0,0-1.28.53A7,7,0,1,1,12,5a1,1,0,0,0,0-2A9,9,0,1,0,21,12,1,1,0,0,0,19.14,12.94Z" />
                    <path d="M22,12a1,1,0,0,0-1-1H13V3a1,1,0,0,0-2,0V13a1,1,0,0,0,1,1h9A1,1,0,0,0,22,12Z" />
                </svg>
                目標体重設定
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="header-btn" style="background:#f5f5f7; color:#333; border:none;">
                    <svg viewBox="0 0 24 24">
                        <path d="M16 13v-2H7V8l-5 4 5 4v-3z" />
                        <path d="M20 3H4c-1.1 0-2 .9-2 2v4h2V5h16v14H4v-4H2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                    </svg>
                    ログアウト
                </button>
            </form>
        </div>
    </div>
    @endif
    <div class="main-content-wrapper">
        @yield('content')
    </div>
</body>

</html>