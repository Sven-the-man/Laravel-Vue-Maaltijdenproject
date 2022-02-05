<template>
    <div class="container">
      <div class="column left">
          <div class="add_ingredients">
            <h2>Nieuwe ingredienten</h2>
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
          <div class="my_ingredients">
            <h2> Mijn ingredienten </h2>
                <li v-for="ingredient in user.ingredients" :key="ingredient.id">
                    {{ ingredient.name }}
                </li>
          </div>
        </div>
        <div class="column right">
            <div class="my_meals">
                <h2>Mogelijke maaltijden:</h2>
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
          this.$store.dispatch('ingredients/update', ingredients);
        }
  },
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.container {
  width: 100%;
}

.column {
  float: left;
  padding: 10px;
  
}

.left {
  min-width: 25%;
  border-right: 1px solid black;
  text-align: left;
  height: 1000px;
}

.right {
  width: 75%;
  text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.my_ingredients {
  padding-top: 40px;
  text-align: left;
}
</style>
