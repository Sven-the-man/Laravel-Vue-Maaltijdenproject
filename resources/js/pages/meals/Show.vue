<template>
  <div class="container">
    <div class="meal">
      <div class="title">
        <h1>{{ meal.name }}</h1>
      </div>
      <div class="image">
        <img :src="'../images/' + meal.image_name">
      </div>
      <div class="ingredients">
        <h3>Benodigdheden:</h3>
          <ul>
            <li v-for="ingredient in meal.ingredient_id" :key="ingredient.id">
              {{ ingredient.name }}
            </li>
          </ul> 
      </div>
      <div class="instructions">
        <h3>Bereidingswijze:</h3>
        <p>{{ meal.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    meal() {
      return this.$store.getters["meals/getById"](
        parseInt(this.$route.params.id)
      );
    },
  },
};
</script>

<style scoped>
.container {
  text-align: left;
  width: 60%;
  font-size: 18px;
  background: light-gray;
}

.title {
  text-align: center;
  margin: 20px;
  border-bottom: 1px solid grey;
}

.ingredients {
  border-bottom: 1px solid grey;
  margin: 40px;
}

img {
  width: 50%;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
  margin: 20px;
}
.image {
  border-bottom: 1px solid grey;
  margin: 20px;
  text-align: center;
}

.instructions {
  border-bottom: 1px solid grey;
  margin: 20px;
}
</style>
