<template>
    <div class="container">
        <InputForm :meal="meal" @on-submit="createMeal" />
    </div>
</template>

<script>
import InputForm from "/resources/js/components/InputForm.vue";

export default {
    components: { InputForm },

    data() {
        return {
            meal: {
                name: null,
                description: null,
                image: null,
                ingredients: [],
            },
        };
    },
    methods: {
        createMeal() {
            const ingredients =
                this.meal.ingredients.length != 0
                    ? this.meal.ingredients.map((ingredient) => ingredient.id)
                    : [];
            const formData = new FormData();
            formData.append("image", this.meal.image);
            formData.append("name", this.meal.name);
            formData.append("description", this.meal.description);
            formData.append("ingredient_id", ingredients);
            this.$store.dispatch("meals/createMeal", formData);

            this.$router.go(-1);
        },
    },
};
</script>

<style scoped>
.container {
    width: 60%;
}
</style>
