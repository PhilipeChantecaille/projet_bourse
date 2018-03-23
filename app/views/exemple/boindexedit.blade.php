@extends( 'backoffice/boindex' )
@section('formedit')
<!-- ***CACHÉ DANS LE BOUTON ÉDITER *** -->
<div class="modal in" id="editer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('/bo/tile/editsave') }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{{$tileEdit['id']}}">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Ajouter une tuile</h5>
          <a style="color:darkgrey;font-size:1.5em" href="{{ url('/bo')}}"><i class="fa fa-times"></i></a>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Entrer titre" value="{{$tileEdit['title']}}">
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Écrire description">{{$tileEdit['description']}}</textarea>
          </div>

          <div class="form-group">
            <label for="poster">Image de la tuile</label>
            <div class="input-group">
              <input type="file" id="poster" name="poster" class="form-control" aria-describedby="basic-addon2" value="{{$tileEdit['image']}}">
            </div>
          </div>

          <div class="form-group">
            <label for="layout">Gabarit de tuile</label>
            <select class="form-control" id="layout" name="layout">
              <option value="full" selected>Image dans son ensemble</option>
              <option value="half">Moitié/moitié : image et texte (image à gauche)</option>
              <option value="half txtfirst">Moitié/moitié : texte et image (texte à gauche)</option>
              <option value="tier">Deux tiers/un tier : image et texte (image à gauche)</option>
              <option value="tier txtfirst">Un tier/deux tiers : texte et image (texte à gauche)</option>
            </select>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <a href="{{ url('/bo')}}" class="mycloseedit btn btn-secondary" >Retour</a>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
    </form>
  </div>
</div>


@endsection
