## 1. プロジェクトのappで下記を実行
```
cd app
docker-compose up -d --build
docker-compose exec app /bin/bash
composer install
```

## 2. serverlessのinstall
デプロイ時に使用する
```
npm install -g serverless
serverless
```
