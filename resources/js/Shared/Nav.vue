<template>
<header>
  <div class="logo-ham">
      <div class="logo">
      <img src='/images/logo3.png' alt="Logo"/>
    </div>
    <div class="hamburger" @click="toggleMenu">
        <span class="hamburger-icon"></span>
    </div>
  </div>

  <nav :class="{'menu-open': isMenuOpen}">
    <ul>
      <li><Link href="/">Home</Link></li>
      <!-- <li><Link href="#">Exercises</Link></li> -->
      <!-- <li><Link href="#leaderboard">Leaderboard</Link></li> -->
      <li><Link href="/About">About</Link></li>
      <li><Link href="/Contact">Contact</Link></li>
      <template v-if="isAuthenticated">
          <li>
              <Link href="/p1/show" class="Primary">Dashboard</Link>
          </li>
            <li>
                <Link href="/logout" method="post" class="secondary">Log Out</Link>
            </li>
        </template>
        <template v-else>
            <li>
              <Link href="/login" class="Primary">Log In</Link>
            </li>
            <li>
              <Link href="/signup" class="contrast" >Sign Up</Link>
            </li>
        </template>
    </ul>
    <!-- <button class="hamburger" @click="toggleMenu">
      <span class="sr-only">Toggle menu</span>
      <span class="hamburger-icon"></span>
    </button> -->
  </nav>
</header>

</template>
<script>
    import {Link} from '@inertiajs/vue3';
    import axios from 'axios';
    export default {
        components: {
            Link
        },
        data() {
    return {
      authenticated: false,
      isMenuOpen: false
    };
  },
  mounted() {
    // console.log('the nav is mounted');
    axios.get('/api/auth/status')
      .then(response => {
        this.authenticated = response.data.authenticated;
        console.log(this.authenticated);
      });
  },
  computed: {
    isAuthenticated() {
      return this.authenticated;
    }
  },
  methods: {
            toggleMenu() {
                this.isMenuOpen = !this.isMenuOpen;
            }
        }
};
</script>

<style scope>
/*Desktop */
@media (min-width: 769px) {
  .hamburger {
    display: none;
  }

  header {
    padding: 20px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    margin-right: 5%;
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

  nav.menu-open {
      transform: translateY(0%);
  }

  .log-in-out-container {
    display: flex;
    justify-content: flex-end;
  }

  .logo {
    margin-right: auto;
  }
  img{
      width: 55%;
      height: 55%;
      max-width: 100px;
  }
    /* .log-in-out {
      margin-left: auto;
    } */
  }
  /* Moblie */
  @media (max-width: 768px) {
    .logo-ham{
      justify-content: space-between;
      display: flex;
      margin: 30px;
      align-items: center;
      text-align: center;
      /* justify-content: space-between; */
    }
    header {
      /* display: flex; */
      padding: 1rem;
      text-align: center;
      margin-bottom: 20px;
      /* background: linear-gradient(145deg, #fdd13a, #3e5033); */

    }
    nav {
      display: flex;
      flex-direction: column;
    }

    nav ul {
      list-style: none;
      display: none; /* hide the links by default */
      margin: 0;
      padding: 0;
    }

    nav.menu-open ul {
      display: flex; /* show the links when the menu is open */
      flex-direction: column; /* stack the links vertically */
      align-items: center; /* center the links horizontally */
    }

    nav li {
      margin: 10px 0; /* add some vertical spacing between the links */
      /* border-bottom: black 1px solid;
      width: 100%; */
      text-align: center;    
    }

    nav a {
      text-decoration: none;
      font-size: 18px;
    }

    .hamburger {
      display: block;
      margin: 0 20px;
      border: none;
      position: relative;
      z-index: 1;
    }

    .hamburger-icon {
      display: block;
      width: 24px;
      height: 2px;
      background-color: #000;
      position: relative;
      transition: background-color 0.3s ease;
    }

    .hamburger-icon::before,
    .hamburger-icon::after {
      content: '';
      display: block;
      width: 100%;
      height: 100%;
      background-color: #000;
      position: absolute;
      left: 0;
      transition: transform 0.3s ease;
    }

    .hamburger-icon::before {
      top: -6px;
    }

    .hamburger-icon::after {
      bottom: -6px;
    }

    .menu-open .hamburger-icon {
      background-color: transparent;
    }

    .menu-open .hamburger-icon::before {
      transform: rotate(45deg);
      top: 0;
    }

    .menu-open .hamburger-icon::after {
      transform: rotate(-45deg);
      bottom: 0;
    }

    .logo {
      display: flex;
      margin: 0px;
    }

    img{
      width: 28%;
      height: 28%;
      max-width: 280px;
  }

  ul > li {
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 0.5em 0;
    width: 100%;
    /* background-color: #222; */
  }

  /* ul > li:not(:last-child) {
    border-bottom: 1px solid #444;
    border-radius: 15%;
  } */

  ul > li {
    border-bottom: 1px solid #444;
    border-radius: 10%;
  }

}

</style>