<template>
  <div class="container-fluid">
    <NavBar is-logged-in :user-type="1" />
    <h1>マイブログ</h1>
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
      return [...Array(50).keys()].map(num => ({
        id: num,
        title: '記事' + String(num) + 'のタイトル',
        tags: 'ニュース,趣味',
        created_at: '2019/01/01 01:01:01',
        updated_at: '2019/01/01 01:01:01'
      }))
    }
  }
}
</script>
