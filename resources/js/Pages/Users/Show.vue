<template>
    <Layout>
        <main class="container">
            <div class="grid">
                <article class="user-info">
                    <div class="avatar">
                    <!-- Avatar section -->
                    <img src="avatar.png" alt="user avatar">
                    </div>
                    <div class="user-details">
                    <!-- User name, class and stats -->
                    <Link href="/users/settings" class="outline">Edit</Link>
                    <h3>{{User.name}}</h3>
                    <p>Current Class: Mage</p>
                    </div>
                </article>

                <article class="avatar">
                    <h2>Avatar</h2>
                    <img :src="avatarImage"/>

                </article>
            </div>

        <div class="grid">
            <article class="weight-track">
                <!-- Weight tracking section -->
                <Link href="Users/Edit" >Edit</Link>
                <h4>Weight Tracking</h4>
                <form>
                  <!-- <input type="text" placeholder="Enter weight"> -->
                <button type="button" v-on:click="openModal('Add Weight')">Add</button>
                </form>
                <WeightLineChart />
                <!-- :data="weightData" -->
            </article>
            
            <article class="calories-track">
                <!-- Calories/Food tracking section -->
                <Link href="Users/Edit">Edit</Link>
                <h4>Calories</h4>
                <form>
                <!-- <input type="text" placeholder="Enter food">
                <input type="text" placeholder="Enter calories"> -->
                <button type="button" v-on:click="openModal('Add Calories')">Add</button>
                </form>
                <CalorieLineChart />
            </article>
        </div>


        <!-- Modal -->
        <!-- Workout Modal -->
        <Modal v-if="workoutModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
            <template v-slot:header >
                <h1 >Workout</h1>
            </template>
            <template v-slot:body>
              <form @submit.prevent="submit" method="POST">
                  <input type="text" v-model="workoutForm.name" placeholder="Add Workout">
                  <button @click="saveModal">Save</button>
              </form>
            </template>
        </Modal>
        <!-- Weight Modal -->
        <Modal v-if="weightModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
          <template v-slot:header >
                <h1 >Weight</h1>
            </template>

            <template v-slot:body>
                <form @submit.prevent="submit" method="POST">
                  <input type="number" v-model="weightForm.weight" placeholder="Add Weight">
                  <input type="date" v-model="weightForm.date" placeholder="Add Date">
                  <button @click="saveModal">Save</button>
                </form>
            </template>
        </Modal>
        <!-- Calories Modal -->
        <Modal v-if="caloriesModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
          <template v-slot:header >
                <h1>Calories</h1>
            </template>
            <template v-slot:body>
                <form @submit.prevent="submit" method="POST">
                  <input type="number" v-model="caloriesForm.calories" placeholder="Add Calories">
                  <input type="date" v-model="caloriesForm.date" placeholder="Add Date">
                  <button @click="saveModal">Save</button>
                </form>
            </template>
        </Modal>
        </main>
    </Layout>
</template>

<script>
    import Layout from '../../Shared/Layout';
    import BarChart from '../../components/BarChart';
    import WeightLineChart from '../../components/WeightLineChart';
    import RadarChart from '../../components/RadarChart';
    import Modal from '../../Shared/Modal';
    import CalorieLineChart from '../../components/CalorieLineChart';
    import {Link} from '@inertiajs/vue3';

    export default {
        props: ['User', 'isModalOpen'],
        components: {
        Layout,
        BarChart,
        WeightLineChart,
        RadarChart,
        Modal,
        CalorieLineChart,
        Link,
    },
    data() {
    return {
      isModalOpen: false,
      weightModal: false,
      workoutModal: false,
      caloriesModal: false,
    };
  },
  methods: {
    openModal(content) {
      this.isModalOpen = true;

      switch(content){
        case 'Add Workout':
          this.workoutModal = true;
          break;
        case 'Add Weight':
          this.weightModal = true;
          break;
        case 'Add Calories':
          this.caloriesModal = true;
          break;
        default:
          break;
      }
    },
    closeModal() {
      this.isModalOpen = false;
      this.workoutModal = false;
      this.weightModal = false;
      this.caloriesModal = false;

    },
},
  mounted() {
    //  get calories data from db
    // axios.get('/api/calories')
    //   .then(response => {
    //     console.log('Calorie Data: ', response.data); //response.data[0].calories
    //     this.calorieData = response.data;
    //   })
    //   .catch(error => {
    //     console.error('Error while fetching calories data: ', error);
    //   });


  },
};
</script>

<script setup>
// import { router } from '@inertiajs/vue3'
import { useForm} from '@inertiajs/vue3'
let workoutForm = useForm({
    name: ''
});

let weightForm = useForm({
    weight: '',
    body_fat: '25',
    date: ''
});

let caloriesForm = useForm({
    calories: '',
    date: ''
});

let submit = () => {

  if(workoutForm.name != ''){
    console.log('workoutForm.name: ', workoutForm.name);
    workoutForm.post('/workout', {
        onSuccess: () => {
            console.log('success: workout')
            workoutForm.reset()
        }
    });
  }
  if(weightForm.weight != ''){
    console.log('weightForm.weight: ', weightForm.weight);
    weightForm.post('/weight', {
        onSuccess: () => {
            console.log('success: weight')
            weightForm.reset()
        }
    });
  }
  if(caloriesForm.calories != ''){
    console.log('caloriesForm.calories: ', caloriesForm.calories);
    caloriesForm.post('/calories', {
        onSuccess: () => {
            console.log('success: calories')
            caloriesForm.reset()

              // Call updateChartData method after adding new data
              this.$refs.lineChart.updateChartData();
        }
    });
  }
};
</script>

<style>
  canvas{
    background-color: rgba(235, 222, 166, 0.682);
    border-radius: 5px;
  }
</style>