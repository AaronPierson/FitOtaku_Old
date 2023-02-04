<template>
    <header class="container">
    <nav>
        <ul>
            <li><div class="logo">Logo</div></li>
        </ul>
        <ul>
            <li><Link href="/">Home</Link></li>
            <li>  
                <div class="log-in-out" >
                  <li><Link href="/users/create" method="get" role="button">Sign Up</Link></li>
                <!-- <button @click="logout" v-else>Log Out</button> -->
            </div>
            </li>
        </ul>
    </nav>
    </header>
    <main class="container">
      <article class="grid">
        <div>
          <hgroup>
            <h1>Sign in</h1>
            <h2>A minimalist layout for Login pages</h2>
          </hgroup>
          <form data-bitwarden-watching="1" @submit.prevent="submit">
            <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="nickname" required="">
            <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
            <input type="password" name="password" v-model="form.password" placeholder="Password" aria-label="Password" autocomplete="current-password" required="">
            <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
            <fieldset>
              <label for="remember">
                <input type="checkbox" role="switch" id="remember" name="remember" v-model="form.remember">
                Remember me
              </label>
            </fieldset>
            <button type="submit" class="contrast" :disabled="form.processing">Login</button>
          </form>
        </div>
        <div></div>
      </article>
    </main>

        <footer class="container">
                <p>&copy; Fitness Quest 2023</p>
        </footer>
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
    email: '',
    password: '',
    remember: false,
});

let submit = () => {
    form.post('login');
};
</script>

<style scoped>
    main {
        margin: 0% auto;
        margin-bottom: 10%;
        text-align: center;
    }

    footer{
        width: 100%;
        text-align: center;
    }
</style>