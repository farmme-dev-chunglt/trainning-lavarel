import { createRouter, createWebHistory } from 'vue-router'
import FormProduct from './components/products/form.vue'
import ViewProduct from './components/products/index.vue'
import TrashProduct from './components/products/trash.vue'

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
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
