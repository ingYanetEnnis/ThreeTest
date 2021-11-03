import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
import quote from './quote'
Vue.use(Vuex)
const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        auth: auth,
        quote : quote
    },
    strict: debug,
})
