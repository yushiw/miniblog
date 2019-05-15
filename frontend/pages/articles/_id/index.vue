<template>
  <div>
    <h1>{{ title }}</h1>
    <p>{{ tags }}</p>
    <p>{{ content }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: null,
      title: '記事1のタイトル',
      tags: 'ニュース,趣味',
      created_at: '2019/01/01 01:01:01',
      updated_at: '2019/01/01 01:01:01',
      content:
        '記事の内容記事の内容記事の内容記事の内容記事の内容記事の内容記事の内容'
    }
  },
  computed: {},
  created() {
    this.id = this.$route.params.id
    this.title = '記事' + this.id + 'のタイトル'
  }
}
</script>
