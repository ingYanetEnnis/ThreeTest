import axios from "../interceptor/axiosApi";
const state = {
    quotes: []
};
const getters = {

};
const actions = {
    historyQuotes (context) {
        axios.get('/quotes').then((response) => {
            context.commit('addQuote', response.data)
        })

    }
};
const mutations = {
    setQuote(state, payload){
        state.quotes = payload
    },
    addQuote(state, payload){
        state.quotes.push(payload)
    }
};
const quote =  {
    namespaced: true,
    state : state,
    getters,
    actions,
    mutations
};
export default quote
