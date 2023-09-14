<template>
    <Line 
        v-if="loaded" :data="chartData"
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
    weightData: null,
    }),
    async mounted () {
  this.loaded = false
  await this.fetchData(); // Fetch data on initial mount  
  },
  methods: {
    async fetchData() {
      try {
      //get weight data from db
      axios.get('/api/weight')
        .then(response => {
          // console.log('Weight Data: ', response.data); //response.data[0].weight
          console.log('testing weight');
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
  processWeightData(data) {
    const labels = data.map(entry => new Date(entry.weigh_in_date).toLocaleDateString());
    const datasets = [{
      label: 'Weight',
      backgroundColor: '#eacf5a',
      data: data.map(entry => entry.weight)
    }];
    labels.reverse();
    datasets[0].data.reverse();
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
        backgroundColor: '#eacf5a',
        data: this.weightData.datasets[0].data
      }]
    };
    this.loaded = true
    console.log('this.loaded: ', this.loaded);
    },
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