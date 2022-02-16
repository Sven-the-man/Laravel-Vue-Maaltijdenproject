<template>
  <div class="container">
    <div class="sidebar">
      <div class="add_ingredients">
        <h2>Nieuwe ingredienten</h2>
        <form
          v-if="user"
          enctype="multipart/form-data"
          @submit.prevent="updateUserIngredients"
        >
          <multiselect
            v-model="currentUser.ingredients"
            :options="ingredients"
            track-by="id"
            label="name"
            multiple
            :close-on-select="false"
          />
          <button type="submit" class="btn btn-primary">
            Upload naar server
          </button>
        </form>
      </div>
      <div class="user_ingredients">
        <h2>Mijn ingredienten</h2>
        <div class="list">
          <li v-for="ingredient in user.ingredients" :key="ingredient.id">
            {{ ingredient.name }}
          </li>
        </div>
      </div>
    </div>
    <div class="main">
      <div class="my_meals">
        <h2 @click="filterCurrentMeals()">Voor deze maaltijden heb je alle ingredienten in huis!</h2>
        <div class="container">
          <div class="navigation">
            <b-pagination
              :total-rows="totalRows"
              v-model="currentPage"
              :per-page="perPage"
            />
          </div>
          <main class="grid" v-if="meals">
            <div class="article" v-for="meal in meals" :key="meal.id">
              <div class="text">
                <router-link
                  :to="{ name: 'meal.show', params: { id: meal.id } }"
                >
                  <img :src="'../' + meal.image_name" />
                </router-link>
                <p>({{ meal.id }}) {{ meal.name }}</p>
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
      currentPage: 1,
      perPage: 15,
    };
  },
  computed: {
    user() {
      const user = this.$store.getters["account/get"];
      this.currentUser = user;
      return user;
    },
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    meals() {
      let meals = this.$store.getters["meals/getAll"];

      // defines all the user's current ingredient id's
      const userIngredientIds = this.user.ingredients.map(
        (ingredient) => ingredient.id
      );

      // returns only the meals where the user has all the required ingredients for
      const mappedMealIngredientIds = meals.map((meal) =>
        meal.ingredient_id.map((ingredient) => ingredient.id)
      );

      let filteredMealIds = [];

      for (let n = 0; n < mappedMealIngredientIds.length; n++) {
        if (
          mappedMealIngredientIds[n].every((ingredient) =>
            userIngredientIds.includes(ingredient)
          )
        ) {
          filteredMealIds.push(n + 1);
        }
      }

      meals = meals.filter(function (meal) {
        return filteredMealIds.includes(meal.id);
      });

      // check if user has made the remaining meals
      const userMealIds = this.user.meals.map((meal) => meal.id);
      meals = meals.map((meal) => {
        let result = userMealIds.find((element) => {
          return element === meal.id;
        });

        // sets "isMade" status on already made meals
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
    this.$store.dispatch("account/set");
  },
  methods: {
    updateUserIngredients() {
      const ingredients = this.currentUser.ingredients.map(
        (select) => select.id
      );
      this.$store.dispatch("account/updateUserIngredients", ingredients);
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

button {
  margin: 10px;
}
</style>
