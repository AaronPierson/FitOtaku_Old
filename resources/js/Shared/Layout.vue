<template>
   <Nav/>
   <slot/>
   <Footer/>
</template>


<script>
import Nav from './Nav';
import Footer from './Footer';

export default {
    components: {Nav, Footer,},
    props: ['authenticated'],

};
</script>
