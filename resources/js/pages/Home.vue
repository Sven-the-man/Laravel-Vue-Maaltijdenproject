<template>
  <div class="container">
    <div class="navigation">
      <b-pagination
        :total-rows="totalRows"
        v-model="currentPage"
        :per-page="perPage"
      />
    </div>
    <main class="grid">
      <div class="article" v-for="meal in meals" :key="meal.id">
        <div class="text">
          <router-link :to="{ name: 'meal.show', params: { id: meal.id } }">
            <img :src="meal.image_name">
          </router-link>
          <h3>{{ meal.name }}</h3>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentPage: 1,
      perPage: 8,
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
};
</script>

<style>
.navigation {
  padding: 20px;
  margin: auto;
}
.container {
  width: 60%;
}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 0.5fr));
  grid-gap: 20px;
  align-items: stretch;
}
.grid > .article {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
  background: white;
}
.grid > .article img {
  max-width: 100%;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
  margin-bottom: 20px;
}
.text {
  margin-top: 20px;
  padding: 20px;
  text-align: center;
  font-size: 10px;
}

h3 {
  font-size: 10px;
}
</style>
