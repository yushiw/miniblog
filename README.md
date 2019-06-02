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
$ docker-compose build
```

### Laravel projectの導入
```bash
$ docker-compose run php composer install
$ cp backend/.env.docker backend/.env
```

### Nuxt projectの導入
```bash
$ docker-compose run nuxt yarn
```

### docker-compose up
```bash
$ docker-compose up -d
$ docker-compose exec php php artisan migrate --seed
```
-> localhost:8000 でバックエンド、localhost:3000 でフロントエンドのページが表示できる

## Tips
### MySQL CLI へのログイン
```bash
$ docker exec -it miniblog-db mysql -u miniblog -p
## password = miniblog
```

