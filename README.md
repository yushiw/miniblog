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
### Projectのclone
```bash
$ git clone [git repository]
$ cd miniblog
```

### Laravel projectの導入
```bash
$ docker exec miniblog-php composer install
$ docker exec miniblog-php cp .env.docker .env
$ docker exec miniblog-php php artisan migrate --seed
```

### Nuxt projectの導入
```bash
$ docker-compose run nuxt yarn
```

### docker-compose up
```bash
$ docker-compose up -d
```
-> localhost:8000 でバックエンド、localhost:3000 でフロントエンドのページが表示できる

## Tips
### MySQL CLI へのログイン
```bash
$ docker exec -it miniblog-db mysql -u miniblog -p
## password = miniblog
```

