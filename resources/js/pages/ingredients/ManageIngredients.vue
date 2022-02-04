<template>
  <div class="container">
    <div class="add_ingredient"></div>
    <p v-for="ingredient in ingredients" :key="ingredient.id">
        {{ingredient.name}}
    </p>
  </div>
</template>

<script>
export default {
  computed: {
      ingredients() {
          this.$store.getters["ingredients/getAll"];
      },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
  },
};
</script>


