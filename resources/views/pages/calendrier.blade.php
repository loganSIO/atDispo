@extends('layouts.app')
@section('content')

<div class="container">

  <div id="agenda">
    calendrier
  </div>

</div>

<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#event">
  Launch
</button>


  <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <form action="">

            <div class="form-group">
              <label for="id">ID</label>
              <input type="text" class="form-control" name="id" id="id" aria-describeby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help Text</small>
            </div>

            <div class="form-group">
              <label for="">Titre</label>
              <input type="text" class="form-control" name="title" id="title" aria-describeby="helpId" placeholder="Titre de l'évènement">
              <small id="helpId" class="form-text text-muted">Help Text</small>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="start">Début</label>
              <input type="text" class="form-control" name="start" id="start" aria-describeby="helpId" placeholder="Début de l'évènement">
              <small id="helpId" class="form-text text-muted">Help Text</small>
            </div>

            <div class="form-group">
              <label for="end">Fin</label>
              <input type="text" class="form-control" name="end" id="end" aria-describeby="helpId" placeholder="Fin de l'évènement">
              <small id="helpId" class="form-text text-muted">Help Text</small>
            </div>

          </form>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-success" id="btnSauvegarder">Sauvegarder</button>
          <button type="button" class="btn btn-warning" id="btnModifier">Modifier</button>
          <button type="button" class="btn btn-danger" id="btnSupprimer">Supprimer</button>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>


        </div>
      </div>
    </div>
  </div>

@endsection
