@extends('base')

@section('content-body')
<section class="panel mt-3">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{{ Session('error') }}</p>
    </div>
    @endif
    <form action="{{ route('client.update', $client->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="nomClient" class="control-label">Nom</label>
                        <input name="nomClient" type="text" placeholder="Nom client" value="{{ $client->nomClient }}" class="form-control {{ $errors->has('nomClient') ? 'is-invalid' : '' }}">
                        @if($errors->has('nomClient'))
                        <label for="nomClient" class="invalid-feedback">{{ $errors->first('nomClient') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="contact" class="control-label">Contact</label>
                    <input name="contact" type="text" placeholder="numéro téléphone ici" value="{{ $client->contact }}" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}">
                    @if($errors->has('contact'))
                    <label for="contact" class="invalid-feedback">{{ $client->first('contact') }}</label>
                    @endif
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="email" class="control-label">Email</label>
                    <input name="email" type="email" placeholder="email ici" value="{{ $client->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                    @if($errors->has('email'))
                    <label for="email" class="invalid-feedback">{{ $errors->first('email') }}</label>
                    @endif
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="adresse" class="control-label">Adresse</label>
                    <input name="adresse" type="text" placeholder="Adresse lot ici" value="{{ $client->adresse }}" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}">
                    @if($errors->has('adresse'))
                    <label for="adresse" class="invalid-feedback">{{ $errors->first('adresse') }}</label>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 mt-4">
                    <button class="btn btn-primary">Modifier</button>
                    <a href="{{ route('client.index') }}" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection