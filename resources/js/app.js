require('./bootstrap');
window.Vue = require('vue');

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import vuetify from './vuetify/index'

import App from './App.vue'

const app = new Vue({
    vuetify,

    render: h => h(App),

    el: '#app',
});
