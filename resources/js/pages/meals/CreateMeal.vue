<template>
    <div class="container">
        <div class="row">
            <form enctype="multipart/form-data" @submit.prevent="createMeal">
                <div class="mb-3">
                    <label for="name" class="form-label">Maaltijd naam:</label>
                    <input id="name" v-model="meal.name" type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Instructies:</label>
                    <textarea id="description" v-model="meal.description" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredienten:</label>
                    <multiselect
                        v-model="meal.ingredients"
                        :options="ingredients"
                        track-by="id"
                        label="name"
                        multiple
                        :close-on-select="false"
                    />
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Afbeelding:</label>
                    <input id="image" ref="fileLoader" type="file" class="form-control" @change="dropDocument" />
                </div>
                <button type="submit" class="btn btn-primary">Stuur op!</button>
            </form>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
    components: {Multiselect},
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
     return this.$store.getters["ingredients/getAll"]
        },
    },
    mounted() {
        this.$store.dispatch('ingredients/setAll');
    },
    methods: {
        dropDocument(event) {
            this.meal.image = event.dataTransfer ? event.dataTransfer.files[0] : event.target.files[0];
        },
        createMeal() {
           
            const ingredients =
                this.meal.ingredients.length != 0
                    ? this.meal.ingredients.map(ingredient => ingredient.id)
                    : [];
            const formData = new FormData();
            formData.append('image', this.meal.image);
            formData.append('name', this.meal.name);
            formData.append('description', this.meal.description);
            formData.append('ingredient_id', ingredients);
            this.$store.dispatch('meals/create', formData);
            
        },
    },
};

</script>


<style scoped>
.container {
    padding-top: 80px;
}

.row {
    width: 60%;
}
</style>