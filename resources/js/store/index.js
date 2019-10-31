import Vue from 'vue';
import Vuex from 'vuex'
import storage from '../storage'

Vue.use(Vuex);
let user = storage.read('user') === null ? null : JSON.parse(storage.read('user'));
const store = new Vuex.Store({
    state: {
        count: 0,
        user: user,
    },
    mutations: {
        increment(state) {
            state.count++
        },
        login(state, user) {
            storage.write('user', JSON.stringify(user));
            state.user = user;
        }
    },
});
export default store
