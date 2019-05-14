# 開発時メモ

## 前提

### 定義
| Name | Description |
| --- | --- |
| [ProjectDir] | git clone によって導入されたプロジェクトのルートディレクトリ |

## 手順

特に指定がない限り、各手順はカレントディレクトリが[ProjectDir]であることを前提とする.

### docker-compose 
```bash
$ docker-compose up
```

### laravel project の生成
```bash 
## phpコンテナにログイン
$ docker exec -it [PhpContainerId] /bin/zsh

$ cd /sync
$ laravel --version 
Laravel Installer 2.1.0

$ laravel new backend
```