import  { createRouter, createWebHistory } from  "vue-router"

import DomainComponent from "../components/DomainComponent";

const routes = [
    {
        path: '/',
        name: 'domains.index',
        component: DomainComponent
    }
]

export default createRouter( {
    history: createWebHistory(),
    routes
})
