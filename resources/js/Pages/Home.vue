<template>
    <Layout>
      <main>
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

        <div class="features">
          <div class="feature">
          <i class="fas fa-dumbbell"></i>
          <h3>Custom Workouts</h3>
          <p>Choose from a variety of exercises to create your own workout program.</p>
        </div>

        <div class="feature">
          <i class="fas fa-trophy"></i>
          <h3>Goal Tracking</h3>
          <p>Track your progress and unlock rewards as you reach your fitness goals.</p>
        </div>

        <div class="feature">
          <i class="fas fa-map-marked-alt"></i>
          <h3>Adventure Mode</h3>
          <p>Embark on a journey through a virtual world, completing challenges along the way.</p>
        </div>
        </div>
      </section>

      <section id="leaderboard">
          <h2>Leaderboard</h2>
          <p>See where you stand among the top fitness gamers!</p>
      </section>

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
  margin-left: 10%;
  margin-right: 10%;
  border-radius: 2%;
}

.features{
  /* background-color: #160801; */
}

button{
    background-color: #DAA520;
    border-radius: 5%;
    /* border: none; */
    width: 100px;
    height: 50px;
}

h1 {
    font-size: 36px;
    margin: 0;
}

.feature {
    flex: 1;
    margin: 10px;
    padding: 20px;
    /* background-color: #fff; */
    /* background-color: #9a9a8e; */
    background-color: #F7EDE5;
    border-radius: 10px;
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

.cta{
  background-color: #F7EDE5;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    text-align: center;
    margin-left: 15%;
    margin-right: 15%;
    color: #45230d;
}
</style>