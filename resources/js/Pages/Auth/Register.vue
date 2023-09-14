<template>
<Layout>
    <main class="container">
      <article class="grid">
        <div>
          <hgroup>
            <h1>The Adventure Begins</h1>
            <h2>Register for a new account and start your fitness adventure.</h2>
          </hgroup>
          <form @submit.prevent="submit" >
            <div class="grid">
                <div>
                    <input type="text" name="name" v-model="form.name" placeholder="Name" aria-label="Name" autocomplete="nickname" required="">
                    <div v-if="form.errors.name" v-text="form.errors.name" class="error"></div>
                </div>
                <div>
                    <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="@" required="">
                    <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
                </div>
            </div>
            <!-- <input type="date" name="birthday" v-model="form.birthday" placeholder="Birthday" aria-label="birthday" autocomplete="Date" required=""> -->
            <input type="password" name="password" v-model="form.password" placeholder="Password" aria-label="Password" autocomplete="current-password" required="">
            <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
            <button type="submit" class="contrast" :disabled="form.processing">Sign Up</button>
          </form>
        </div>
        <div><img src="/images/logo-loop.svg" alt="Logo" class="loop"></div>
      </article>
    </main>
</Layout>
</template>

<script>
import Layout from '../../Shared/Layout';
import { Link } from '@inertiajs/vue3';
export default {
  components: {
    Layout,
    Link,
  },
}
</script>

<script setup>
// import { router } from '@inertiajs/vue3'
import { useForm} from '@inertiajs/vue3'
let form = useForm({
    name: '',
    email: '',
    password: ''
});

let validateForm = () => {
    // Check for minimum length of 8 characters
    if (form.password.length < 6) {
    alert('The password must be at least 6 characters long.');
    return false;
  }

  //   // Check for at least 1 numeric digit
  //   if (!/\d/.test(form.password)) {
  //   alert('The password must contain at least 1 numeric digit.');
  //   form.errors.password= 'The password must contain at least 1 numeric digit.';
  //   return false;
  // }
  return true;
};

let status = null;

let submit = () => {
  form.post('/register');

};
</script>


<style scoped>
  .error {
    color: red;
    font-size: small;
  }
    main {
        margin: 5% auto;
        margin-bottom: 10%;
        text-align: center;
    }

    li img{
    width: 55%;
    height: 55%;
    max-width: 100px;
    }

    .loop{
        width: 100%;
        height: 100%;
        max-width: 500px;
    }
</style>
