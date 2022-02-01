<template>
    <div class="container">
        <div class="column">
            <div class="my_ingredients">
                <h2>Mijn huidige ingredienten:</h2>
                <li v-for="ingredient in user.ingredients" :key="ingredient.id">
                    {{ ingredient.name }}
                </li>
            </div>
        </div>
        <div class="column">
          <div class="add_ingredients">
            <h2>Alle ingredienten (test)</h2>
            <form enctype="multipart/form-data" @submit.prevent="updateUserIngredients">
            <multiselect
                    v-model="selectedIngredients"
                    :options="ingredients"
                    track-by="id"
                    label="name"
                    multiple
                    :close-on-select="false"
                />
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>
        </div>
      </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import Multiselect from 'vue-multiselect'
export default {
   components: {
    Multiselect
  },
  data(){
    return {
      selectedIngredients: []
    }
  },
  computed: {
    user() {
      return this.$store.getters["account/get"];
    },
    ingredients() {
     return this.$store.getters["ingredients/getAll"]
    },
  },
  mounted() {
    this.$store.dispatch('ingredients/setAll')
  },
  methods: {
        updateUserIngredients() {
    
          const ingredients = this.selectedIngredients.map(select => select.id);
          this.$store.dispatch('ingredients/create', ingredients);
        }
  },


};
</script>

<style scoped>
.column {
    float: left;
    width: 50%;
    border-left: 1px solid grey;
    margin: 40px;
    text-align: center;
}

/* Clear floats after the columns */
.container:after {
    content: "";
    display: table;
    clear: both;
}

.container {
    display: flex;
    width: 60%;
    padding-top: 50px;
}

.column {
    flex: 50%;
}
</style>
