<template>
    <footer class="container">
        <p>&copy; Fitness Quest 2023</p>
        <nav>
            <ul>
                <li><Link href="/">Home</Link></li>
                <li><Link href="/About">About</Link></li>
                <li><Link href="/Contact">Contact</Link></li>
            </ul>
        </nav>
  </footer>
</template>

<script>
    import {Link} from '@inertiajs/vue3';
    export default {
        components: {
            Link,
        },
    };
</script>

<style>
 footer{
        /* position: fixed; */
        /* bottom: 0; */
        /* line-height: 60px; */
        /* border-top: 1px solid #e5e5e5; */
        width: 100%;
        text-align: center;
        margin: 50px;
    }
    li{
        display: inline;
        padding: 0 10px;
        list-style: none;
    }
</style>