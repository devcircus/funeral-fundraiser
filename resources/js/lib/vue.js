import Vue from 'vue';

// Use Global Mixins
import Dispatchable from '../mixins/Dispatchable';
import Dates from '../mixins/Dates';

Vue.mixin(Dispatchable);
Vue.mixin(Dates);

// import global components
import BaseApp from 'JS/BaseApp.vue';
import HamburgerMenu from 'GeneralComponents/HamburgerMenu.vue';
import NavDropdown from 'GeneralComponents/NavDropdown.vue';

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

new Vue({
    el: 'base-app',
    components: { BaseApp, HamburgerMenu, NavDropdown },
});