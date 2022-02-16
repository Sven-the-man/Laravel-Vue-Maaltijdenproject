<template>
  <div class="container">
    <div class="navigation_buttons">
      <div class="button">
        <router-link :to="{ name: 'meal.create' }">
          <button class="btn btn-primary">Nieuw gerecht</button></router-link
        >
      </div>
      <div class="button">
        <router-link :to="{ name: 'ingredients.manage' }">
          <button class="btn btn-primary">
            Beheer ingredienten
          </button></router-link
        >
      </div>
    </div>
    <div class="pagination">
      <b-pagination
        :total-rows="totalRows"
        v-model="currentPage"
        :per-page="perPage"
      />
    </div>
    <div class="mealTable">
      <table class="blueTable">
        <tbody>
          <tr v-for="meal in meals" :key="meal.id">
            <td>
              <router-link :to="{ name: 'meal.show', params: { id: meal.id } }">
                {{ meal.name }}
              </router-link>
            </td>
            <td>
              <router-link :to="{ name: 'meal.edit', params: { id: meal.id } }">
                <button class="btn btn-primary">Bewerk</button>
              </router-link>
            </td>
            <td>
              <button @click="removeMeal(meal.id)" class="btn btn-primary">
                Verwijder
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentPage: 1,
      perPage: 12,
    };
  },

  computed: {
    meals() {
      const items = this.$store.getters["meals/getAll"];

      return items.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage
      );
    },
    totalRows() {
      return this.$store.getters["meals/getAll"].length;
    },
  },
  mounted() {
    this.$store.dispatch("meals/setAll");
  },

  methods: {
    removeMeal(mealId) {
      this.$store.dispatch("meals/removeMeal", mealId);
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
  margin-bottom: 20px;
}

.navigation_buttons {
  text-align: center;
}

.button {
  padding-right: 10px;
  padding-left: 10px;
  padding-bottom: 40px;
  padding-top: 40px;
  display: inline-block;
}

.container {
  width: 100%;
}
.title {
  text-align: center;
  padding: 40px;
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
