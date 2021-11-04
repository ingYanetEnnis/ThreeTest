import axios from "../interceptor/axiosApi";
const state = {
    quotes: [],
    quoteCurrent: null
};
const getters = {

};
const actions = {
    historyQuotes (context) {
        axios.get('/api/quotes').then((response) => {
            context.commit('setQuotes', response.data.data)
        })
    },
    checkPrice (context, payload) {
        axios.get('/api/quote', { params: {
            symbol: payload
        }}).then((response) => {
            context.commit('setQuoteCurrent', response.data.data)
        })
    },
};
const mutations = {
    setQuotes(state, payload){
        state.quotes = payload
    },
    setQuoteCurrent(state, payload){
        state.quoteCurrent = payload;
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
