<template>
  <Layout>
    <main class="container">
      <h1>Reset Password</h1>
      <form @submit.prevent="submit">
        <div class="form-group">
          <label for="password">New Password</label>
          <input type="password" name="password" v-model="form.password" aria-label="Password" required="">
          <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm New Password</label>
          <input type="password" id="password_confirmation" v-model="form.password_confirmation" required>
        </div>
        <button type="submit">Reset Password</button>
      </form>
    </main>
  </Layout>
</template>
  

<script>
  import Layout from '../../../Shared/Layout';
  import { Link, useForm } from '@inertiajs/vue3';

  export default{
    components: {
      Layout,
      Link,
    },
    props: ['email', 'token'],
    setup(props) {
      let form = useForm({
        email: props.email,
        password: '',
        password_confirmation: '',
        token: props.token,
      });

      let submit = () => {
        form.post('/password-update');
      };

      return {
        form,
        submit,
      };
    },
  };
</script>

  <!-- <script>
  import Layout from '../../../Shared/Layout';
  import { Link } from '@inertiajs/vue3';
  
  export default {
    components: {
      Layout,
      Link,
    },
    props: ['email', 'token'],

  }
  </script>
  
  <script setup>
  // import { router } from '@inertiajs/vue3'
  import { useForm} from '@inertiajs/vue3'
  let form = useForm({
      password: '',
      password_confirmation: '',
      token: '',
    });
  
  let submit = () => {
      form.post('reset-password');
  };
  </script> -->
  
  
  
  
  
  
  
  