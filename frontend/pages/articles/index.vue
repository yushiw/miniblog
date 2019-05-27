<template>
  <div>
    <NavBar is-logged-in :user-type="1" />
    <h1>ミニブログ</h1>
    <div class="row">
      <div class="offset-sm-1 col-sm-10">
        <b-table hover striped :fields="fields" :items="items">
          <template slot="title" slot-scope="data">
            <nuxt-link :to="'/articles/' + data.item.id">{{
              data.value
            }}</nuxt-link>
          </template>
          <template slot="tags" slot-scope="data">
            <p v-for="tag in data.value" :key="tag.id">{{ tag.name }}</p>
          </template>
        </b-table>
      </div>
    </div>
  </div>
</template>

<script>
import NavBar from '~/components/NavBar'

export default {
  components: {
    NavBar
  },
  data() {
    return {
      fields: [
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
    }
  },
  computed: {
    items() {
      return this.rawItems
    }
  },
  async asyncData({ $axios }) {
    const res = await $axios.$get('http://php:8000/articles')
    console.log(res.articles)
    return { rawItems: res.articles }
  }
}
</script>
