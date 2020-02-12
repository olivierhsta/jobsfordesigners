window.Vue = require('vue');
window.axios = require('axios');

Vue.component('jobsfordesigners-header', require('./components/JobsfordesignersHeader.vue').default);
Vue.component('job-list-with-filters', require('./components/JobListWithFilters.vue').default);
Vue.component('navigation-bar', require('./components/NavigationBar.vue').default);

const vueApp = new Vue({
    el: '#vapp'
});
