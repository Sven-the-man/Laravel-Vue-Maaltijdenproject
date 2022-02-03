<template>
  <nav class="navbar navbar-expand-sm fixed-top justify-content-center">
   
    <ul class="navbar_items">
      <li class="nav-item">
        <router-link v-if="!isLoggedIn" :to="{name: 'auth.login'}" class="nav-link">Log in</router-link>
        <a v-if="isLoggedIn" class="nav-link pe-auto" href="#" @click="logout">Log uit</a>
      </li>
      <li class="nav-item">
        <router-link to="/">Home</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/my_ingredients">Mijn maaltijden</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/admin_panel">Admin paneel (admin)</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
 export default {
     computed: {
         isLoggedIn() {
             return this.$store.getters['account/getIsLoggedIn'];
         },
     },
     methods: {
         logout() {
           this.$store.dispatch('account/logout');
        // this.$router.push('/');
      },     },
};
</script>

<style scoped>
.navbar {
  background: rgb(236, 227, 227);
  width: 100%;
  height: 50px;
  border: 1px solid black;
  text-align: center;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

a {
    padding: 16px;
}
</style>
