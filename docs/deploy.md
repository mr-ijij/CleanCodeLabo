## Deployについて
### GitHub ActionのSecretsを設定
```md
- AWS_ACCESS_KEY_ID
    - AWSのACCESS KEY ID
- AWS_SECRET_ACCESS_KEY
    - AWSのSECRET ACCESS KEY
- ENV_FILE
    - .envファイル
- SERVERLESS_ACCESS_KEY
    - https://app.serverless.com/user/settings/accessKeysのKey
```


### artisanコマンドの実行
```
serverless bref:cli --args="cache:clear"
```