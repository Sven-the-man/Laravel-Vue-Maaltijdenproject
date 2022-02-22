<template>
  <InputForm :meal="meal" @on-submit="updateMeal" />
</template>

<script>
import Multiselect from "vue-multiselect";
import InputForm from "/resources/js/components/InputForm.vue";

export default {
  components: { InputForm },
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
    meal() {
      const meal = {
        ...this.$store.getters["meals/getById"](
          parseInt(this.$route.params.id)
        ),
      };

      this.newMeal = meal;

      return meal;
    },
  },
  mounted() {
    this.$store.dispatch("meals/getCurrentMeal", {
      id: parseInt(this.$route.params.id),
    });
  },

  methods: {
    updateMeal() {
      const ingredients =
        this.newMeal.ingredients.length != 0
          ? this.newMeal.ingredients.map((ingredient) => ingredient.id)
          : [];
      const formData = new FormData();
      formData.append("id", this.meal.id),
      formData.append("image", this.meal.image);
      formData.append("name", this.meal.name);
      formData.append("description", this.meal.description);
      formData.append("ingredient_id", ingredients);

      this.$store.dispatch("meals/updateMeal", formData);

      this.$router.go(-1);
    },
  },
};
</script>


