<template>
    <Layout>
        <main class="container">
        <h1>Your Workouts</h1>
        <article>
            <table role="grid">
            <thead>
                <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="workout in Workouts" :key="workout.id">
                <td>{{ workout.name }}</td>
                <td>{{ workout.description?.slice(0, 50) }}</td>
                <td>
                    <Link :href="`/p1/workout/${workout.id}/delete`" :method="'delete'">Delete</Link>
                    <span> | </span>
                    <Link :href="`/p1/workout/${workout.id}`">View</Link>
                </td>
                </tr>
            </tbody>
            </table>
        </article>
        </main>
    </Layout>
</template>

<script>
    import Layout from '../../../Shared/Layout';
    import {Link} from '@inertiajs/vue3';

    export default{
        components: {
            Layout,
            Link,
        },
    props: {
        Workouts: {
            type: Array,
            required: true,
            default: []
        }
    }
    };
</script>