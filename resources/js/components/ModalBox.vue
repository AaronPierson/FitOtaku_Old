<template>
    <div class="modal-container" v-if="showModal">
        <div class="modal-overlay" @click="showModal = !showModal"></div>
            <div class="modal-box">
                <form class="form-container" @submit.prevent="submitWeight">
                <div class="form-group">
                    <h2>Weight</h2>
                    <!-- <label>Enter your weight in pounds: </label> -->
                    <input type="number" class="form-control" v-model="weight" placeholder="weight">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button @click="showModal = !showModal">Close</button>
            </form>
        </div>
    </div>
</template>
  
  <script>
export default {
  data() {
    return {
      weight: ''
    }
  },
  props: {
    showModal: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    submitWeight() {
      // code to handle the weight submission
      console.log(this.weight)
    }
  }
}
  </script>

<style scoped>
  .modal-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;

  }
  .modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;

  }
  .modal-box {
    /* modal box styles goes here */
    margin: 10px;
    padding: 20px;
    /* background-color: #fff; */
    background-color: #9a9a8e;
    z-index:3;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
    width: 50%;
    height: 50%;
    color: #45230d;
  }
  .form-container {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;

}
h2{
    margin: 10%;
}
input{
    width: 50%;

}
button{
    margin: 5%;
    padding: 10px;
    background-color: #276468;
    width: 50%;
    color: white;
    align-items: center;
    justify-content: center;
    display: flex;
}
</style>