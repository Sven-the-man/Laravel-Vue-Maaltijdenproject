<template>
  <div class="container">
    <div class="add_ingredient">
      Ingredient toevoegen lmao
    </div>
    <div class="all_ingredients">
      <li v-for="ingredient in ingredients" :key="ingredient.id">
        <p>{{ ingredient.name }}</p>
      </li>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
  },
};
</script>


