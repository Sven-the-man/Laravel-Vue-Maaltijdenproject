<template>
    <div class="container">
        <h2> Mijn huidige ingredienten: </h2>
        
        <li v-for="ingredient in user.ingredient_id" :key="ingredient.id">
          {{ ingredient.name }}
        </li>
        {{user}}
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