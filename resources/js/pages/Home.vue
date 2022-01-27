<template>
    <div class="container">
        <main class="grid">
            <article v-for="meal in meals" :key="meal.id">
                <div class="text">
                    <router-link
                        :to="{ name: 'meal.show', params: { id: meal.id } }"
                    >
                        <img
                            src="https://www.foodandfriends.nl/app/uploads/2020/12/Humburger-Kookschool-klassiek.jpg"
                        />
                    </router-link>
                    <h3>{{ meal.name }}</h3>
                </div>
            </article>
        </main>
        <b-pagination-nav
            :link-gen="linkGen"
            :number-of-pages="numPages"
            v-model="currentPage"
        />
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentPage: 1,
            perPage: 8
        };
    },
    methods: {
        linkGen(pageNum) {
            return "#page=" + pageNum;
        }
    },
    computed: {
        meals() {
            const all_meals = this.$store.getters["meals/getAll"];
            return all_meals.slice(
                (this.currentPage - 1) * this.perPage,
                this.currentPage * this.perPage
            );
        },
        numPages() {
            return Math.ceil(
                this.$store.getters["meals/getAll"].length / this.perPage
            );
        }
    },
    mounted() {
        this.$store.dispatch("meals/setAll");
    }
};
</script>

<style>
.container {
    width: 60%;
}
.grid {
    padding-top: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 20px;
    align-items: stretch;
}
.grid > article {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
    background: white;
}
.grid > article img {
    max-width: 100%;
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
}
.text {
    padding: 20px;
    text-align: center;
}
</style>
