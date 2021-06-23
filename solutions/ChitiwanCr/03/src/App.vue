<template>
  <v-app class="app">
    <v-main>
      <UserList />
    </v-main>
  </v-app>
</template>

<script>
import UserList from './components/UserList.vue';

export default {
  name: 'App',

  components: {
    UserList,
  },

  data: () => ({
    //
  }),
};
</script>
<style>
#app {
  margin-top: 50px;
  margin-left: 50px;
  margin-right: 50px;
}
</style>
