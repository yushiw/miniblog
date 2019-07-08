<template>
  <div>
    <NavBar is-logged-in :user-type="1" />
    <div class="container-fluid">
      <h1>新規作成</h1>
      <div class="row">
        <div class="offset-sm-1 col-sm-10">
          <form>
            <div class="form-group">
              <label for="titleInput">タイトル</label>
              <input
                id="titleInput"
                v-model="title"
                type="text"
                class="form-control"
                placeholder="タイトル"
              />
            </div>
            <div class="form-group">
              <label for="textarea">本文</label>
              <textarea id="textarea" v-model="text" class="form-control" />
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="offset-sm-8">
          <n-link to="/my/articles" class="btn btn-secondary">
            キャンセル
          </n-link>
          <button type="button" class="btn btn-primary" @click="store">
            登録
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavBar from '~/components/NavBar'

export default {
  middleware: 'auth',

  components: {
    NavBar
  },

  data() {
    return {
      title: '',
      text: ''
    }
  },

  methods: {
    async store() {
      try {
        await this.$axios.$post('/backend/my/articles/store', {
          title: this.title,
          text: this.text
        })

        this.$router.push('/my/articles')
      } catch (e) {
        console.log(e)
      }
    }
  }
}
</script>
