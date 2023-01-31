<template>
    <Layout>
      <main>
      <section class="hero">
        <h2>Join the Adventure!</h2>
        <p>Discover new ways to get fit and healthy with our unique workout program.</p>
        <a href="#" class="btn">Learn More</a>
      </section>

      <section class="features">
        <h2>Features</h2>
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
      </section>

      <section id="leaderboard">
          <h2>Leaderboard</h2>
          <p>See where you stand among the top fitness gamers!</p>
      </section>

      <section class="cta">
        <h2>Ready to Start Your Quest?</h2>
        <p>Sign up now and join the adventure!</p>
        <a href="#" class="btn">Sign Up</a>
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
    background-color: #fff;
    color: #333;
    padding: 20px;
    text-align: center;
    margin: 20px 0;
}


</style>