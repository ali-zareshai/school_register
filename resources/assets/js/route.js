import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        name:'',
        components:{
            main: require('./components/register.vue').default,
        }
    },
    {
        path: '/form',
        name:'',
        components:{
            main: require('./components/form.vue').default,
        }
    }
];

export default new VueRouter({
    routes
})