<template>
  <Layout>
    <main class="container">
      <article>
        <button type="button" v-on:click="openModal('Add Weight', weight)" class="button-like-link">Edit</button> |
        <!--Edit workout link-->
        <Link :href="`/p1/workout/${workout.id}/delete`" :method="'delete'">Delete</Link>
        <div class="grid">
          <div>
            <h1>{{ workout.name }}</h1>
            <h2>Created by: {{ userName }}</h2>
          </div>
          <!-- <div>
            <img :src="workout.image" alt="Workout Image">
          </div> -->
        </div>
        <hgroup>
          <h3>Description:</h3>
          <p>{{ workout.description }}</p>
        </hgroup>
        <h3>Difficulty: {{ workout.difficulty }}</h3>
        <!-- <p>Equipment: {{ workout.equipment }}</p> -->
        <details>
          <summary role="button" class="primary">View Instructions</summary>
          <p>{{ workout.instructions }}</p>
        </details>
      </article>


      <article>
        <Link :href="`/p1/exercises/${workout.id}`">Edit</Link>
        <h2>Exercises:</h2>
        <p>Exercises in this workout:</p>
        <table>
          <thead>
            <tr>
              <th>Exercise</th>
              <th>Description</th>
              <th>Difficulty</th>
              <th>Equipment</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="exercise in workout.exercises" :key="exercise.id">
              <td>{{ exercise.name }}</td>
              <td>{{ exercise.description }}</td>
              <td>{{ exercise.difficulty }}</td>
              <td>{{ exercise.equipment }}</td>
              <td>
                <Link :href="`/p1/exercise/${exercise.id}/delete`" :method="'delete'">Delete</Link>
                <span> | </span>
                <Link :href="`/p1/exercise/${exercise.id}`">View</Link>
              </td>
            </tr>
          </tbody>
        </table>
      </article>
    </main>
  </Layout>
</template>

<script>
    import Layout from '../../../Shared/Layout';
    import {Link} from '@inertiajs/vue3';
    export default ({
        props: {
            workout: {
                type: Object,
                required: true,
                default: () => {}
            },
            userName: {
                type: String,
                required: true,
                default: () => {}
            }
        },
        components: {
            Layout,
            Link,
        },
})
</script>

<style scoped>
hgroup {
    margin-bottom: 2rem;
}
h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-align: center;
}
h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}
h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
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