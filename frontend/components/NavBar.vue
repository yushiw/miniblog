<template>
  <div>
    <b-navbar toggleable="lg" type="dark">
      <b-navbar-brand href="/articles">MiniBlog</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item v-if="isAdmin" href="#">ユーザー一覧</b-nav-item>
          <b-nav-item v-if="isLoggedIn" href="/my/articles">
            マイブログ
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-item v-if="isLoggedIn" href="#">ログアウト</b-nav-item>
          <b-nav-item v-else href="#">ログイン</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  props: {
    isLoggedIn: {
      type: Boolean,
      default: false
    },
    userType: {
      // -1: guest, 0: admin, 1: user
      type: Number,
      default: -1
    }
  },
  computed: {
    isAdmin() {
      return this.userType === 1
    }
  }
}
</script>
<style lang="scss">
.navbar {
  background: $main-color;
}
</style>
