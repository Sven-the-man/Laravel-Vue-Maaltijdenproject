<template>
  <div class="container">
    <div class="justify-content-center">
      <form enctype="multipart/form-data" @submit.prevent="$emit('on-submit', meal)">
        <div class="mb-3">
          <label for="name" class="form-label">Maaltijd naam:</label>
          <input
            id="name"
            v-model="meal.name"
            type="text"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Instructies:</label>
          <textarea
            id="description"
            v-model="meal.description"
            class="form-control"
          />
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
          <input
            id="image"
            ref="fileLoader"
            type="file"
            class="form-control"
            @change="dropDocument"
          />
        </div>
        <button type="submit" class="btn btn-primary">Stuur op!</button>
      </form>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
  components: { Multiselect },
};
  
export default {
  props: {
    user: {
        type: Object,
        },
    },
  data() {
    return {
      meal: {
        name: null,
        description: null,
        image: null,
        ingredients: [],
            },
        };
    };
},