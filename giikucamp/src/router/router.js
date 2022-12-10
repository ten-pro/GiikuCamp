import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue';
import Header from '../components/Header.vue';

const routes = [
  {
    path: '/',
    component: Home,
  },
  {
    path: '/header',
    component: Header,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router