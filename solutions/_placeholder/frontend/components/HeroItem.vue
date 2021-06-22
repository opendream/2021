<template>
  <div class="py-2 px-2 mx-auto bg-white rounded shadow-md py-4 flex">
    <img
      class="block mx-auto w-24 rounded"
      :src="item.userAvatar"
      :alt="item.userAvatar"
    />
    <div class="pl-2 text-left">
      <div>
        <p class="text-lg text-black font-semibold">{{ item.title }}</p>
        <p class="text-gray-500 font-thin text-sm">{{ item.body }}</p>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
import Vue, { PropType } from 'vue'
type AvatarType = {
  id: number
  userId: number
  title: string
  body: string
  userAvatar: string
}
export default Vue.extend({
  props: {
    item: {
      type: Object as PropType<AvatarType>,
      default: null,
    },
  },
})
</script>
