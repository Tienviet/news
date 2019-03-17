import Vue from 'vue'
import VueRouter from 'vue-router'

import BaseComponent from '../components/admin/BaseComponent.vue'
import UserTableComponent from '../components/admin/pages/UserTableComponent.vue'
import CreateUser from '../components/admin/pages/CreateUser.vue'
import EditUser from '../components/admin/pages/EditUser.vue'
import ListRole from '../components/admin/pages/ListRole.vue'
import CreateRole from '../components/admin/pages/CreateRole.vue'
import LoginPage from '../components/admin/auth/LoginPage'
import RegisterPage from '../components/admin/auth/RegisterPage'
import NotFoundPage from '../components/admin/error/NotFoundPage'
import widget from '../components/admin/pages/widget.vue'
import Category from '../components/admin/pages/category/ListCategory'
import Main from '../components/user/Main'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: Main,
            component: Main,
        },
        {
            path: '/admin',
            name: BaseComponent,
            component: BaseComponent,
            children: [
                {
                    path: 'dashboard',
                    name: 'widget',
                    component: widget
                },
                {
                    path: 'category',
                    name: 'Category',
                    component: Category
                },
                {
                    path: 'list-user',
                    name: 'UserTableComponent',
                    component: UserTableComponent
                },
                {
                    path: 'create-user',
                    name: 'CreateUser',
                    component: CreateUser
                },
                {
                    path: ':id',
                    name: 'EditUser',
                    component: EditUser
                },
                {
                    path: 'list-role',
                    name: 'ListRole',
                    component: ListRole
                },
                {
                    path: 'create-role',
                    name: 'CreateRole',
                    component: CreateRole
                }

            ]
        },
        {
            path: '/login',
            name: LoginPage,
            component: LoginPage,
        },
        {
            path: '/register',
            name: RegisterPage,
            component: RegisterPage,
        },

        {
            path: '*',
            name: NotFoundPage,
            component: NotFoundPage,
        },

    ]
})
console.log(router)

export default router
