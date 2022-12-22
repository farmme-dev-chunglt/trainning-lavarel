import { createApp } from 'vue'
import App from './App.vue'
import http from './plugins/baseAxios'
import VueAxios from 'vue-axios'
import router from './router.js';
import popup from './components/popup.vue';
import AdminLayout from './layouts/AdminLayout.vue';
import Paginate from "vuejs-paginate-next";

const app = createApp(App);

app.component('popup', popup)
app.component('AdminLayout', AdminLayout)
app.component('Paginate', Paginate)

app
  .use(router)
  .use(VueAxios, http)
  .mount("#app")

