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
                    <p>Current Class: Mage</p>
                    <!-- <p>Current Class: {{currentClass}}</p> -->
                    <p>Stats:</p>
                    <RadarChart/>

                    <!-- <p>Stats: {{stats}}</p> -->
                    </div>
                </article>

                <article class="avatar">
                    <h2>Avatar</h2>
                    <!-- <img :src="avatarImage"/> -->

                </article>

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

        <article class="workouts">
            <!-- Workouts section -->
            <h4>Workouts</h4>
            <!-- <div v-for="workout in workouts">
            {{workout}}
            </div> -->
            <button v-on:click="openModal('Add Workout')">Add Workout</button>
            <!-- <button>Start Workout</button> -->
        </article>
        <div class="grid">
            <article class="weight-track">
                <!-- Weight tracking section -->
                <h4>Weight Tracking</h4>
                <form>
                <!-- <input type="text" placeholder="Enter weight"> -->
                <button type="button" v-on:click="openModal('Add Weight')">Add</button>
                </form>
                <LineChart/>

            </article>

            <article class="calories-track">
                <!-- Calories/Food tracking section -->
                <h4>Calories/Food Tracking</h4>
                <form>
                <!-- <input type="text" placeholder="Enter food">
                <input type="text" placeholder="Enter calories"> -->
                <button type="button" v-on:click="openModal('Add Calories')">Add</button>
                </form>
                <BarChart/>
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
        <Modal v-bind:isModalOpenProp="isModalOpen" @close="closeModal">
            <template v-slot:header>
                <h1>{{ modalHeader }}</h1>
            </template>

            <template v-slot:body>
                <div v-html="modalBody"></div>
                <!-- {{ modalBody }} -->
            </template>

            <template v-slot:footer>
                {{ modalFooter }}
            </template>
        </Modal>
        </main>
    </Layout>
</template>

<script>
    import Layout from '../../Shared/Layout';
    import BarChart from '../../components/BarChart';
    import LineChart from '../../components/LineChart';
    import RadarChart from '../../components/RadarChart';
    import Modal from '../../Shared/Modal';
    export default {
        props: ['User', 'isModalOpen'],
        components: {
        Layout,
        BarChart,
        LineChart,
        RadarChart,
        Modal,
    },
    data() {
    return {
      isModalOpen: false,
      modalHeader: "",
      modalBody: "",
      modalFooter: "",
    };
  },
  methods: {
    openModal(content) {
      this.isModalOpen = true;

      switch(content){
        case 'Add Workout':
          this.modalHeader = "Add Workout";
          this.modalBody = `
        <div>
          <label for="workout-name">Workout Name:</label>
          <input type="text" id="workout-name" />
        </div>
        <div>
          <label for="workout-duration">Workout Duration (minutes):</label>
          <input type="number" id="workout-duration" />
        </div>
      `;
        //   this.modalFooter = "Job Board";
          break;
        case 'Add Weight':
          this.modalHeader = "Add Weight";
          this.modalBody = `
        <div>
          <label for="weight">Add Weight:</label>
          <input type="number" id="weight" />
        </div>
        <div>
          <label for="body-fat">Body Fat %:</label>
          <input type="number" id="body-fat" />
        </div>
        <div>
          <label for="notes">Notes:</label>
          <textarea rows="4" id="notes"></textarea>
        </div>
      `;
          this.modalFooter = "Add Weight";
          break;
        case 'Add Calories':
          this.modalHeader = "Add Calories";
          this.modalBody = `
        <div>
          <label for="type">Meal Type:</label>
          <details role="list">
            <summary aria-haspopup="listbox">Dropdown</summary>
            <ul role="listbox">
                <li>
                    <label>
                    <input type="radio" id="breakfast" name="size" value="small">
                        Breakfast
                    </label>
                </li>
                <li>
                    <label>
                    <input type="radio" id="lunch" name="size" value="medium">
                        Lunch
                    </label>
                </li>
                <li>
                    <label>
                    <input type="radio" id="dinner" name="size" value="large">
                        Dinner
                    </label>
                </li>
            </ul>
            </details>  
        </div>
        <div>
          <label for="Add Calories">Add Calories:</label>
          <input type="number" id="workout-name" />
        </div>
        <div>
          <label for="food">Food:</label>
          <input type="text" id="food" />
        </div>
      `;
          this.modalFooter = "Add Calories";
          break;
        default:
          this.modalHeader = "Error";
          this.modalBody = "Error";
          this.modalFooter = "Error";
          break;
      }
    },
    closeModal() {
      this.isModalOpen = false;
    },
  },
};
</script>

