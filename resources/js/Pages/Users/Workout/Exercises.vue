<template>
  <Layout>
    <main class="container">
      <h1>Add Exercises</h1>
      <p>Select exercises to add to your workout:</p>
      <div v-for="(exercise, index) in exercises" :key="index" class="grid">
        <article>
          <label>
            <input type="checkbox" :value="exercise.id" v-model="selectedExercises" @change="toggleInputs(exercise.id)">
            <h2>{{ exercise.name }}</h2>
          </label>
            <details>
              <summary role="button" class="primary">View Info</summary>
              <p>{{ exercise.description }}</p>
              <p>Difficulty: {{ exercise.difficulty }}</p>
              <p>Equipment: {{ exercise.equipment }}</p>
            </details>
          <div>
              <input type="number" v-model="exerciseReps[exercise.id]" placeholder="Reps" :disabled="!isEnabled(exercise.id)">
              <input type="number" v-model="exerciseSets[exercise.id]" placeholder="Sets" :disabled="!isEnabled(exercise.id)">
          </div>
        </article>
        <!-- <div>
              <img src="/images/logo.png" alt="Exercise Image">
        </div> -->
      </div>
      <Link :href="`/workout/${workoutId}/exercises`" :method="'post'" :data="{ exercises: selectedExercises, reps: exerciseReps, sets: exerciseSets}">Add Workouts</Link>
    </main>
  </Layout>
</template>

<script>
    import Layout from '../../../Shared/Layout';
    import { Link } from '@inertiajs/vue3';

     export default {
      props: {
        exercises: {
          type: Array,
          required: true
        },
        workoutId: {
          type: Number,
          required: true
        }
      },
        components: {
          Layout,
          Link,
        },
      data() {
        return {
          selectedExercises: [],
          exerciseReps: {},
          exerciseSets: {}
        };
      },
      methods: {
        toggleInputs(exerciseId) {
          const index = this.selectedExercises.indexOf(exerciseId);
          const enabled = index !== -1;
          this.$set(this.exerciseReps, exerciseId, enabled ? 0 : null);
          this.$set(this.exerciseSets, exerciseId, enabled ? 0 : null);
        },
        isEnabled(exerciseId) {
          return this.selectedExercises.includes(exerciseId);
        }
      }
    };
</script>
