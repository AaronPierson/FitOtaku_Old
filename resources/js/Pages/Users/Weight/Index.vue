<template>
  <Layout>
    <main class="container">
      <h1>Weight</h1>
      <article>
        <table role="grid">
          <thead>
            <tr>
              <th>Weight</th>
              <th>Date</th>
              <th>Body Fat</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="weight in Weights" :key="weight.id">
              <td>{{ weight.weight }}</td>
              <td>{{ weight.weigh_in_date }}</td>
              <td>{{ weight.body_fat }}%</td>
              <td>
                <Link :href="`/p1/weight/${weight.id}/delete`" :method="'delete'">Delete</Link>
                <span> | </span>
                <button type="button" v-on:click="openModal('Add Weight', weight)" class="button-like-link">Edit</button>
              </td>
            </tr>
          </tbody>
        </table>
      </article>
      <article>
        <h2>Past 7 Days</h2>
        <WeightLineChart />
      </article>
      <div class="grid">
        <div>
          <article>
            <h2>Past Year</h2>
            <WeightLineChart />
          </article>
        </div>
        <div>
          <article>
            <h2>All Time</h2>
            <WeightLineChart />
          </article>
        </div>
      </div>
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
    </main>
  </Layout>
</template>

<script>
import Layout from "../../../Shared/Layout";
import { Link } from "@inertiajs/vue3";
import WeightLineChart from "../../../components/WeightLineChart";
import Modal from '../../../Shared/Modal';
import { useForm} from '@inertiajs/vue3'
import { ref } from 'vue';

export default {
  components: {
    Layout,
    Link,
    WeightLineChart,
    Modal,
  },
  props: ["Weights", 'isModalOpen'],
  data() {
    return {
      isModalOpen: true,
      weightModal: false,
    };
  },
  methods: {
    openModal(content, weight) {
      this.isModalOpen = true;
      switch(content){
        case 'Add Weight':
          this.weightModal = true;
          this.weightForm.id = weight.id;
          this.weightForm.weight = weight.weight;
          this.weightForm.date = weight.weigh_in_date;
          this.weightForm.body_fat = weight.body_fat;
          break;
        default:
          break;
      }
    },
    closeModal() {
      this.isModalOpen = false;
      this.weightModal = false;
    },
},
setup() {
  const componentKeyWeight = ref(0);

  const forceRerenderWeight = () => {
    console.log('forceRerenderWeight')
    componentKeyWeight.value += 1;
  }

  let weightForm = useForm({
      id: '',
      weight: '',
      body_fat: '',
      date: ''
  });

  let submit = () => {

    if(weightForm.weight != ''){
      console.log('weightForm.weight: ', weightForm.weight);
      weightForm.post('/p1/weight/update', {
          onSuccess: () => {
              console.log('success: weight');
              weightForm.reset();
              forceRerenderWeight();
          }        
      });
    }
  };

  return {
    componentKeyWeight,
    weightForm,
    submit,
    forceRerenderWeight
  }
}
};
</script>


<style scoped>
h1 {
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
