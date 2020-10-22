import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Home from './components/Home';
import About from './components/About';
import Register from './components/Register';
import Login from './components/Login';
import Dashboard from './components/Dashboard';
import PostsList from './components/Posts-list';
import PostsSingle from './components/Posts-single';
import TestsList from './components/Tests-list';
import TestsSingle from './components/Tests-single';
import StudentsList from './components/Students-list';
import StudentsSingle from './components/Students-single';




import NotFound from './components/NotFound';
import Admin from "./layout/Admin.vue";
import Public from "./layout/Public.vue";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/',
            component: Public,
            children: [
                {
                    path: '',
                    component: Home,
                    name: "Home",
                },
            ],
        },
        {
            path: '/about',
            component: Public,
            children: [
                {
                    path: '',
                    component: About,
                },
            ],
        },
        {
            path: '/register',
            component: Public,
            meta: { requiresVisitor: true },
            children: [
                {
                    path: '',
                    component: Register,
                },
            ],
        },
        {
            path: '/login',
            component: Public,
            meta: { requiresVisitor: true },
            children: [
                {
                    path: '',
                    component: Login,
                    name: 'Login',
                },
            ],
        },
        {
            path: "/dashboard",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: Dashboard,
                    name: "Dashboard",
                },
            ],

        },
        {
            path: "/posts",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: PostsList,
                    name: "PostsList",
                },
            ],

        },
        {
            path: "/post/:id",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: PostsSingle,
                    name: "PostsSingle",
                },
            ],

        },
        {
            path: "/tests",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: TestsList,
                    name: "TestsList",
                },
            ],

        },
        {
            path: "/test/:id",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: TestsSingle,
                    name: "TestsSingle",
                },
            ],

        },
        {
            path: "/students",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: StudentsList,
                    name: "StudentsList",
                },
            ],

        },
        {
            path: "/student/:id",
            component: Admin,
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    component: StudentsSingle,
                    name: "StudentsSingle",
                },
            ],

        }

    ]
});
function loggedIn() {
    return localStorage.getItem('AuthCheck');
};
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!loggedIn()) {
            next({
                name: 'Login',
            })
        } else {
            next()
        }
    }
    else if (to.matched.some(record => record.meta.requiresVisitor)) {
        if (loggedIn()) {
            next({
                name: 'Dashboard',
            })
        } else {
            next()
        }
    }
    else {
        next()
    }
})
export default router