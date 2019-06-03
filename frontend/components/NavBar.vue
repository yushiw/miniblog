<template>
  <div>
    <b-navbar toggleable="sm" type="dark">
      <b-navbar-brand href="/articles">MiniBlog</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item v-if="isAdmin" href="#">ユーザー一覧</b-nav-item>
          <b-nav-item-dropdown v-if="isLoggedIn" text="マイブログ" right>
            <b-dropdown-item href="/my/articles">一覧を見る</b-dropdown-item>
            <b-dropdown-item href="/my/articles/create">
              記事を書く
            </b-dropdown-item>
          </b-nav-item-dropdown>
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
  span {
    color: rgba(255, 255, 255, 0.5);
  }
  span:hover {
    color: rgba(255, 255, 255, 0.75);
  }
}
</style>
