<template>
  <div class="container">
    <div class="title">
      <h2>Beheer ingredienten:</h2>
    </div>
    <div class="add_ingredient">
      <form @submit.prevent="createIngredient">
        <input id="name" v-model="ingredient.name" type="text" />
        <button type="submit" class="btn btn-primary">Stuur op</button>
      </form>
    </div>
    <div class="pagination">
      <b-pagination
        :total-rows="totalRows"
        v-model="currentPage"
        :per-page="perPage"
      />
    </div>
    <div class="all_ingredients">
      <div class="mealTable">
        <table class="blueTable">
          <tbody>
            <tr v-for="(ingredient, index) in ingredients" :key="ingredient.id">
              <td>{{ ingredient.name }}</td>
              <td>
                <form @submit.prevent="updateIngredient(newIngredient[index], ingredient.id)">
                  <input v-model="newIngredient[index]" type="text" :placeholder="ingredient.name" />
                  <button class="btn btn-primary">Update</button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentPage: 1,
      perPage: 12,
      ingredient: {
        name: null,
      },
      newIngredient: []       
    };
  },
  computed: {
    ingredients() {
      const items = this.$store.getters["ingredients/getAll"];
      return items.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage
      );
    },
    totalRows() {
      return this.$store.getters["ingredients/getAll"].length;
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
  },
  methods: {
    createIngredient() {
      const ingredient = this.ingredient;
      this.$store.dispatch("ingredients/create", ingredient);
    },
    updateIngredient(name, id) {
      this.$store.dispatch("ingredients/update", {name, id});
    },
  },
};
</script>

<style scoped>
body {
  text-align: center;
}
.pagination {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}
input {
  width: 150px;
}
button {
  height: 35px;
  margin-left: 10px;
  display: inline-block;
}

.container {
  width: 100%;
}
.title {
  text-align: center;
}

.add_ingredient {
  text-align: center;
  margin: 20px;
}

a,
u {
  text-decoration: none;
  color: black;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #1c6ea4;
  border: 1px solid black;
  display: inline-block;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

table.blueTable {
  border: 1px solid #1c6ea4;
  background-color: #eeeeee;
  text-align: center;
  border-collapse: collapse;
  margin: auto;
}
table.blueTable td,
table.blueTable th {
  border: 1px solid #aaaaaa;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 18px;
  width: 250px;
}
table.blueTable tr:nth-child(even) {
  background: #d0e4f5;
}
table.blueTable thead {
  background: #1c6ea4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1c6ea4 100%);
  background: -webkit-linear-gradient(
    top,
    #5592bb 0%,
    #327cad 66%,
    #1c6ea4 100%
  );
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1c6ea4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 18px;
  font-weight: bold;
  color: #ffffff;
  border-left: 2px solid #d0e4f5;
}
table.blueTable thead th:first-child {
  border-left: none;
}
</style>
