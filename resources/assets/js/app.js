require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios');
window.Axios = require('axios');


/*підключаємо компоненти*/
const ListData = Vue.component('list_data',require('./components/ListData.vue'));
const AddData = Vue.component('add_data',require('./components/AddData.vue'));
const EditData = Vue.component('edit_data',require('./components/EditData.vue'));
const DeleteData = Vue.component('delete_data',require('./components/DeleteData.vue'));

/*реєструємо модулі*/
Vue.use(VueRouter, VueAxios, Axios);

const routes = [
    {
        name:'list_data',
        path:'/',
        component:ListData
    },
    {
        name:'add_data',
        path:'/add-data',
        component:AddData
    },
    {
        name:'edit_data',
        path:'/edit-data',
        component:EditData
    },
    {
        name:'delete_data',
        path:'/delete-data',
        component:DeleteData
    }
];
const router = new VueRouter({ mode:'history', routes:routes});


new Vue({
   el:'#app',
    router:router,
    template:'<router-view></router-view>'

});