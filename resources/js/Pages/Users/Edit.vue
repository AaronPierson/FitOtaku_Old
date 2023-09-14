<template>
    <Layout>
        <main class="container">
            <article>
                <h1 class="text-2xl font-bold text-gray-900">User Settings</h1>
                <p class="text-gray-700">Update your settings</p>
                <form method="POST" @submit.prevent="submit">
                    <!-- <div class="grid">
                        <div>
                        </div>
                        <div>
                            <label for="avatar">Avatar:</label>
                            <input type="file" id="avatar" name="avatar" accept="image/*">
                        </div>
                    </div> -->
                    
                    <input type="text" name="name" v-model="form.name" placeholder="Name" aria-label="Name" autocomplete="nickname">
                    <div v-if="form.errors.name" v-text="form.errors.name" class="error"></div>
                    <input type="email" name="email" v-model="form.email" placeholder="Email" aria-label="Email" autocomplete="@">
                    <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
                    <div class="grid">
                        <div>
                            <input type="password" name="password" v-model="form.password" placeholder="Password" aria-label="Password" autocomplete="current-password">
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div v-if="form.errors.password" v-text="form.errors.password" class="error">
                        </div>
                    </div>

                    <!-- Birthday -->
                    <input type="date" name="birthday" 
                        v-model="form.birthday" 
                        placeholder="Birthday" 
                        aria-label="birthday" 
                        autocomplete="Date" min="1950-01-01" max="2019-12-31">
                    <!-- bio -->
                    <textarea name="bio" v-model="form.bio"
                     id="bio" cols="30" 
                     rows="10" placeholder="Bio"></textarea>
                    <div class="grid">
                    <div>
                    <!-- Height -->
                        <label for="height">Height (in):</label>
                        <input type="number" v-model="form.height"
                        id="height" name="height" 
                        placeholder="Enter height in inches" 
                        min="4" max="10" step="0.1">
                        </div>
                        <div>
                        <!-- Age -->
                            <label for="age">Age:</label>
                            <input type="number" id="age" 
                            name="age" placeholder="Enter age" 
                            min="1" max="100" v-model="form.age">
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="grid">
                        <!-- <div>
                            <input type="text" id="name" name="name" 
                            placeholder="Name" aria-label="Name" 
                            autocomplete="nickname">
                        </div> -->
                        <div>
                            <fieldset>
                                <label>Gender:</label>
                                <input type="radio" id="male" name="gender" value="Male" v-model="form.gender">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="Female" v-model="form.gender">
                                <label for="female">Female</label>
                                <!-- <input type="radio" id="other" name="gender" value="Other" v-model="form.gender">
                                <label for="other">Other</label> -->
                            </fieldset>
                        </div>
                    </div>          
                    <button type="submit" class="contrast" :disabled="form.processing">Update</button>
                </form>
            </article>
            <!-- <Link role="button" class="secondary" href="/p1/delete">Delete Account</Link> -->
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
import { useForm} from '@inertiajs/vue3';

let form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    birthday: null,
    bio: '',
    gender: null,
    height: null,
    age: null,
});

let validatePass = () => {
    // check if not null
    if (form.password == null) {
        if (form.password !== form.password_confirmation) {
            alert('The password confirmation does not match.');
            return false;
        }
        // Check for minimum length of 8 characters
        if (form.password.length < 6) {
            alert('The password must be at least 6 characters long.');
            return false;
        }else{
            console.log('password is empty');
            return true;

        }
        //     // Check for at least 1 numeric digit
        //     if (!/\d/.test(form.password)) {
        //     alert('The password must contain at least 1 numeric digit.');
        //     form.errors.password= 'The password must contain at least 1 numeric digit.';
        //     return false;
        //   }
    }
  return true;
};

let submit = async () => {
    try {
        if (validatePass()) {
            await form.post('/p1/update');
            form.reset();
        }
    } catch (error) {
        if (error.response.status === 422) {
            // Display the error message to the user
            alert(error.response.data.errors.email[0]);
        }
    }
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

    .success{
        color: green;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>