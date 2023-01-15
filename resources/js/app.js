import './bootstrap';
import { createApp } from 'vue';
import chart from './components/BarChart'
import modal from './components/ModalBox'

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


app.mount('#app')