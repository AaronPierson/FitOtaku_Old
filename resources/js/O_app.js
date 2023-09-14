import './bootstrap';
import { createApp } from 'vue';
import chart from './components/BarChart'
import modal from './components/ModalBox'
import nav from './components/nav'

const app = createApp({
    data() {
        return {
          showModal: false,
        };
      },
      components: {
        modal,
      },
})
app.component('chart-grid', chart);
app.component('modal-box', modal);
app.component('nav-bar', nav);

app.mount('#app')