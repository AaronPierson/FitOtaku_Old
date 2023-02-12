<template>
    <Line 
        v-if="loaded" :data="chartData"
      />
</template>
  
<script>
  import axios from 'axios'
  import { Line } from 'vue-chartjs'
  import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
} from 'chart.js'

  ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
)  
  export default {
    name: 'LineChart',
    components: { Line },
    data: () => ({
    loaded: false,
    chartData: null,
    calorieData: null,
    }),
    async mounted () {
  this.loaded = false

  try {
    axios.get('/api/calories')
      .then(response => {
        this.calorieData = this.processCalorieData(response.data);
        console.log('this.calorieData: ', this.calorieData);
        this.updateChartData();
      })
      .catch(error => {
        console.error('Error while fetching calories data: ', error);
      });
  } catch (e) {
    console.error(e)
  }
},
methods: {
  processCalorieData(data) {
    const labels = data.map(entry => new Date(entry.date_consumed).toLocaleDateString());
    const datasets = [{
      label: 'Calories',
      backgroundColor: '#f87979',
      data: data.map(entry => entry.calories)
    }];
    // console.log('labels: ', labels);
    // console.log('datasets: ', datasets);
    return {
      labels,
      datasets
    };
  },
  updateChartData() {
    this.chartData = {
      labels: this.calorieData.labels,
      datasets: [{
        label: 'Calories',
        backgroundColor: '#f87979',
        data: this.calorieData.datasets[0].data
      }]
    };
    this.loaded = true
  }
},
  }
  </script>