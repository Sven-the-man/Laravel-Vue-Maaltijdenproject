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
          <li v-for="ingredient in user.ingredients" :key="ingredient.id">
            {{ ingredient.name }}
          </li>
        </div>
      </div>
    </div>
    <div class="main">
      <div class="my_meals">
        <h2>Mogelijke maaltijden:</h2>
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
                  <img :src="meal.image_name" />
                </router-link>
                <p>{{ meal.name }}</p>
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
    user() {
      return this.$store.getters["account/get"];
    },
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    meals() {
      const items = this.$store.getters["meals/getUserMeals"];

      return items.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage
      );
    },
    totalRows() {
      return this.$store.getters["meals/getUserMeals"].length;
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("meals/setUserMeals");
  },
  methods: {
    updateUserIngredients() {
      const ingredients = this.selectedIngredients.map((select) => select.id);
      this.$store.dispatch("ingredients/update", ingredients);
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
