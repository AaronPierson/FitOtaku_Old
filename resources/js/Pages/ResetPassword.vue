<template>
    <Layout>
        <main class="container">
        <article>
            <h1>
                Forgot Password
            </h1>
            <p>
                Enter your email address and we'll send you a link to reset your password.
            </p>
            <form @submit.prevent="submit">
                <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="nickname" required="">
                <button type="submit" class="contrast" :disabled="form.processing">
                    Send Password Reset Link
                </button>
            </form>
        </article>
    </main>
    </Layout>
</template>

<script>
    import { Link } from '@inertiajs/vue3';
    import Layout from '../Shared/Layout';
    export default {
        components: {
            Layout,
            Link
        },
        mounted() {
            
        }
    }
</script>

<script setup>
    import { useForm} from '@inertiajs/vue3'
    let form = useForm({
        email: '',
    });

    let submit = () => {
        form.post('/email/reset');
    };
</script>