<template>
    <Layout>
        <main class="container">
            <article>
                <hgroup>
            <h1>
                About Us
            </h1>
            <p>
                Welcome to the ultimate fitness experience for gamers! Our app is designed specifically with gamers in mind, bringing together the worlds of fitness and gaming to help you reach your fitness goals. 
                We believe that fitness should be fun, and our app combines challenging workouts with gamified progress tracking to make fitness enjoyable and addictive. 
                Whether you're looking to build muscle, lose weight, or just improve your overall health, our app is the perfect companion for your fitness journey.
            </p>
            </hgroup>

            <hgroup>
                <h2>Purpose of Site:</h2>
                <p>
                    Our app was created with the goal of making fitness accessible and fun for all gamers. 
                    We believe that fitness shouldn't be a chore, but rather a fun and engaging activity that you look forward to each day. 
                    Our app provides a comprehensive fitness experience, with a wide variety of workouts to choose from, along with tracking features to help you see your progress. 
                    Whether you're a beginner or an experienced fitness enthusiast, our app has something for everyone.
                </p>
            </hgroup>

            <details>
                <h2>FAQ:</h2>
                <summary>Q: Why was this app created specifically for gamers?</summary>
                <p>
                    A: We believe that gamers have unique needs when it comes to fitness, and our app was created to meet those needs. 
                    From gamified progress tracking to challenging workouts, our app is designed to keep gamers motivated and engaged in their fitness journey.
                </p>
            </details>
            <details>
                <summary>Q: Is this app suitable for all fitness levels?</summary>
                <p>
                    A: Yes! Our app provides a wide range of workouts, from beginner-friendly exercises to more advanced routines. 
                    Whether you're just starting out or you're a seasoned fitness enthusiast, our app has something for you.
                </p>
            </details>
            <details>
                <summary>Q: Can I track my progress with the app?</summary>
                <p>
                    A: Absolutely! Our app includes tracking features to help you see your progress, and provides a fun and engaging way to stay motivated. 
                    You can track your progress over time, see your personal bests, and compare your progress with other gamers.
                </p>
            </details>
            <details>
                <summary>Q: Do I need any special equipment to use the app?</summary>
                <p>
                    A: No, our app is designed to be used with just your bodyweight. 
                    All exercises can be done at home or on the go, so you don't need any special equipment to get started.
                </p>
            </details>
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
};
</script>

<style scoped>
hgroup {
    margin-bottom: 2rem;
}
h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-align: center;
}
h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}
h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

</style>