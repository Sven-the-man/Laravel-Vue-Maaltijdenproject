<template>
    <div class="container" v-if="meal">
        <div class="justify-content-center">
            <form enctype="multipart/form-data" @submit.prevent="updateMeal">
                <div class="mb-3">
                    <label for="name" class="form-label">Wijzig maaltijd naam:</label>
                    <input id="name" v-model="newMeal.name" type="text"  class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Wijzig instructies:</label>
                    <textarea id="description" v-model="newMeal.description" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Wijzig ingredienten:</label>
                    <multiselect v-if="ingredients"
                        v-model="newMeal.ingredients"
                        :options="ingredients"
                        track-by="id"
                        label="name"
                        multiple
                        :close-on-select="false"
                    />
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Wijzig afbeelding:</label>
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
            newMeal: {
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
        meal() {
            const meal = {...this.$store.getters["meals/getById"](parseInt(this.$route.params.id))}

            this.newMeal = meal

            return meal
    
        },           

    },
    mounted() {
        this.$store.dispatch('meals/getCurrentMeal', { id: parseInt(this.$route.params.id) } );
    },

    methods: {

        dropDocument(event) {
            this.newMeal.image = event.dataTransfer ? event.dataTransfer.files[0] : event.target.files[0];
        },
        updateMeal() {
           
            const ingredients =
                this.newMeal.ingredients.length != 0
                    ? this.newMeal.ingredients.map(ingredient => ingredient.id)
                    : [];
            const formData = new FormData();
            formData.append('id', this.meal.id),
            formData.append('image', this.newMeal.image);
            formData.append('name', this.newMeal.name);
            formData.append('description', this.newMeal.description);
            formData.append('ingredient_id', ingredients);
           
            this.$store.dispatch('meals/updateMeal', formData);

            this.$router.go(-1);


        },
    },
};

</script>


