<template>
  <div
    class="
      py-8
      px-8
      max-w-sm
      mx-auto
      bg-white
      rounded-xl
      shadow-md
      space-y-2
      sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6
    "
  >
    <img
      class="block mx-auto h-24 rounded-full sm:mx-0 sm:flex-shrink-0"
      :src="require('~/assets/images/my-profile.jpeg')"
      alt="Pariwat's Face"
    />
    <div class="text-center space-y-2 sm:text-left">
      <div class="space-y-0.5">
        <p class="text-lg text-black font-semibold">Pariwat Viriyaphan</p>
        <p class="text-gray-500 font-medium">Software Engineer</p>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
import Vue from 'vue'
export default Vue.extend({})
</script>
