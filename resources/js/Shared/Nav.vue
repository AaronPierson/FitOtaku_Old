<template>
   <header>
    <nav>
      <ul>
        <li><Link href="/">Home</Link></li>
        <li><Link href="#">Exercises</Link></li>
        <li><Link href="#leaderboard">Leaderboard</Link></li>
        <li><Link href="/About">About</Link></li>
        <li><Link href="#">Contact</Link></li>
      </ul>
    </nav>
    <h1>Fitness Quest</h1>
</header>

</template>
<script>
    import {Link} from '@inertiajs/vue3';
    export default {
        components: {
            Link
        },
    };
</script>

<style scope>

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    font-size: 36px;
    margin: 0;
}

nav {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav li {
    margin: 0 10px;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}


</style>