<template>
    <Line 
        v-if="loaded" :data="chartData"
        ref="lineChart" arial-busy="true"
      />
      <div v-else class="loading">
        Loading...
    </div>
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
    await this.fetchData(); // Fetch data on initial mount
},
    methods: {
    async fetchData() {
      axios.get('/api/calories')
        .then(response => {
          console.log('testing cal');
          this.calorieData = this.processCalorieData(response.data);
          console.log('this.calorieData: ', this.calorieData);
          this.updateChartData();
      })
      .catch(error => {
        console.error('Error while fetching calories data: ', error);
      });
  },
    processCalorieData(data) {
      // console.log('data: ', data);
      let labels = [];
      let datasets = [{    
      label: 'Calories',    
      backgroundColor: '#f87979',    
      data: []
    }];
    
    for (const date in data) {
      // console.log(date + ": " + data[date]);
      labels.push(date);
      datasets[0].data.push(data[date]);
    }
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
      this.loaded = true; // set loaded to true after updating chart data
    }
  },
}
</script>

<style scoped>
.loading {
  text-align: center;
  font-size: 1.5rem;
  font-weight: bold;
  color: #eacf5a;
}
</style>