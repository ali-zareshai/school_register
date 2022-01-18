import VueRouter from 'vue-router';

let routes = [
    {
        path: '/order-status',
        components:{
            main: require('./components/OrderStatus.vue').default,
        }
    }
];

export default new VueRouter({
    routes
})