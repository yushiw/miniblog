# Web画面

## コンポーネント
### ナビゲーションバー
- トップ(a, u, g)
- ユーザー一覧(a)
- マイブログ(a, u)
- ログイン(g)
- ログアウト(a, u)

※ admin, user, guest

### フッター


## 画面一覧

**優先度**
  - S: 特に重要
  - A: 必要
  - B: あるとよい

- 管理者画面（要ログイン、管理者権限）
  - 管理者ダッシュボード B
  - ユーザー一覧 B
- ユーザー画面（要ログイン）
  - ユーザダッシュボード B
  - ユーザ設定画面 B
  - ユーザ記事一覧管理画面 S
  - ユーザ記事詳細管理画面 S
  - ユーザ記事編集画面 S
- ゲスト画面（ログイン不要）
  - トップページ B
  - 記事一覧画面 S
    - 絞り込み：ユーザー、ジャンル
    - 並び替え：日時、ユーザー名など、いいね数、コメント数
  - 記事詳細画面 S
  - ユーザ登録画面 A
  - ユーザーログイン画面 A
  - ユーザ情報画面 B

## 画面詳細

### ユーザ記事一覧管理画面
- タイトル：ユーザー1の記事一覧
- 検索機能
- 一覧  
  - タイトル、作成日時、更新日時、タグ、
  - ページネーション
### ユーザ記事詳細管理画面 
- タイトル
- 作成日時, 更新日時
- タグ
- 本文
- ボタン
  - 編集、削除

### 記事編集画面
- 作成日時, 更新日時
- タグ
- 本文
- ボタン
  - 編集、削除
  
### 記事一覧画面
- タイトル：記事一覧
- 検索機能
- 一覧  
  - タイトル、作成日時、更新日時、タグ、
  - ページネーション

### 記事詳細画面
- タイトル
- 作成日時, 更新日時
- タグ
- 本文