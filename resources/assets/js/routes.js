import VueRouter from 'vue-router'

let routes = [
    {
        path:'/',
        component:require('./components/Home'),
    },
    {
        path:'/about',
        component:require('./components/About')
    },
    {
        path:'/message',
        component:require('./components/Message')
    }
];

export default new VueRouter({
    mode:'history',
    routes
})