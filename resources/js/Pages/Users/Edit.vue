<template>
    <Layout>
        <main>
            <article>
                <h1 class="text-2xl font-bold text-gray-900">User Settings</h1>
                <p class="text-gray-700">Update your settings</p>
                <form method="POST" @submit.prevent="submit">
                    <input type="text" name="name" v-model="form.name" placeholder="Name" aria-label="Name" autocomplete="nickname" required="">
                    <div v-if="form.errors.name" v-text="form.errors.name" class="error"></div>
                    <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="@" required="">
                    <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
                    <input type="password" name="password" v-model="form.password" placeholder="Password" aria-label="Password" autocomplete="current-password" required="">
                    <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">

                    <input type="date" name="birthday" v-model="form.birthday" placeholder="Birthday" aria-label="birthday" autocomplete="Date" required="">
                    <button type="submit" class="contrast" :disabled="form.processing">Update</button>
                </form>
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