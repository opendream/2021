<template>
  <div class="pagination text-center">
    <span>Page:</span>
    <ul class="inline-block">
      <li v-for="page in pages" :key="page" class="inline-block px-4">
        <a
          href="#"
          :class="{ active: current == page }"
          @click.prevent="changePage(page)"
        >
          <div>
            <span class="transform -rotate-45">{{ page }}</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</template>
<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  props: {
    totalContent: {
      type: Number,
      default: 0,
    },
    current: {
      type: Number,
      default: 1,
    },
    pageRange: {
      type: Number,
      default: 2,
    },
  },

  computed: {
    pages(): number[] {
      const pages = []
      const totalPages = Math.ceil(this.totalContent / this.pageRange)

      for (let i = 1; i <= totalPages; i++) {
        pages.push(i)
      }
      return pages
    },
  },
  methods: {
    changePage(page: number) {
      this.$emit('page-changed', page)
    },
  },
})
</script>
<style lang="postcss">
.active div {
  height: 25px;
  width: 25px;
  color: white;
  display: inline-block;
  @apply rounded-full;
  @apply bg-pink-700;
}
</style>
