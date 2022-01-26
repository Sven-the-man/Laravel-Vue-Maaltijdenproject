<template>
    <div class="container">
        <h1>{{ meal.name }}</h1>
        <div class="ingredients">
            <h3>Benodigdheden:</h3>
            <ul>
                <li
                    v-for="ingredient in meal.ingredient_id"
                    :key="ingredient.id"
                >
                    {{ ingredient.name }}
                </li>
            </ul>
        </div>
        <p>{{ meal.description }}</p>
    </div>
</template>

<script>
export default {
    computed: {
        meal() {
            return this.$store.getters["meals/getById"](
                parseInt(this.$route.params.id)
            );
        }
    },
    
};
</script>

<style scoped>
.container {
    text-align: center;
    width: 50%;
    font-size: 20px;
}
</style>
