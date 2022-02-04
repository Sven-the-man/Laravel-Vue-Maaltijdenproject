<template>
    <div class="app">
        <Navbar />
        <router-view />
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
export default {
    components: { Navbar },
    data() {
        return {
            
        };
    }
};
</script>

<style scoped>

.app {
    padding-top: 60px;
}



</style>

