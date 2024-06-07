import Vue from 'vue';
import Router from 'vue-router';
import ImageUpload from './Components/ImageUpload.vue';

Vue.use(Router);

const routes = [
  {
    path: '/',
    name: 'home',
    component: ImageUpload,
  },
  // You can add more routes here
];

const router = new Router({
  mode: 'history',
  routes,
});


