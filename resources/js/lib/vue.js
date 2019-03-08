import Vue from 'vue';

// Use Global Mixins
import Dispatchable from '../mixins/Dispatchable';
import Dates from '../mixins/Dates';

Vue.mixin(Dispatchable);
Vue.mixin(Dates);

// import global components
import BaseApp from 'JS/BaseApp.vue';

// Use Vue-Modal
import VModal from 'vue-js-modal';
Vue.use(VModal, { componentName: "modal-component" });

// Use Snotify for notifications
import Snotify, { SnotifyPosition } from 'vue-snotify';
const options = {
    toast: {
        position: SnotifyPosition.rightTop,
        timeout: 3000,
        showProgressBar: true,
        closeOnClick: false,
        pauseOnHover: true
    }
}
Vue.use(Snotify, options)

// Filters
Vue.filter('ucase', function (value) {
    return value ? value.toUpperCase() : '';
});

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

new Vue({
    el: '#base-app',
    components: { BaseApp },
});