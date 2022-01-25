<template>
    <div>
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
h1 {
    text-align: center;
    padding: 50px;
}
</style>
