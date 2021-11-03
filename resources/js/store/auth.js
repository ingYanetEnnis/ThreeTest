
const state = {
    user: null
};
const getters = {
    isAuthenticated: state => !!state.user,
    StateUser: state => state.user,
};
const actions = {

};
const mutations = {
    setUser(state, payload){
        state.user = payload;
        localStorage.setItem('token', payload.token);

    },
    LogOut(state){
        state.user = null
        localStorage.setItem('token', null);
    },
};
const auth = {
    state : state,
    getters,
    actions,
    mutations
};
export default auth
