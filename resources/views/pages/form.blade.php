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

    <header class="has-background-info has-text-white">
      <p class="content is-large has-text-centered">Ah ! t'es dispo ?</p>
    </header>

    <main>

      <div class="box">
        <form class="has-background-info">

          <div class="field has-text-centered">
            <label class="label">Nom</label>
            <div class="control">
              <input class="input" type="text" placeholder="Votre nom">
            </div>
            <label class="label">Prénom</label>
            <div class="control">
              <input class="input" type="text" placeholder="Votre prénom">
            </div>
          </div>
          <div class="field has-text-centered">
            <label class="label">Email</label>
              <div class="control">
                <input class="input" type="email" placeholder="Votre adresse mail">
          </div>
          <div class="field has-text-centered">
            <label class="label">Mot de passe</label>
              <div class="control">
                <input class="input" type="password" placeholder="Votre mot de passe">
          </div>
          <div class="field">
            <label class="label">Responsable de la formation</label>
            <div class="control">
              <div class="select">
                <select>
                  <option>CCI Campus</option>
                  <option>IFIDE</option>
                </select>
              </div>
            </div>
          </div>
          <div class="control">
            <button class="button is-light">S'enregistrer</button>
          </div>

        </form>
      </div>

    </main>

    <footer class="has-background-info">
      <div class="content has-text-centered">
        <p class="has-text-white">&copy; Ah ! t'es dispo ? | Tous droits réservés | KUNTZ Basile - LE-NEVEZ Logan {{ date('Y') }}</p>
      </div>
    </footer>

  </body>
</html>
