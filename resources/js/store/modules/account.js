import axios from 'axios';

export const account = {
    namespaced: true,
    state: () => {
        const storedUser = localStorage.getItem('user')
        const storedIsLoggedIn = localStorage.getItem('isLoggedIn')
        return {
            user: storedUser ? JSON.parse(storedUser) : false,
            isLoggedIn: storedIsLoggedIn ? JSON.parse(storedIsLoggedIn): false,
            
        }
    },
    getters: {
        get: state => state.user,
        getIsLoggedIn: state => state.isLoggedIn,
    },
    mutations: {
        SET: (state, payload) => {
            state.user = payload;
            if(!payload) localStorage.removeItem('user')
            else localStorage.setItem('user', JSON.stringify(payload));
        },
        SET_LOGGEDIN: (state, payload) => {
            state.isLoggedIn = payload;
            if(!payload) localStorage.removeItem('isLoggedIn')
            else localStorage.setItem('isLoggedIn', JSON.stringify(payload));
        },
    },
    actions: {
        async login({commit}, payload) {
            const {data} = await axios.post('login', payload);
            commit('account/SET', data, {root: true});
            commit('SET_LOGGEDIN', true);
        },
        async logout({commit}) {
            commit('account/SET', undefined, {root: true});
            commit('SET_LOGGEDIN', false);
            await axios.get('logout');
        },
        async register({commit}, payload) {
            const {data} = await axios.post('register', payload);
            commit('account/SET', data, {root: true});
            commit('SET_LOGGEDIN', true);
        },
        async set({commit}) {
            const {data} = await axios.get('me');
            commit('SET', data);
        },
        async update({commit}, payload) {
            const {data} = await axios.put(`account/${payload.id}`, payload);
            commit('SET', data);
        },
        async removeBook({commit}, payload) {
            const {data} = await axios.post('remove-book', {bookId: payload});
            commit('SET', data);
        },
    },
};