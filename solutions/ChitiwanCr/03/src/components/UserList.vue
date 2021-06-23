<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="userList"
      :page.sync="page"
      :items-per-page="itemsPerPage"
      :sort-by="['id']"
      :sort-desc="[false]"
      hide-default-footer
      class="elevation-1"
      @page-count="pageCount = $event"
    >
      <template v-slot:[`item.userAvatar`]="{ item }">
        <v-avatar size="40">
          <img :src="item.userAvatar" />
        </v-avatar>
      </template>
    </v-data-table>
    <div class="text-center pt-2">
      <v-pagination v-model="page" :length="pageCount"></v-pagination>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      page: 1,
      pageCount: 0,
      itemsPerPage: 20,
      headers: [
        { text: 'ID ', value: 'id', width: '5%' },
        { text: 'UserId ', value: 'userId', width: '5%' },
        {
          text: 'UserAvatar ',
          sortable: false,
          value: 'userAvatar',
          width: '5%',
        },
        { text: 'Title ', sortable: false, value: 'title', width: '20%' },
        { text: 'Body ', sortable: false, value: 'body', width: '50%' },
      ],
      userList: [],
    };
  },
  created: async function() {
    let res = await axios.get(
      'https://raw.githubusercontent.com/opendream/openteam/main/posts.json'
    );
    this.userList = res.data;
  },
};
</script>
