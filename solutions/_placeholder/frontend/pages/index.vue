<template>
  <div>
    <profile-badge />
    <pagination
      v-if="isFetched"
      class="my-4"
      :total-content="content.length"
      :current="currentPage"
      :page-range="pageSize"
      @page-changed="getContent($event)"
    />
    <div
      id="vatarItems"
      class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-1 p-2"
    >
      <hero-item
        v-for="item in getContent(currentPage)"
        :key="item.id"
        :item="item"
      />
    </div>
  </div>
</template>
<script lang="ts">
import Vue from 'vue'
import HeroItem from '../components/HeroItem.vue'
import Pagination from '../components/Pagination.vue'
export default Vue.extend({
  components: {
    Pagination,
    HeroItem,
  },
  data() {
    return {
      content: [],
      pageSize: 20,
      currentPage: 1,
      isFetched: false,
    }
  },
  async mounted() {
    const { data } = await this.$axios.get(
      'https://raw.githubusercontent.com/opendream/openteam/main/posts.json'
    )
    this.isFetched = true
    this.content = data
  },
  methods: {
    getContent(page: number) {
      this.currentPage = page
      const endAt = page * this.pageSize
      const currentContent = this.content.slice(endAt - this.pageSize, endAt)

      console.log('current content: ', currentContent)
      return currentContent
    },
  },
})
</script>
