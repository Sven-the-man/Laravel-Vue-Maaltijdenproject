<template>
    <div class="container">
        <h2> Mijn huidige ingredienten: </h2>
       {{user.ingredient_id}}
    </div>
</template>

<script>
export default {
  computed: {
    user() {
      return this.$store.getters["account/get"];
    },
  },
};
</script>