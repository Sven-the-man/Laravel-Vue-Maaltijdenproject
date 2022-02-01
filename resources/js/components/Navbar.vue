<template>
  <nav class="navbar navbar-expand-sm fixed-top justify-content-center">
   
    <ul class="navbar_items">
      <li class="nav-item">
        <router-link to="/">Home</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/account">Mijn maaltijden</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/create_meal">Nieuwe maaltijd (admin)</router-link>
      </li>
    </ul>
  </nav>
</template>

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
