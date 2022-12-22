import { createRouter, createWebHistory } from 'vue-router'
import ViewProduct from './components/products/index.vue'
import TrashProduct from './components/products/trash.vue'
import FormLogin from './components/login/login.vue'

const routes = [
  {
    path: '/product',
    children: [
      {
        path: '',
        component: ViewProduct,
        name: 'ViewProduct'
      },
      {
        path: 'trash',
        component: TrashProduct,
        name: 'TrashProduct'
      }
    ]
  },
  {
    path: '',
    component: FormLogin,
    name: 'FormLogin'
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
