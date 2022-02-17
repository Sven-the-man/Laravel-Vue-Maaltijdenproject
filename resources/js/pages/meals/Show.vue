<template>
  <div class="container">
    <div class="meal">
      <div class="madeMealQuestion" v-if="meal">
        <p v-if="meal.isMade" style="color: green">
          Je hebt deze maaltijd gemaakt!
        </p>
        <p v-else>Je hebt deze maaltijd nog niet gemaakt....</p>
        <img v-if="meal.isMade" class="thumbs" src="../images/thumbs_up.jpg" />
        <img
          v-else
          @click="submitMake"
          class="thumbs"
          src="../images/thumbs_down.jpg"
        />
      </div>
      <div class="title">
        <h1>{{ meal.name }}</h1>
      </div>
      <div class="image">
        <img :src="'../' + meal.image_name" />
      </div>
      <div class="ingredients">
        <h3>Benodigdheden:</h3>
        <ul>
          <li v-for="ingredient in meal.ingredients" :key="ingredient.id">
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
    user() {
      return this.$store.getters["account/get"];
    },
    meal() {
      const currentMeal = {
        ...this.$store.getters["meals/getById"](
          parseInt(this.$route.params.id)
        ),
      };

      const userMealIds = this.$store.getters["account/get"].meals;

      let result = userMealIds.find((element) => {
        return element == currentMeal["id"];
      });

      const isMade = result !== undefined;

      if (isMade) {
        return { ...currentMeal, isMade };
      }

      return currentMeal;
    },
  },
  mounted() {
    this.$store.dispatch("meals/getCurrentMeal", {
      id: parseInt(this.$route.params.id),
    });
    this.$store.dispatch("account/set");
  },
  methods: {
    submitMake() {
      const mealId = { meal_id: this.meal.id };
      this.$store.dispatch("account/makeUserMeal", mealId);
    },
  },
};
</script>

<style scoped>
.container {
  text-align: left;
  width: 50%;
  font-size: 18px;
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
  width: 40%;
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

.madeMealQuestion {
  text-align: center;
  font-size: 30px;
}

.thumbs {
  width: 150px;
}
</style>
