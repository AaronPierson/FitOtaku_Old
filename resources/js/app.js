import './bootstrap';


import { createApp } from 'vue';
import chart from './components/BarChart'

const app = createApp({})
app.component('chart-grid', chart);

app.mount('#app')