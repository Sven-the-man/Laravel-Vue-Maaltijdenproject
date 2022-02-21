<template>
    <div class="container">
        <InputForm @on-submit="createMeal" />
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import InputForm from "./components/InputForm.vue";

export default {
    components: { Multiselect },
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
    computed: {
        ingredients() {
            return this.$store.getters["ingredients/getAll"];
        },
    },
    mounted() {
        this.$store.dispatch("ingredients/setAll");
    },
    methods: {
        dropDocument(event) {
            this.meal.image = event.dataTransfer
                ? event.dataTransfer.files[0]
                : event.target.files[0];
        },
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
