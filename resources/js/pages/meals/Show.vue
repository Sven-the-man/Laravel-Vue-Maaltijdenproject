<template>
  <div class="container">
    <div class="meal">
      <div class="title">
        <h1>{{ meal.name }}</h1>
      </div>
      <div class="image">
        <img src="https://www.foodandfriends.nl/app/uploads/2020/12/Humburger-Kookschool-klassiek.jpg">
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
  width: 40%;
  font-size: 18px;
  background: light-gray;
}

.title {
  text-align: left;
  margin: 40px;
  border-bottom: 1px solid grey;
}

.ingredients {
  border-bottom: 1px solid grey;
  margin: 40px;
}

img {
  width: 70%;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
  margin: 40px;
}
.image {
  border-bottom: 1px solid grey;
  margin: 40px;
}

.instructions {
  border-bottom: 1px solid grey;
  margin: 40px;
}
</style>
