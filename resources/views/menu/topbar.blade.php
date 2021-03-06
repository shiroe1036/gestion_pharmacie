<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Gestion pharmacie</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="navbar-nav mr-auto">
                <a href="{{ route('client.index') }}" class="nav-link">Client</a>
            </li>
            <li class="navbar-nav mr-auto">
                <a href="{{ route('fournisseur.index') }}" class="nav-link">Fournisseur</a>
            </li>
            <li class="navbar-nav mr-auto">
                <a href="{{ route('medicament.index') }}" class="nav-link">Médicament</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link">Mon compte !</a>
            </li>
        </ul>
    </div>
</nav>