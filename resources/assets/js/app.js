
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import VueTable from './components/enso/vuedatatable/VueTable.vue';
import fontawesome from '@fortawesome/fontawesome-free';
import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
import Toastr from './components/enso/bulma/toastr';
import { faSearch, faSync, faAngleDown, faInfoCircle } from '@fortawesome/vue-fontawesome';

fontawesome.library.add(faSearch, faSync, faAngleDown, faInfoCircle);

Vue.use(Toastr, {
    position: 'right',
    duration: 3000,
    closeButton: true,
});

window.axios = axios;

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
