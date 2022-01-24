<template>
    <div>
        <h1>Alle maaltijden:</h1>
        <table>
            <tr v-for="meal in meals" :key="meal.id">
                <td>{{ meal.id }}</td>
                <td>{{ meal.name }}</td>
            </tr>
        </table>   
    </div>

</template>

<script>
    export default {
        computed: {
        meals() {
            return this.$store.getters['meals/getAll'];
        },
    },
    mounted() {
        this.$store.dispatch('meals/setAll');
    },
        

    }
</script>

<style scoped>
h1 {
    text-align: center;
}
</style>