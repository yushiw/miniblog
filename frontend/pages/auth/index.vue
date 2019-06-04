<template>
  <div>
    <div class="content">
      <h1>{{ title }}</h1>
      <div class="form-group">
        <label for="name">ユーザー名</label>
        <input id="name" v-model="name" class="form-control" />
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input
          id="password"
          v-model="password"
          type="password"
          class="form-control"
        />
      </div>
      <div v-if="!isLoginMode" class="form-group">
        <label for="re-password">パスワード（確認）</label>
        <input
          id="re-password"
          v-model="passwordRe"
          type="password"
          class="form-control"
        />
      </div>
      <button
        type="button"
        class="btn btn-primary btn-block mt-5"
        @click="submit"
      >
        {{ submitText }}
      </button>
      <div class="switch my-2">
        <button @click="isLoginMode = !isLoginMode">
          {{ switchText }}
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isLoginMode: true,
      name: '',
      password: '',
      passwordRe: ''
    }
  },

  computed: {
    title() {
      return this.isLoginMode ? 'ログイン' : '新規登録'
    },
    switchText() {
      return this.isLoginMode ? '新規登録する' : 'ログインする'
    },
    submitText() {
      return this.isLoginMode ? 'ログインする' : '新規登録する'
    }
  },

  methods: {
    submit() {
      if (this.isLoginMode) {
        this.login()
      } else {
        this.register()
      }
    },
    async login() {
      try {
        await this.$axios.$post('/backend/auth/login', {
          name: this.name,
          password: this.password
        })
        location.href = '/my/articles'
      } catch (e) {
        console.log(e)
      }
    },
    register() {
      console.log('register')
    }
  }
}
</script>
<style lang="scss">
body {
  background: $light-color;
}
h1 {
  margin-bottom: 2.5rem;
}
.switch {
  text-align: right;
  font-weight: bold;
  color: $accent-color;
}
.content {
  background: #fff;
  width: 30rem;
  margin: 4rem auto 0;
  padding: 1rem 2rem 4rem;
  border: 0.5rem solid $main-color;
}
</style>
