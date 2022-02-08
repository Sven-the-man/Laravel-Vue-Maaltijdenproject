export const meals = {
    namespaced: true,
    state: () => ({all: []}),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
        getUserMeals: state => state.all,
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
    },
    actions: {
        async setAll({commit}) {
            const {data} = await axios.get('/meals');
            commit('SET_ALL', data);
        },
        async setUserMeals({commit}) {
            const {data} = await axios.get('user/meals');
            commit('SET_ALL', data);
        },
        async createMeal({commit}, payload) {
            console.log();
            const {data} = await axios.post('meals/create', payload);
            commit('SET_ALL', data);
        },
        async removeMeal({commit}, payload) {
            const {data} = await axios.post('meals/remove', {mealId: payload});
            commit('SET_ALL', data);
        },

        async updateMeal({commit}, payload) {
            const {data} = await axios.post(`meals/${payload.get('id')}/update`, {payload});
            commit('SET_ALL', data);
        },

        async getCurrentMeal({commit}, payload) {
            const {data} = await axios.get(`/meals/${payload.id}`);
            commit('SET_ALL', [data.meal]);
            commit('ingredients/SET_ALL', data.ingredients, {root: true});
        },
    },
};