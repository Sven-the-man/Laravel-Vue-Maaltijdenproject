<template>
    <div class="container">
        <h2> Mijn huidige ingredienten: </h2>
        {{user}}
    </div>
</template>

<script>
export default {
  computed: {
    user() {
      return this.$store.getters["user/getById"](
        parseInt(this.$route.params.id)
      );
    },
  },
};
</script>