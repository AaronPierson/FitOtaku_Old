<template>
    <Layout>
      <main class="container" >
      <section class="hero">
        <h1>Fit Otaku Quest</h1>
        <h2>Join the Adventure!</h2>
        <p>Discover new ways to get fit and healthy with our unique workout program.</p>
        <Link href="/About" role="button">Learn More</Link>

      </section>

      <section class="fe-group">
        <h2>Features</h2>
        <div class="features">
            <article class="feature">
              <hgroup>
                <h3>Custom Workouts</h3>
                <p>Choose from a variety of exercises to create your own workout program.</p>
              </hgroup>
          </article>

          <article class="feature">
            <hgroup>
              <h3>Goal Tracking</h3>
              <p>Track your progress and unlock rewards as you reach your fitness goals.</p>
            </hgroup>
          </article>

          <article class="feature">
            <hgroup>
              <h3>Leaderboard</h3>
              <p>See where you stand among the top fitness gamers!</p>
            </hgroup>
          </article>
        </div>
      </section>

      <section class="cta">
        <h2>Ready to Start Your Quest?</h2>
        <p>Sign up now and join the adventure!</p>
        
          <Link href="/users/create" role="button">Sign Up</Link>
      </section>
    </main>
  </Layout>
</template>

<script>
import {Link} from '@inertiajs/vue3';
import Layout from '../Shared/Layout';
export default {
    components: {
      Layout,
      Link
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
  flex-direction: column;
  align-items: center;
}

button{

    margin-left: auto;
    margin-right: auto; 
    display: block;
    width: 50%;
}
Link{
    margin-left: auto;
    margin-right: auto; 
    display: block;
    width: 50%;
}

.feature {
    flex: 1;
    margin: 10px;
    padding: 20px;
    text-align: center;
    color: #45230d;
}

.features{
  display: flex;

}

.fe-group{
    border-radius: 10px;
    text-align: center;
    align-items: center;
    margin: 50px;
    justify-content: center;
}

</style>