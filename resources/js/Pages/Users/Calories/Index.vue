<template>
    <Layout>
      <main class="container">
        <h1>Calories</h1>

        <article>
          <table role="grid">
            <thead>
              <tr>
                <th>Calories</th>
                <th>Date</th>
                <th>Food</th>
                <th>Meal Type</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="calorie in Calories" :key="calorie.id">
                <td>{{ calorie.calories }}</td>
                <td>{{ calorie.date_consumed }}</td>
                <td>{{ calorie.food_name }}</td>
                <td>{{ calorie.meal_type }}</td>
                <td>
                  <Link :href="`/p1/calories/${calorie.id}/delete`" :method="'delete'">Delete</Link>
                  <span> | </span>
                  <button type="button" v-on:click="openModal('Add Calories', calorie)" class="button-like-link">Edit</button>
                </td>
              </tr>
            </tbody>
          </table>
        </article>

        <div class="grid">
          <div>
            <article>
              <h2>Past 7 Days</h2>
              <CalorieLineChart />
            </article>
          </div>
          <div>
            <article>
              <h2>Past 30 Days</h2>
              <CalorieLineChart />
            </article>
            </div>
        </div>
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
  import Layout from '../../../Shared/Layout';
  import {Link} from '@inertiajs/vue3';
  import CalorieLineChart from '../../../components/CalorieLineChart';
  import Modal from '../../../Shared/Modal';
  import { useForm } from '@inertiajs/vue3'
  import { ref } from 'vue';

  export default {
    components: {
      Layout,
      Link,
      CalorieLineChart,
      Modal,
    },
    
    props: ['Calories', 'isModalOpen'],
    data() {
      return {
        isModalOpen: true,
        caloriesModal: false,
      };
    },
    methods: {
      openModal(content, calorie) {
        this.isModalOpen = true;
        switch(content){
          case 'Add Calories':
            console.log('Add Calories: ', calorie.food_name);
            this.caloriesForm.name = calorie.food_name;
            this.caloriesForm.meal_type = calorie.meal_type;
            this.caloriesForm.calories = calorie.calories;
            this.caloriesForm.date = calorie.date_consumed;
            this.caloriesForm.id = calorie.id;
            this.caloriesModal = true;
            break;
          default:
            break;
        }
      },
      closeModal() {
        this.isModalOpen = false;
        this.caloriesModal = false;
      },
    },
    setup() {
      const componentKeyCalories = ref(0);

      const forceRerenderCalories = () => {
        console.log('forceRerenderCalories')
        componentKeyCalories.value += 1;
      }

      let caloriesForm = useForm({
          id: '',
          name: '',
          meal_type: '',
          calories: '',
          date: ''
      });

      let submit = () => {
        if(caloriesForm.calories != ''){
          caloriesForm.post('/p1/calories/update', {
              onSuccess: () => {
                  console.log('success: calories');
                  caloriesForm.reset();
                  forceRerenderCalories();
              }
          });
        }
      };

      return {
        componentKeyCalories,
        forceRerenderCalories,
        caloriesForm,
        submit
      }
    }
  };
</script>

<style scoped>
    h1{
        text-align: center;
    }
    .button-like-link{
      background: none;
      border: none;
      color: inherit;
      cursor: pointer;
      font: inherit;
      padding: 0;
      display: inline;
      margin: 0;
      width: auto;
  }
</style>
  