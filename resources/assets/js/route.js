import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        name:'',
        components:{
            main: require('./components/register.vue').default,
        }
    }
];

export default new VueRouter({
    routes
})