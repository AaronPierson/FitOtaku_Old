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
                    <Link href="/p1/settings" class="outline">Edit</Link>
                    <h3>{{User.name}}</h3>
                    <p>Current Class: {{ User.class }}</p>
                    <p>Calorie Goal: {{User.total_calories}}</p>
                    <!-- <p>Stats:</p>
                    <RadarChart/> -->

                    <!-- <p>Stats: {{stats}}</p> -->
                    </div>
                </article>
                <!-- <article class="avatar">
                    <h2>Avatar</h2>
                    <img :src="avatarImage"/>
                    <h3>
                      Health:
                    </h3>
                    <progress :value="75" :max="User.health"  />
                    <h3>
                      Stamina:
                    </h3>
                    <progress :value="75" :max="User.stamina"  />

                    <h3>
                      Magic:
                    </h3>
                    <progress :value="75" :max="User.magic"  />
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
            <article class="workouts">
                <Link href="/p1/workout/index" >Edit</Link>
                <h4>Workouts</h4>
                <button v-on:click="openModal('Add Workout')">Add Workout</button>
                <div class="grid">
                  <li v-for="workout in Workouts" :key="workout.id">
                    <div>
                      <article>
                      <img :src="workout.image" alt="Workout Image">
                      <Link :href="`/p1/workout/${workout.id}`">{{ workout.name }}</Link>
                      </article>
                    </div>
                  <!-- <h5>{{ workout.name }}</h5> -->
                  <!-- <p>{{ workout.description }}</p> -->
                  <!-- add more fields here -->
                  </li>
                </div>
            </article>
        <div class="grid">
            <article class="weight-track">
                <!-- Weight tracking section -->
                <Link href="/p1/weight/index" >Edit</Link>
                <h4>Weight Tracking</h4>
                <form>
                  <!-- <input type="text" placeholder="Enter weight"> -->
                <button type="button" v-on:click="openModal('Add Weight')">Add</button>
                </form>
                <WeightLineChart :key="componentKeyWeight"/>
                <!-- :data="weightData" -->
            </article>
            
            <article class="calories-track">
                <Link href="/p1/calories/index">Edit</Link>
                <h4>Calories</h4>
                <button type="button" v-on:click="openModal('Add Calories')">Add</button>
                <CalorieLineChart :key="componentKeyCalories"/>
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

        <!-- Modals -->
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
                  <input type="number" v-model="weightForm.body_fat" placeholder="Add Fat Percentage">
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
                  <input type="text" v-model="caloriesForm.name" placeholder="Food Name">
                  <!-- Select -->
                  <select v-model="caloriesForm.meal_type">
                    <option value="" disabled selected>Select</option>
                    <option>Breakfast</option>
                    <option>Lunch</option>
                    <option>Dinner</option>
                    <option>Snack</option>
                  </select>
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
        props: ['User', 'isModalOpen', 'Workouts'],
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
};
</script>

<script setup>
// import { router } from '@inertiajs/vue3'
import { useForm} from '@inertiajs/vue3'
import { ref } from 'vue';
const componentKeyWeight = ref(0);
const componentKeyCalories = ref(0);

const forceRerenderWeight = () => {
  console.log('forceRerenderWeight')
  componentKeyWeight.value += 1;
}

const forceRerenderCalories = () => {
  console.log('forceRerenderCalories')
  componentKeyCalories.value += 1;
}

let workoutForm = useForm({
    name: ''
});

let weightForm = useForm({
    weight: '',
    body_fat: '',
    date: ''
});

let caloriesForm = useForm({
    name: '',
    meal_type: '',
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
            console.log('success: weight');
            weightForm.reset();
            forceRerenderWeight();
        }        
    });
  }
  if(caloriesForm.calories != '') {
    console.log('caloriesForm.calories: ', caloriesForm.calories);
    caloriesForm.post('/calories', {
      calories: caloriesForm.calories,
      date: caloriesForm.date
    })
    .then(() => {
      console.log('success: calories');
      caloriesForm.reset();
      forceRerenderCalories();
    })
    .catch((error) => {
      console.log('error: calories', error);
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