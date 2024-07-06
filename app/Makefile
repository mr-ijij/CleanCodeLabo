# デフォルトのシェルをbashに設定
SHELL := /bin/bash

# デフォルトのターゲット
.DEFAULT_GOAL := help

# 環境変数を読み込む
include .env
export

# ヘルプコマンド
help:
	@echo "利用可能なコマンド:"
	@echo "  make bash    - アプリケーションコンテナ内でbashシェルを起動"
	@echo "  make help    - このヘルプメッセージを表示"
	@echo "  make psql    - データベースコンテナ内でpsqlを起動"

bash:
	docker compose exec app /bin/bash

psql:
	docker compose exec db psql -U user -d webapp

.PHONY: help bash