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
          <b-nav-item v-if="isLoggedIn" @click="showLogoutModal">
            ログアウト
          </b-nav-item>
          <b-nav-item v-else href="/auth">ログイン</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <!-- Logout Modal -->
    <b-modal ref="logout-modal" hide-footer>
      <template slot="modal-title">
        ログアウト
      </template>
      <p>本当にログアウトしますか？</p>
      <button
        class="btn btn-outline-secondary btn-block"
        @click="closeLogutModal"
      >
        キャンセル
      </button>
      <button class="btn btn-outline-warning btn-block" @click="logout">
        ログアウト
      </button>
    </b-modal>
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
  },

  methods: {
    showLogoutModal() {
      this.$refs['logout-modal'].show()
    },
    closeLogutModal() {
      this.$refs['logout-modal'].hide()
    },
    async logout() {
      try {
        await this.$auth.logout()
      } catch (e) {
        console.log(e)
      }
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
