export const ingredients = {
    namespaced: true,
    state: () => ({all: []}),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
    },
    actions: {
        async setAll({commit}) {
            const {data} = await axios.get('ingredients');
            commit('SET_ALL', data);
        },
        async update({commit}, payload) {
            console.log(payload);
            const {data} = await axios.post('user/ingredients/update', { ingredient_ids: payload });
            commit('SET_ALL', data);
        },
    },
};