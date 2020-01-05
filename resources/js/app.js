/* global Vue */

require('./bootstrap')
window.Vue = require('vue')

import vuetify from './vuetify/index'

import App from './App.vue'
import VueI18n from 'vue-i18n'
import localeFr from './lang/fr'
import localeEn from './lang/en'

Vue.use(VueI18n)

// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: window.kedl.locale, // set locale
  messages: {
    en: localeEn,
    fr: localeFr
  }
})

new Vue({
  vuetify,
  i18n,

  el: '#app',

  render: h => h(App)
})
