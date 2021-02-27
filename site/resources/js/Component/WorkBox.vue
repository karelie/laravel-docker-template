<template>
  <div class="p-4">
    <div class="my-12 mx-auto px-4 md:px-12">
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
              :href="route('works.show', work.id)"
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
                          <a
                            class="rounded-t py-2 px-4 block whitespace-no-wrap"
                            href="#"
                          >
                            {{ user.name }}</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </template>
                <template v-else>
                  <li v-for="user in work.users" :key="user.id">
                    {{ user.name }}
                  </li>
                </template>
              </p>
            </footer>
          </article>
        </li>
      </ul>
    </div>
    <infinite-loading @infinite="infiniteHandler"></infinite-loading>
  </div>
</template>


<script>
export default {
  props: {
    page: Number,
    works: Array,
  },
  data() {
    return {
      page: 1,
      works: [],
    };
  },
  methods: {
    infiniteHandler($state) {
      //web.phpで設定したルーティング
      axios
        .get("/api/works", {
          params: {
            page: this.page,
            per_page: 1,
          },
        })
        .then(({ data }) => {
          //そのままだと読み込み時にカクつくので1500毎に読み込む
          setTimeout(() => {
            if (this.page < data.data.length) {
              this.page += 1;
              this.works.push(...data.data);
              $state.loaded();
            } else {
              $state.complete();
            }
          }, 200);
        })
        .catch((err) => {
          $state.complete();
        });
    },
  },
};
</script>