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
```bash
$ git clone [git repository]
$ cd miniblog
$ docker-compose up
```
-> localhost:8000 でバックエンド、localhost:3000 でフロントエンドのページが表示できる