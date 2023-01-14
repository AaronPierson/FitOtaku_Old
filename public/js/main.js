import Vue from 'vue'
import Chart from 'chart.js'
import { Bar, Line } from 'vue-chartjs'

Vue.component('line-chart', Line)
Vue.component('bar-chart', Bar)


new Vue({
    el: '#app',
    data: {
        chartData: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: '#f87979',
                    data: [40, 39, 10, 40, 39, 80, 40]
                },
                {
                    label: 'Data Two',
                    backgroundColor: '#f87979',
                    data: [40, 39, 10, 40, 39, 80, 40]
                }
            ]
        }
    }
});
