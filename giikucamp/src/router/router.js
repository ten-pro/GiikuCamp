import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Create from '../components/Create.vue';
import Home from '../components/Home.vue';
import Post from '../components/Post.vue';
import Setting from '../components/Setting.vue';

const routes = [
  {
    path: '/',
    component: Login,
  },
  {
    path: '/create',
    component: Create,
  },
  {
    path: '/home',
    component: Home,
  },
  {
    path: '/post',
    component: Post,
  },
  {
    path: '/setting',
    component: Setting,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router