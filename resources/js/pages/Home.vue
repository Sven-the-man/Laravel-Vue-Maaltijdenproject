<template>
  <div class="container">
    <h1>Alle maaltijden:</h1>
    <div class="all_meals">
        <div v-for="meal in meals" :key="meal.id">
          {{ meal.id }}
          {{ meal.name }}
        </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    meals() {
      return this.$store.getters["meals/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("meals/setAll");
  },
};
</script>

<style scoped>
.container {
  text-align: center;
  font-size: 20px;
  text-align: center;
}

.all_meals {
  text-align: center;
  font-size: 20px;
  
}
</style>