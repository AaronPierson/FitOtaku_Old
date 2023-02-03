<template>
    <Layout>
      <main class="container" >
      <section class="hero">
        <h1>Fitness Quest</h1>
        <h2>Join the Adventure!</h2>
        <p>Discover new ways to get fit and healthy with our unique workout program.</p>
        <a href="#" class="btn">
          <button >
            Learn More
          </button>
        </a>
      </section>

      <section class="fe-group">
        <h2>Features</h2>

        <article class="features">
            <div class="feature">
              <hgroup>
                <h3>Custom Workouts</h3>
                <p>Choose from a variety of exercises to create your own workout program.</p>
              </hgroup>
          </div>

          <div class="feature">
            <hgroup>
              <h3>Goal Tracking</h3>
              <p>Track your progress and unlock rewards as you reach your fitness goals.</p>
            </hgroup>
          </div>

          <div class="feature">
            <hgroup>
              <h3>Leaderboard</h3>
              <p>See where you stand among the top fitness gamers!</p>
            </hgroup>
          </div>
        </article>
      </section>

      <!-- <section id="leaderboard">
          <h2>Leaderboard</h2>
          <p>See where you stand among the top fitness gamers!</p>
      </section> -->

      <section class="cta">
        <h2>Ready to Start Your Quest?</h2>
        <p>Sign up now and join the adventure!</p>
        
          <a href="#" class="btn">
          <button >
              Sign Up
          </button>
        </a>
      </section>
    </main>
  </Layout>
</template>

<script>
import Layout from '../Shared/Layout';
export default {
    components: {
      Layout,
    },
};
</script>


<style scoped>


section {
    color: #DAA520;
    padding: 20px;
    text-align: center;
    margin: 20px 0;
    height: 25%;
}

.hero{
  /* box-shadow: 0 0 20px rgba(0,0,0,0.5); */
  /* margin-left: 10%;
  margin-right: 10%;
  border-radius: 2%; */
  /* display: flex; */
  flex-direction: column;
  align-items: center;
}



.features{
  /* background-color: #160801; */
}

button{
    /* background-color: #DAA520;
    border-radius: 5%;
    border: none; */
    /* width: 50%; */
    /* height: 50px; */
}

/* h1 {
    font-size: 36px;
    margin: 0;
} */

.feature {
    flex: 1;
    margin: 10px;
    padding: 20px;
    /* background-color: #fff; */
    /* background-color: #9a9a8e; */
    /* background-color: #F7EDE5; */
    /* border-radius: 10px; */
    /* box-shadow: 0 0 20px rgba(0,0,0,0.5); */
    text-align: center;
    color: #45230d;
}

.features{
  display: flex;

}

.fe-group{
  
  /* background-color:#23312E ; */
    border-radius: 10px;
    text-align: center;
    /* color: #45230d; */
    /* box-shadow: 0 0 20px rgba(0,0,0,0.5); */
    align-items: center;
    margin: 50px;
    justify-content: center;
}

#leaderboard{
  margin: 10%;
  padding: 10%;
}

/* .cta{
  background-color: #F7EDE5;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
    margin-left: 15%;
    margin-right: 15%;
    color: #45230d;
} */

</style>