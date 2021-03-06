import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
// const state = {
//   count: 0
// }

export default new Vuex.Store({
    state: {
        auth: {},
    },
    actions: {
        authCheck({ commit }) {
            axios.get('/api/user')
                .then(data => {
                    console.log(data.data);
                    let auth = data.data
                    localStorage.setItem('AuthCheck','true');
                    commit('SET_AUTH', auth)
                })
            .catch((error) => {
                localStorage.removeItem("AuthCheck");

                return error;
              });

        }
    },
    mutations: {
        SET_AUTH(state, auth) {
            state.auth = auth;
        }
    }
})