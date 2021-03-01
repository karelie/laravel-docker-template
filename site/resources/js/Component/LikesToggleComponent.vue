<template>
  <span> {{ likes }}</span>
</template>

<script>
import axios from "axios";

export default {
  props: {
    model: String,
    likesId: Number,
  },
  data() {
    return {
      likes: "",
    };
  },
  mounted() {
    axios
      .get("/like/toggle/" + this.model + "/" + this.likesId)
      .then((response) => (this.likes = response.data))
      .catch((error) => console.log(error));
  },
};
</script>