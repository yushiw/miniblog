<template>
  <div>
    <NavBar is-logged-in :user-type="1" />
    <div id="content" class="container-fluid">
      <div class="article">
        <div class="created_at">
          {{ created_at }}
        </div>
        <h1 class="title">{{ title }}</h1>
        <div class="tags">
          <p>{{ tagsText }}</p>
        </div>
        <div class="main-text">
          <p>{{ text }}</p>
        </div>
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
      id: null,
      title: '',
      tags: '',
      created_at: '',
      updated_at: '',
      text: ''
    }
  },
  computed: {
    tagsText() {
      return this.tags.map(t => t.name).join(',')
    }
  },
  async asyncData({ $axios, params }) {
    const res = await $axios.$get(`/backend/articles/${params.id}`)
    return {
      title: res.title,
      tags: res.tags,
      text: res.text,
      created_at: res.created_at,
      updated_at: res.updated_at
    }
  }
}
</script>
<style lang="scss">
.created_at {
  color: $main-color;
  padding: 0;
}
.title {
  font-size: 2.2rem;
}
.article {
  max-width: 50rem;
  margin: 1rem auto 0;
  padding: 1rem 1rem 5rem;
  border: 2px solid $light-color;
}
.tags {
  text-align: center;
  font-weight: bold;
  font-size: 1.2rem;
}
</style>
