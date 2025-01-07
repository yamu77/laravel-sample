# laravel-sample

## コンテナ内で実行するコマンド

```shell
# パッケージインストール
apt update &&apt install -y nodejs npm && apt install -y git

# composer インストール
curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer

# laravel プロジェクト作成(ここはスキップ)
apt-get -y install unzip
composer create-project "laravel/laravel=11.*" sample

# パッケージインストール
cd sample
npm install && npm run build

# サーバー起動
composer run dev
```

## ログインユーザー情報

```txt
ユーザー名: test
メールアドレス: test@test.com
パスワード: testtest
```
