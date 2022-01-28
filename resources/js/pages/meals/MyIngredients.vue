<template>
    <div class="container">
      <div class="column">
        <div class="my_ingredients">
        <h2> Mijn huidige ingredienten: </h2>
          <li v-for="ingredient in user.ingredients" :key="ingredient.id">
              {{ ingredient.name }}
          </li>
        </div>
      </div>
      <div class="column">
        <div class="add_ingredients">
          <h2> Voeg ingredienten toe: </h2>
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
}

.column {
  flex: 50%;
}


</style>