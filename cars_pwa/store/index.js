import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = () => new Vuex.Store({
  state: {
    qr_data: '',
    ip:''
  },
  mutations: {
    scanded (state, text) {
      state.qr_data = text
    },
    SET_IP(state, text){
      state.ip = text
    }
  }
})

export default store