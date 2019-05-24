<template>
  <dev class="container-fluid">
    <h1>新規作成</h1>
    <div class="row">
      <div class="offset-sm-1 col-sm-10">
        <form>
          <div class="form-group">
            <label for="titleInput">タイトル</label>
            <input
              type="text"
              class="form-control"
              id="titleInput"
              placeholder="タイトル"
            />
          </div>
          <div class="form-group">
            <label for="textarea">本文</label>
            <textarea class="form-control" id="textarea"></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="offset-sm-8">
        <n-link to="/my/articles" class="btn btn-secondary">
          キャンセル
        </n-link>
        <n-link to="/my/articles" class="btn btn-primary">
          登録
        </n-link>
      </div>
    </div>
  </dev>
</template>
