# 体重管理アプリ

Laravel 8 + Docker で構築された体重管理アプリケーションです。

## セットアップ手順

1. リポジトリをクローン
```bash
git clone [repository-url]
cd PiGLy
```

2. 環境設定
```bash
cp src/.env.example src/.env
# .envファイルを編集してデータベース設定を調整
```

3. Dockerコンテナを起動
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