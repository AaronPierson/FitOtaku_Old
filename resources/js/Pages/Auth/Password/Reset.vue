<template>
    <Layout>
        <main class="container">
            <h1>
                Forgot Password
            </h1>
            <p>
                Enter your email address and we'll send you a link to reset your password.
            </p>
            <article>
                <form @submit.prevent="submit">
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" v-model="form.email" placeholder="Email" class="form-control" required>
                    </div>
                    <button type="submit" class="contrast" :disabled="form.processing">Send Password Reset Link</button>

                </form>
            </article>
        </main>
    </Layout>
</template>

<script setup>
    import { defineAsyncComponent } from 'vue';
    const Layout = defineAsyncComponent(() => import('../../../Shared/Layout'));    
    import { useForm} from '@inertiajs/vue3'
    let form = useForm({
        email: '',
    });

    let submit = () => {
        form.post('/forgot-password');
    };
</script>
