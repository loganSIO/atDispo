@extends('layouts.app')
@section('content')

<div class="container">

  <div id="agenda">
  </div>

</div>

  <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter une disponibilité</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <form action="" id="formulaireEvent">

            {!! csrf_field() !!}

            <div class="form-group d-none">
              <label for="id">ID</label>
              <input type="text" class="form-control" name="id" id="id" aria-describeby="helpId" placeholder="">
            </div>

            <div class="form-group">
              <label for="">Titre</label>
              <input type="text" class="form-control" name="title" id="title" aria-describeby="helpId" placeholder="Titre de l'évènement">
              <!--<small id="helpId" class="form-text text-muted">Écrivez votre cours du jour</small>-->
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3" placeholder="Informations complémentaires : nom de la formation, salle de cours..."></textarea>
            </div>

            <div class="form-group">
              <label for="statutCreneau">Statut du crénau</label>
              <select class="form-control" id="statutCreneau" name="statutCreneau">
                <option value="1">Disponible</option>
                <option value="2">Disponibilité possible, mais incertaine</option>
                <option value="3">Indisponible</option>
              </select>
            </div>

            <div class="form-group">
              <label for="color">Couleur</label>
              <input type="color" class="form-control" name="color" id="color" aria-describeby="helpId" value="#BF4040">
              <small id="helpId" class="form-text text-muted">Mémo couleur : vert = disponible, orange = disponibilité possible mais incertaine, rouge = indisponible</small>
            </div>

            <div class="form-group">
              <label for="start">Début</label>
              <input type="datetime-local" class="form-control" name="start" id="start" aria-describeby="helpId" placeholder="Début de l'évènement">
              <small id="helpId" class="form-text text-muted">Note : la date est sous format Mois/Jour/Année, l'heure est en format AM = matin / PM = après-midi</small>
            </div>

            <div class="form-group">
              <label for="end">Fin</label>
              <input type="datetime-local" class="form-control" name="end" id="end" aria-describeby="helpId" placeholder="Fin de l'évènement">
              <small id="helpId" class="form-text text-muted">Note : la date est sous format Mois/Jour/Année, l'heure est en format AM = matin / PM = après-midi</small>
            </div>

          </form>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-success" id="btnSauvegarder">Sauvegarder</button>
          <button type="button" class="btn btn-warning" id="btnModifier">Modifier</button>
          @if(Auth::user()->role=='0')
          <button type="button" class="btn btn-danger" id="btnSupprimer">Supprimer</button>
          @endif
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>


        </div>
      </div>
    </div>
  </div>

@endsection
