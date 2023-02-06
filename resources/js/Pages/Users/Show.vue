<template>
    <Layout>
        <main class="container">
            <div class="grid">
                <article class="user-info">
                    <div class="avatar">
                    <!-- Avatar section -->
                    <img src="avatar.png" alt="user avatar">
                    </div>
                    <div class="user-details">
                    <!-- User name, class and stats -->
                    <h3>{{User.name}}</h3>
                    <p>Current Class: {{currentClass}}</p>
                    <p>Stats: {{stats}}</p>
                    </div>
                </article>
<!-- 
                <article class="avatar">
                    <h2>Avatar</h2>
                    <img :src="avatarImage"/>
                </article> -->

                <article class="quests">
                    <!-- Quest section -->
                    <h4>Quests</h4>
                    <div v-for="quest in quests">
                    {{quest}}
                    </div>
                    <button class="contrast"
                    data-target="modal-example" onClick="toggleModal(event)">
                        Go to Job Board
                    </button>
                </article>
            </div>

        <article class="workouts">
            <!-- Workouts section -->
            <h4>Workouts</h4>
            <div v-for="workout in workouts">
            {{workout}}
            </div>
            <button>Add Workout</button>
            <button>Start Workout</button>
        </article>
        <div class="grid">
            <article class="weight-track">
                <!-- Weight tracking section -->
                <h4>Weight Tracking</h4>
                <form>
                <input type="text" placeholder="Enter weight">
                <button>Add</button>
                </form>
            </article>

            <article class="calories-track">
                <!-- Calories/Food tracking section -->
                <h4>Calories/Food Tracking</h4>
                <form>
                <input type="text" placeholder="Enter food">
                <input type="text" placeholder="Enter calories">
                <button>Add</button>
                </form>
            </article>
        </div>
        
        <!-- Journal section -->
        <!-- <article class="journal">
            <h4>Journal</h4>
            <form>
            <textarea id="journal" rows="3" class="form-control" placeholder="Enter your thoughts for today..."></textarea>
            <button>Save</button>
            </form>
            <div class="col-md-6">
            <h2>Today's Journal</h2>
            <p id="today-journal"></p>
            </div>
        </article> -->

        <!-- Fasting section -->
        <!-- <article class="fasting">
            <h4>Fasting</h4>
            <form>
            <input type="text" placeholder="Enter fasting hours">
            <button>Save</button>
            </form>
        </article> -->
        </main>
    </Layout>
</template>

<script>
    import Layout from '../../Shared/Layout';
    import Modal from '../../Shared/Modal';
    import Radar from './RadarChart';
    export default {
        props: ['User'],
        components: {
            Layout,
            Modal,
            Radar,
        },
        methods: {
        toggleModal() {
            const modal = document.querySelector('#modal-example');
            modal.classList.toggle('is-open');
        }
    }
};
</script>

<style>

</style>

