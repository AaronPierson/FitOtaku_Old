<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'dark' }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">   
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <title>Fit Otaku</title>
    <link rel="shortcut icon" href="/images/blackicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/base.css" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TZ1TMZ8Y2W"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-TZ1TMZ8Y2W');
    </script>
    @inertiaHead
    <!-- Google tag (gtag.js) -->
  </head>
  <body>
    @inertia
    <button id="toggle-theme-button" class="circular-button" 
    aria-label="Turn off dark mode">
      {{-- <img src="/images/icon.png" alt="T" /> --}}
    </button>
    
    <script>
      const button = document.getElementById('toggle-theme-button');
      const html = document.querySelector('html');
      
      button.addEventListener('click', () => {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-theme', newTheme);
      });
    </script>

  <style>
    .circular-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 50px;
      height: 50px;
      background-color: var(--pico-color-primary);
      background-color: #eacf5a;
      color: white;
      border-radius: 50%;
      border: none;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .circular-button:hover img:hover{
      transform: scale(1.1);
    }

    .circular-button img {
      position: fixed;
      bottom: 40px;
      right: 20px;
      width: 50px;
      height: 50px;
      cursor: pointer;
      border: none;
      transition: all 0.3s ease;
    }
    </style>
  </body>
</html>