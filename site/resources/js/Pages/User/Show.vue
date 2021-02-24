<template>
  <div class="p-4">
    <inertia-link href="/">Home</inertia-link>

    <h1 class="text-lg font-bold">{{ username }}</h1>

    <div class="bg-white shadow-xl rounded-lg w-1/2">
      <ul class="divide-y divide-gray-300">
        <li
          v-for="work in works"
          :key="work.id"
          class="hover:bg-gray-50 cursor-pointer"
        >
          <inertia-link :href="route('work.show', work.id)" class="p-4 block">{{
            work.title
          }}</inertia-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    title: String,
    username: String,
    works: Array,
  },

  watch: {
    username: {
      immediate: true,
      handler(username) {
        document.title = username;
      },
    },
  },
};
</script>
