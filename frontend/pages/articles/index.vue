<template>
  <div>
    <h1>ミニブログ</h1>
    <b-table hover striped :fields="fields" :items="items" />
  </div>
</template>

<script>
export default {
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
        title: '記事' + String(num) + 'のタイトル',
        tags: 'ニュース,趣味',
        created_at: '2019/01/01 01:01:01',
        updated_at: '2019/01/01 01:01:01'
      }))
    }
  }
}
</script>
