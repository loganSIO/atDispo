Bonjour Administrateur,
<br><br>
L'utilisateur : {{$email_data['name']}} / {{$email_data['email']}} vient de se créer un compte sur {{ config('app.name', 'Ah ! t\'es dispo ?') }}.
<br><br>
Clique <a href="http://127.0.0.1:8000/verify?code={{$email_data['verification_code']}}">ici</a> pour valider son compte afin qu'il ait accès à ton calendrier de disponibilités !
