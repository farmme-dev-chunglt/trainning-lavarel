import { createApp } from 'vue'
import App from './App.vue'
import http from './plugins/baseAxios'
import VueAxios from 'vue-axios'
import router from './router.js';
import popup from './components/popup.vue';
import AdminLayout from './layouts/AdminLayout.vue';
import Paginate from "vuejs-paginate-next";
import { Form, Field } from 'vee-validate';
import { defineRule } from 'vee-validate';
import AllRules from '@vee-validate/rules';

//config validate
Object.keys(AllRules).forEach((rule) => {
  defineRule(rule, AllRules[rule])
})

const app = createApp(App);

app.component('popup', popup)
app.component('AdminLayout', AdminLayout)
app.component('Paginate', Paginate)
app.component('Form', Form)
app.component('Field', Field)

app
  .use(router)
  .use(VueAxios, http)
  .mount("#app")

