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
                <li><Link href="/login" role="button">Login</Link></li>
                <!-- <a href="/Login" method="get" as="button">Log In</a> -->
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
            <h1>Create New User</h1>
            <h2>A minimalist layout for Login pages</h2>
          </hgroup>
          <form data-bitwarden-watching="1" @submit.prevent="submit" >
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
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/users');
};
</script>


<style scoped>
  .error {
    color: red;
    font-size: small;
  }
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
