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
    weightData: null,
    }),
    async mounted () {
  this.loaded = false

  try {
    //get weight data from db
    axios.get('/api/weight')
      .then(response => {
        // console.log('Weight Data: ', response.data); //response.data[0].weight
        this.weightData = this.processWeightData(response.data);
        // console.log('this.weightData: ', this.weightData);
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
  processWeightData(data) {
    const labels = data.map(entry => new Date(entry.weigh_in_date).toLocaleDateString());
    const datasets = [{
      label: 'Weight',
      backgroundColor: '#f87979',
      data: data.map(entry => entry.weight)
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
      labels: this.weightData.labels,
      datasets: [{
        label: 'Weight',
        backgroundColor: '#f87979',
        data: this.weightData.datasets[0].data
      }]
    };
    this.loaded = true
  }
},
  }
  </script>