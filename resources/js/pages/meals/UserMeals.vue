<template>
  <div class="container">
    <div class="sidebar">
      <div class="add_ingredients">
        <h2>Nieuwe ingredienten</h2>
        <form
          enctype="multipart/form-data"
          @submit.prevent="updateUserIngredients"
        >
          <multiselect
            v-model="selectedIngredients"
            :options="ingredients"
            track-by="id"
            label="name"
            multiple
            :close-on-select="false"
          />
          <button type="submit" class="btn btn-primary mr-1">Pas aan</button>
        </form>
      </div>
      <div class="user_ingredients">
        <h2>Mijn ingredienten</h2>
        <div class="list">
          <li v-for="ingredient in userIngredients" :key="ingredient.id">
            {{ ingredient.name }}
          </li>
        </div>
      </div>
      <div class="user_ingredients">
        <h4>Gemaakte maaltijden (debug)</h4>
        <div class="list">
          <li v-for="meal in userMeals" :key="meal.id">
            {{ meal.id }}
          </li>
        </div>
      </div>
    </div>
    <div class="main">
      <div class="my_meals">
        <h2>Voor deze maaltijden heb je alle ingredienten in huis!</h2>
        <div class="container">
          <div class="navigation">
            <b-pagination
              :total-rows="totalRows"
              v-model="currentPage"
              :per-page="perPage"
            />
          </div>
          <main class="grid" :v-if="meals">
            <div class="article" v-for="meal in meals" :key="meal.id">
              <div class="text">
                <router-link
                  :to="{ name: 'meal.show', params: { id: meal.id } }"
                >
                  <img :src="'../' + meal.image_name" />
                </router-link>
                <p>{{ meal.name }}</p>
                <p style="color: green" v-if="meal.isMade">Maaltijd gemaakt!</p>
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import Multiselect from "vue-multiselect";
export default {
  components: {
    Multiselect,
  },
  data() {
    return {
      selectedIngredients: [],
      currentPage: 1,
      perPage: 15,
    };
  },
  computed: {
    userIngredients() {
      return this.$store.getters["user/getAll"].ingredients;
    },
    userMeals() {
      return this.$store.getters["user/getAll"].meals;
    },
    user() {
      return this.$store.getters["account/get"];
    },
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    meals() {
      let meals = this.$store.getters["meals/getAll"];

      // defines all the user's current ingredient id's
      const userIngredientIds = this.user.ingredients.map(
        (ingredient) => ingredient.id);

      // returns only the meals where the user has all the required ingredients for
      // const mappedMealIngredients = meals.map(meal => meal.ingredient_id.map(ingredient => ingredient.id));
    
      // check if user has already made the remaining meals
      const userMealIds = this.user.meals.map((meal) => meal.id);
      meals = meals.map((meal) => {
        let result = userMealIds.find((element) => {
          return element === meal.id;
        });

      // sets isMade status on already made meals
        const isMade = result !== undefined;
        return { ...meal, isMade };
      });
      
      // slices and paginates the result
      return meals.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage
      );
    },
    totalRows() {
      return this.$store.getters["meals/getAll"].length;
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("meals/setAll");
  },
  methods: {
    updateUserIngredients() {
      const ingredients = this.selectedIngredients.map((select) => select.id);
      this.$store.dispatch("user/updateUserIngredients", ingredients);
    },
  },
};
</script>

<style scoped>
.container {
  min-width: 60%;
}

.sidebar {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 400px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding: 50px;
  border: 1px solid black;
}

.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
  text-align: center;
}
.add_ingredients {
  padding-top: 20px;
  text-align: center;
}

.user_ingredients {
  text-align: left;
  padding-top: 20px;
}

.list {
  text-align: left;
  padding-left: 15px;
}
</style>
