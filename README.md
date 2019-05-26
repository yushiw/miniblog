# miniblog

## ディレクトリ構成
miniblog/  
├── backend/ : Laravel project  
├── docker/ : DockerFileなど  
├── docker-compose.yml  
├── docs/ : ドキュメント類  
│   ├── database : ERDなど  
│   ├── develop  
│   ├── idea.md  
│   └── pages.md  
└── frontend/ : Nuxt project  

## 実行
### docker-compose up
```bash
$ git clone [git repository]
$ cd miniblog
$ docker-compose up -d
```

### Laravel projectの導入
```bash
$ docker exec miniblog-php composer install
$ docker exec miniblog-php cp .env.docker .env
$ docker exec miniblog-php php artisan migrate
```
-> localhost:8000 でバックエンド、localhost:3000 でフロントエンドのページが表示できる

## Tips
### MySQL CLI へのログイン
```bash
$ docker exec -it miniblog-db mysql -u miniblog -p
## password = miniblog
```

