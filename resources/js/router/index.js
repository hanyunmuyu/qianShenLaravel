import VueRouter from 'vue-router'
import Home from '../pages/home/Index'
import SchoolList from '../pages/school/SchoolList'
import SchoolIndex from '../pages/school/SchoolIndex'
import ExploreIndex from '../pages/explore/ExploreIndex'
import Attention from '../pages/explore/Attention'
import Login from '../pages/login/Login'
import Register from '../pages/login/Register'
import UserCenter from '../pages/user/UserCenter'

const router = new VueRouter({
    routes: [
        {
            path: '',
            name: 'Home',
            component: Home,
            children: [
                {

                    path: '',
                    name: 'SchoolIndex',
                    component: SchoolIndex,
                    children: [
                        {

                            path: '/school/list',
                            name: 'SchoolList',
                            component: SchoolList,
                        },
                    ]
                },
                {
                    path: 'explore',
                    name: 'ExploreIndex',
                    component: ExploreIndex,
                    children: [
                        {

                            path: '',
                            name: 'Attention',
                            component: Attention,
                        },
                    ]
                },
                {
                    path: '/user/center',
                    name: 'UserCenter',
                    component: UserCenter,
                },
            ]
        },
        {
            path: '/login',
            name: 'Login',
            component: Login,
        },
        {
            path: '/register',
            name: 'Register',
            component: Register,
        },
    ]
});
export default router
