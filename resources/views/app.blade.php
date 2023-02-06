<!DOCTYPE html>
<html lang="en" data-theme="dark" >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" /> --}}
    <link rel="stylesheet" href="/css/base.css" />
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    {{-- <style type="text/css">
    body{
      font-family: 'EB Garamond', serif;
    }
    </style> --}}

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>