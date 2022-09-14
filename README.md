# Name

 YUGYOSEN

# Required
- PHP >= 7.3.0
- node.js
- docker
- docker-compose
- composer

# See
- [Laravel](https://laravel.com/)
- [Vue.js](https://jp.vuejs.org/index.html)
- [MDB v4](https://mdbootstrap.com/)


# Setup
```bash
composer global require friendsofphp/php-cs-fixer
export PATH="/usr/local/bin/composer/vendor/bin"
```

```bash
composer install
```

```bash
npm i
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
make set-up
```

```bash
make set-up-app
```

# Usage

## run application
```bash
make npm-run-watch
```

access to [localhost:8180](localhost:8180)

ブラウザで描画

## phpMyadmin
[localhost:8180](localhost:8180)
```bash
id: yugyosen
pass: root
```

## stop application
```bash
make down
```

## generate API docs
```bash
make api-test
```

## run front auto test
```bash
cp cypress.env.example.json cypress.env.json

make run-front-auto-test
```

## output ER
```bash
make er-output

schemaspy/index.html
をブラウザーで開いてください
```

## memo
### ブランチの運用
git flowに従う

ブランチ名のフォーマットは以下とする
```
feat/{issue no.}/{prefix}-{work-content}

例）
feat/#1/create-home-view
```

### commit message
フォーマットは以下とする

```
※ スペースは半角
{prefix}: {frontend or backend} {auth} {page and page detail} {message} {issue no.}

例）
create: frontend 管理者 都道府県一覧 デザイン作成 #1
管理者 = auth
都道府県 = page名
一覧 = page詳細

※ frontend
管理画面、閲覧者画面で分けられる場合コミットも分ける。
fix: frontend 管理者 貸舟業者一覧 デザイン修正 #35
fix: frontend 貸舟業者 基本情報 〇〇のクラスを追記 #35
fix: frontend 閲覧者 Home レスポンシブ対応 #35

※ backend
バックエンドは主にApiなので「管理者・貸舟業者・閲覧者画面」で共通処理を作成する場合は、authは記載しなくてもOK（現状）。
add: backend 管理者 貸舟業者一覧 一覧取得処理 #35
add: backend 貸舟業者 基本情報 詳細取得処理 #35
add: backend 閲覧者 Home 画面で使用するデータ取得 #35

※backとfront同時にまとめてコミットする場合
add: backend/ frontend 管理者 貸舟業者一覧 不具合修正 #36

＊凡例＊
create: 作成
add: 追加
fix: 修正
delete: 削除
```

### PR
- titleには、ブランチ名を記載すること。
- 本文は、テンプレートに従って記載し、レビュワーが確認しやすいように確認対象の画面URLやエンドポイント、リクエスト、期待レスポンス等を詳細に記載すること。
