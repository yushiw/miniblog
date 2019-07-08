<template>
  <div>
    <NavBar is-logged-in :user-type="1" />
    <div class="container-fluid">
      <h1>マイブログ</h1>
      <div v-if="errors.length > 0" class="row">
        <div class="offset-sm-1 col-sm-10 alert alert-danger">
          <ul>
            <li v-for="e of errors" :key="e">{{ e }}</li>
          </ul>
        </div>
      </div>
      <div class="row mb-3">
        <div class="offset-sm-9">
          <n-link to="/my/articles/create" class="btn btn-primary">
            ブログを作成する
          </n-link>
        </div>
      </div>
      <div class="row">
        <div class="offset-sm-1 col-sm-10">
          <b-table hover striped :fields="fields" :items="items">
            <template slot="title" slot-scope="data">
              <n-link :to="'/my/articles/' + data.item.id">{{
                data.value
              }}</n-link>
            </template>
            <template slot="tags" slot-scope="data">
              <p v-for="tag in data.value" :key="tag.id">{{ tag.name }}</p>
            </template>
          </b-table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavBar from '~/components/NavBar'

// const Cookie = process.client ? require('js-cookie') : undefined
// const cookieparser = process.server ? require('cookieparser') : undefined

const fields = [
  {
    key: 'title',
    label: 'タイトル'
  },
  {
    key: 'tags',
    label: 'タグ'
  },
  {
    key: 'created_at',
    label: '作成日時'
  },
  {
    key: 'updated_at',
    label: '更新日時'
  }
]

export default {
  middleware: 'auth',

  components: {
    NavBar
  },

  data() {
    return {
      fields: fields,
      errors: []
    }
  },

  computed: {
    items() {
      return this.rawItems
    }
  },

  async asyncData({ $axios, req, redirect }) {
    const res = await $axios.$get('/backend/my/articles')
    return { rawItems: res.articles }
  }
}
</script>
