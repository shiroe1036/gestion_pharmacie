@extends('base')

@section('content-body')
<section class="panel mt-3">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('error') }}</p>
    </div>
    @endif
    <form action="{{ route('fournisseur.update', ['id' => $data->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="nomFournisseur" class="control-label">Nom Fournisseur</label>
                        <input type="text" placeholder="Nom fournisseur ici" class="form-control {{ $errors->has('nomFournisseur') ? 'is-invalid' : '' }}" name="nomFournisseur" value="{{ $data->nomFournisseur }}" autofocus>
                        @if($errors->has('nomFournisseur'))
                        <label for="nomFournisseur" class="invalid-feedback">{{ $errors->first('nomFournisseur') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" name="contact" placeholder="contact fournisseur ici" value="{{ $data->contact }}" class="form-control  {{ $errors->has('contact') ? 'is-invalid' : '' }}" autofocus>
                        @if($errors->has('contact'))
                        <label for="contact" class="invalid-feedback">{{ $errors->first('contact') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" value="{{ $data->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autofocus>
                        @if($errors->has('email'))
                        <label for="email" class="invalid-feedback">{{ $errors->first('email') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="adresse" class="control-label">Adresse</label>
                        <input type="text" name="adresse" value="{{ $data->adresse }}" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}">
                        @if($errors->has('adresse'))
                        <label for="adress" class="invalid-feedback">{{ $errors->adresse }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Valider</button>
                    <a href="{{ route('fournisseur.index') }}" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection