# 体重管理アプリ (PiGLy)

Laravel 8 + Docker で構築された体重管理アプリケーションです。

## 機能

- ユーザー認証（会員登録・ログイン）
- 体重記録の管理（登録・更新・削除・検索）
- 目標体重の設定・管理
- 摂取カロリーと運動記録の管理

## セットアップ手順

1. リポジトリをクローン

```bash
git clone https://github.com/kazunekazune/PiGLy.git
cd PiGLy
```

2. 環境設定

```bash
cp src/.env.example src/.env
# .envファイルを編集してデータベース設定を調整
```

3. Docker コンテナを起動

```bash
docker-compose up -d
```

4. 依存関係のインストール

```bash
docker-compose exec php composer install
```

5. アプリケーションキーの生成

```bash
docker-compose exec php php artisan key:generate
```

6. データベースマイグレーション

```bash
docker-compose exec php php artisan migrate
```

7. ダミーデータの投入

```bash
docker-compose exec php php artisan db:seed
```

## アクセス方法

- アプリケーション: http://localhost
- phpMyAdmin: http://localhost:8080
  - ユーザー名: laravel_user
  - パスワード: laravel_pass

## テストアカウント

- メール: test@example.com
- パスワード: password

## 技術スタック

- Laravel 8
- MySQL 8.0
- Nginx
- PHP 7.4
- Docker
- Laravel Fortify (認証)

## 開発状況

- **1 日目**: ✅ 基盤構築完了（データベース、モデル、認証設定）
- **2 日目**: 🔄 認証機能とメイン機能の実装予定
- **3 日目**: ⏳ 最終調整予定
