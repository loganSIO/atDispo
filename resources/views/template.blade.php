<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
  </head>

  <body class="has-background-light">

    <header>
      <nav class="navbar is-info" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">

          <a class="navbar-item" href="http://127.0.0.1:8004/">Ah ! t'es dispo ?</a>

          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>

        </div>

        <div id="navMenu" class="navbar-menu">

          <div class="navbar-start">
            <a class="navbar-item">Accueil</a>
            <a class="navbar-item">Calendrier</a>
          </div>

        </div>

      </div>
    </nav>

    <script>

    document.addEventListener('DOMContentLoaded', () => {
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
      if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach( el => {
          el.addEventListener('click', () => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
      });
    });
  }
});
    </script>

    </header>

    <main>

      <p>Popaul</p>

    </main>

    <footer class="has-background-info">
      <div class="content has-text-centered">
        <p class="has-text-white">&copy; Ah ! t'es dispo ? | Tous droits réservés | KUNTZ Basile - LE-NEVEZ Logan {{ date('Y') }}</p>
      </div>
    </footer>

  </body>
</html>
