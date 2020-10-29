export default ({ req, store }) => {
    if (process.server) {
      // https://github.com/nuxt/nuxt.js/issues/2914
      const ip = req.connection.remoteAddress || req.socket.remoteAddress
      store.commit('SET_IP', ip)
    }
    if (process.client) {
      localStorage.setItem('ip', store.getters.ip)
    }
}