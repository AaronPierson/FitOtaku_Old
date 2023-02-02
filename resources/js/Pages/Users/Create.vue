<template>
    <!-- <head title="Create User"/> -->
    <h1>Create New User</h1>

        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>
                <input v-model="form.name" type="text" name="name" id="name" required/>
                <label for="email">email</label>
                <input v-model="form.email" type="email" name="email" id="email" required/>
                <label for="password">Password</label>
                <input v-model="form.password" type="password" name="password" id="password" required/>
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
</template>

<style scoped>
h1, label{
    color: white;
}
</style>

<script setup>
import {reactive} from "vue";
import { router } from '@inertiajs/vue3'
let form = reactive({
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    router.post('/users', form);
};
</script>
