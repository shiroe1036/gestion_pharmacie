@extends('base')

@section('content-body')
<section class="panel mt-3">
    @if(Session::has('error'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('error') }}</p>
    </div>
    @endif
    <form action="{{ route('client.store') }}" method="post">
        @csrf
        <div class="panel-body">

            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="nomClient" class="control-label">Nom</label>
                        <input type="text" name="nomClient" value="{{ old('nomClient') }}" placeholder="Nom du client" class="form-control {{ $errors->has('nomClient') ? 'is-invalid' : '' }}" autofocus>

                        @if($errors->has('nomClient'))
                        <label for="nomClient" class="invalid-feedback"> {{ $errors->first('nomClient') }} </label>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact</label>
                        <input type="number" name="contact" placeholder="Numéro téléphone ici" value="{{ old('contact') }}" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" autofocus>
                        @if($errors->has('contact'))
                        <label for="contact" class="invalid-feedback">{{ $errors->first('contact') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" placeholder="votre email ici" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @if($errors->has('email'))
                        <label for="email" class="invalid-feedback">{{ $errors->first('email') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="adresse" class="control-label">Adresse</label>
                        <input type="text" name="adresse" placeholder="Adresse Lot ici" value="{{ old('adresse') }}" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}">
                        @if($errors->has('adresse'))
                        <label for="adresse" class="invalid-feedback">{{ $errors->first('adresse') }}</label>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Valider</button>
                    <a href="{{ route('client.index') }}" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection