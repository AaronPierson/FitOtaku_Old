<template>
    <Layout>
        <main class="container">
            <div class="grid">
                <article class="user-info">
                    <div class="avatar">
                    <!-- Avatar section -->
                    <!-- <img src="avatar.png" alt="user avatar"> -->
                    </div>
                    <div class="user-details">
                    <!-- User name, class and stats -->
                    <h3>{{User.name}}</h3>
                    <!-- <p>Current Class: Mage</p> -->
                    <!-- <p>Current Class: {{currentClass}}</p> -->
                    <!-- <p>Stats:</p>
                    <RadarChart/> -->

                    <!-- <p>Stats: {{stats}}</p> -->
                    </div>
                </article>

                <!-- <article class="avatar">
                    <h2>Avatar</h2>
                    <img :src="avatarImage"/>

                </article> -->

                <!-- <article class="quests"> -->
                    <!-- Quest section -->
                    <!-- <h4>Quests</h4> -->
                    <!-- <div v-for="quest in quests">
                    {{quest}}
                    </div> -->
                    <!-- <button class="contrast" v-on:click="openModal('Job Board')">
                        Go to Job Board
                    </button> -->
                <!-- </article> -->
            </div>

            <!-- Workouts section -->
        <!-- <article class="workouts">
            <h4>Workouts</h4>
            <div v-for="workout in workouts">
            {{workout}}
            </div>
            <button v-on:click="openModal('Add Workout')">Add Workout</button>
        </article> -->
        <div class="grid">
            <article class="weight-track">
                <!-- Weight tracking section -->
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
                <h4>Calories/Food Tracking</h4>
                <form>
                <!-- <input type="text" placeholder="Enter food">
                <input type="text" placeholder="Enter calories"> -->
                <button type="button" v-on:click="openModal('Add Calories')">Add</button>
                </form>
                <CalorieLineChart />
            </article>
        </div>
        
        <!-- Journal section -->
        <!-- <article class="journal">
            <h4>Journal</h4>
            <form>
            <textarea id="journal" rows="3" class="form-control" placeholder="Enter your thoughts for today..."></textarea>
            <button>Save</button>
            </form>
            <div class="col-md-6">
            <h2>Today's Journal</h2>
            <p id="today-journal"></p>
            </div>
        </article> -->

        <!-- Fasting section -->
        <!-- <article class="fasting">
            <h4>Fasting</h4>
            <form>
            <input type="text" placeholder="Enter fasting hours">
            <button>Save</button>
            </form>
        </article> -->
        <Modal v-if="workoutModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
            <template v-slot:header >
                <h1 >Workout</h1>
            </template>
            <template v-slot:body>
              <form @submit.prevent="submit">
                  <input type="text" v-model="workoutForm.name" placeholder="Add Workout">
                  <button @click="saveModal">Save</button>
              </form>
            </template>
        </Modal>
        <Modal v-if="weightModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
          <template v-slot:header >
                <h1 >Weight</h1>
            </template>

            <template v-slot:body>
                <form @submit.prevent="submit">
                  <input type="number" v-model="weightForm.weight" placeholder="Add Weight">
                  <input type="date" v-model="weightForm.date" placeholder="Add Date">
                  <button @click="saveModal">Save</button>
                </form>
            </template>
        </Modal>
        <Modal v-if="caloriesModal" v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
          <template v-slot:header >
                <h1>Calories</h1>
            </template>
            <template v-slot:body>
                <form @submit.prevent="submit">
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
    import axios from 'axios';

    export default {
        props: ['User', 'isModalOpen'],
        components: {
        Layout,
        BarChart,
        WeightLineChart,
        RadarChart,
        Modal,
        CalorieLineChart,
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
        }
    });
  }
};
</script>

<style>
  canvas{
    background-color: #bbbbbb ;
    border-radius: 5px;
  }
</style>