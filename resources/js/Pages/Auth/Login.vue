<template>
<layout>
    <main class="container">
      <article class="grid">
        <div>
          <hgroup>
            <h1>Sign in</h1>
            <h2>A minimalist layout for Login pages</h2>
          </hgroup>
          <form @submit.prevent="submit">
            <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="nickname" required="">
            <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
            <Link href="/reset-password" class="forgot">Forgot your password?</Link>
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
        <div><img src="/images/logo-loop.svg" alt="Logo" class="loop"></div>
      </article>
    </main>
</layout>
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

    .forgot{
        display: block;
        text-align: right;
        margin-bottom: 1rem;
        font-size: small;
    }
</style>