import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = () => new Vuex.Store({
  state: {
    qr_data: ''
  },
  mutations: {
    scanded (state, text) {
      state.qr_data = text
    }
  }
})

export default store