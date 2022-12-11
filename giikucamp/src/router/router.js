import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue';
import Post from '../components/Post.vue';

const routes = [
  {
    path: '/',
    component: Post,
  },
  {
    path: '/post',
    component: Post,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router