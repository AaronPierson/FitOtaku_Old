<template>
    <Line 
        v-if="loaded" :data="chartData"
        ref="lineChart"

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
    axios.get('/api/calories')
      .then(response => {
        this.calorieData = this.processCalorieData(response.data);
        console.log('this.calorieData: ', this.calorieData);
        this.updateChartData();
      })
      .catch(error => {
        console.error('Error while fetching calories data: ', error);
      });
},
methods: {
  processCalorieData(data) {
    console.log('data: ', data);
    let labels = [];
    let datasets = [{    
    label: 'Calories',    
    backgroundColor: '#f87979',    
    data: []
  }];
  
  for (const date in data) {
    console.log(date + ": " + data[date]);
    labels.push(date);
    datasets[0].data.push(data[date]);
  }
    console.log('labels: ', labels);
    console.log('datasets: ', datasets);
    labels.reverse();
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
        backgroundColor: '#eacf5a',
        data: this.calorieData.datasets[0].data
      }]
    };
    this.loaded = true
  }
},
watch: {
    calorieData: {
      handler: function() {
        this.updateChartData()
      },
      deep: true
    }
  }
}
</script>