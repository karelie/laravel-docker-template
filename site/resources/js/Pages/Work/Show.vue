<template>
  <div class="p-4">
    <inertia-link href="/">Home</inertia-link>

    <h1 class="text-lg font-bold">{{ title }}</h1>

    <p>{{ description }}</p>
    <div class="bg-white shadow-xl rounded-lg w-1/2">
      <ul class="divide-y divide-gray-300">
        <li
          v-for="user in users"
          :key="user.id"
          class="hover:bg-gray-50 cursor-pointer"
        >
          <inertia-link :href="route('user.show', user.id)" class="p-4 block">{{
            user.username
          }}</inertia-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    work: Object,
    title: String,
    description: String,
    users: Array,
  },

  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title;
      },
    },
  },
};
</script>
