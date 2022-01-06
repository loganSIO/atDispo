Bonjour Administrateur,
<br><br>
L'utilisateur : <br>
{{$email_data['name']}} vient de se créer un compte sur {{ config('app.name', 'Ah ! t\'es dispo ?') }}.
<br><br>
Clique <a href="http://127.0.0.1:8000/verify?code={{$email_data['verification_code']}}">ici</a> pour valider son compte afin qu'il ai accès à ton calendrier !
