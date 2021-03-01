<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class="p-4">
      <inertia-link href="/">Home</inertia-link>

      <h1 class="text-lg font-bold">{{ username }}</h1>

      <ul
        class="flex flex-wrap content-start -mx-1 lg:-mx-4 infinite-container"
      >
        <li
          v-for="work in works"
          :key="work.id"
          class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 xl:w-1/4"
        >
          <article class="rounded-lg shadow-lg">
            <inertia-link
              :href="route('work.show', work.id)"
              class="block w-full relative"
            >
              <img
                alt="Placeholder"
                class="block h-auto w-full"
                src="https://picsum.photos/600/400/?random"
              />
              <header
                class="w-full flex items-center justify-between leading-tight p-2 md:p-4 absolute bottom-0 left-0"
              >
                <h3 class="text-lg text-white">
                  {{ work.id }} - {{ work.title }}
                </h3>
              </header>
            </inertia-link>
            <footer class="flex items-center leading-none p-2 md:p-4">
              <img
                alt="Placeholder"
                class="block rounded-full"
                src="https://picsum.photos/32/32/?random"
              />
              <p class="ml-2 text-sm">
                <template v-if="work.users.length > 1">
                  <div class="flex sm:items-center text-sm">
                    <div class="group inline-block relative">
                      <button
                        class="text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center"
                      >
                        <span class="mr-1">合同作品</span>
                        <svg
                          class="fill-current h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                          />
                        </svg>
                      </button>
                      <ul
                        class="z-10 absolute hidden bg-white text-gray-700 pt-1 group-hover:block"
                      >
                        <li v-for="user in work.users" :key="user.id" class="">
                          <inertia-link
                            :href="route('user.show', user.id)"
                            class="rounded-t py-2 px-4 block whitespace-no-wrap"
                          >
                            {{ user.username }}
                          </inertia-link>
                        </li>
                      </ul>
                    </div>
                  </div>
                </template>
                <template v-else>
                  <li v-for="user in work.users" :key="user.id">
                    <inertia-link :href="route('user.show', user.id)">
                      {{ user.username }}
                    </inertia-link>
                  </li>
                </template>
              </p>
              <LikesCount :model="'work'" :likesId="work.id"></LikesCount>
            </footer>
          </article>
        </li>
      </ul>
    </div>
  </app-layout>
</template>

<script>
import { ref } from "vue";

import AppLayout from "@/Layouts/AppLayout";
import LikesCountComponent from "../../Component/LikesCountComponent.vue";

export default {
  components: {
    LikesCount: LikesCountComponent,
  },
  props: {
    user: Object,
    title: String,
    username: String,
    works: Array,
  },
  setup() {
    const likesId = ref(0);
    const model = ref();
    return {
      AppLayout,
      model,
      likesId,
    };
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
