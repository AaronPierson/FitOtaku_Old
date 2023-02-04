<template>
    <Layout>
        <main class="container">
            <section class="hero">
            <h1 class="title">
                Contact Us
            </h1>
            </section>
            <article>
                    <h2>Send us a message</h2>
                    <form @submit.prevent="submit">
                        <div>
                            <label for="name">Name</label>
                            <input v-model="form.name" type="text" name="name" id="name" required/>
                            <label for="email">email</label>
                            <input v-model="form.email" type="email" name="email" id="email" required/>
                            <label for="message">Message</label>
                            <textarea v-model="form.message" type="text" name="message" id="message" required/>
                            <button type="submit">
                                Send
                            </button>
                        </div>
                    </form>
            </article>
        </main>
    </Layout>
</template>

<script>

import Layout from '../Shared/Layout';
export default {
    components: {
        Layout,
    },
}

</script>

<script setup>
import {reactive} from "vue";
import { router } from '@inertiajs/vue3'


let form = reactive({
    name: '',
    email: '',
    message: ''
});

let submit = () => {
    router.post('/Contact', form);
};  
</script>