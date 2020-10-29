export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'cars_pwa',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    { src: '@/plugins/qr.js', mode: 'client' },
    {src: '@/plugins/acc_ip.js'}
  ],
  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    // https://fonts.google.com/
    '@nuxtjs/google-fonts',
    // https://go.nuxtjs.dev/auth
    '@nuxtjs/auth'
  ],

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: 'user.php/signin', method: 'GET', propertyName: 'token' },
          user: { url: 'user.php/me', method: 'GET', propertyName: 'user' },
          logout: false
        }
      }
    },
    redirect: {
      login: '/'
    }
  },

  // Axios module configuration (https://go.nuxtjs.dev/config-axios)
  axios: {
    baseURL: 'http://192.168.2.37/CARS_PWA/api'
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  },

  server: {
    port: 8000, // default: 3000
    host: '0.0.0.0' // default: localhost
  },

  static: {
    prefix: false
  }
}
