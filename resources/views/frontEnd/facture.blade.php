<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page Bootstrap</title>
    <!-- CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><span>
                    <h1 class="text-warning"><b>YO|</b></h1>voyage
                </span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('avis')}}">Avis Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bannière avec forme d'onde -->
    <!-- Carrousel -->
    <div id="carouselExampleIndicators" class="carousel slide ssl" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner in">
            <div class="carousel-item active">
                <img src="/images/auto.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/auto2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/Audi.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- <svg class="wave-shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,96L34.3,122.7C68.6,149,137,203,206,224C274.3,245,343,235,411,197.3C480,160,549,96,617,106.7C685.7,117,754,203,823,213.3C891.4,224,960,160,1029,128C1097.1,96,1166,96,1234,117.3C1302.9,139,1371,181,1406,202.7L1440,224L1440,320L1406.7,320C1373.7,320,1310.3,320,1240,320C1170.3,320,1103,320,1034,320C964.3,320,894,320,823,320C752,320,680,320,617,320C546.9,320,486,320,417,320C346.3,320,274,320,206,320C137.1,320,68,320,34,320L0,320Z"></path></svg> -->

    <!-- Contenu du corps -->
    <div class="container mt-5">
        <div class="card bg-white aproposee">
            
                <h5 class="card-header"><b>Facture</b></h5>
                <div class="card-body">
                    <p class="card-text">
                        <h6>
                            <b>
                             <ul>
                                <li>Nom / Prénom: {{ $reservation->client->nom }} {{ $reservation->client->prenom }}</li>
                                <li>Date: {{ $reservation->created_at->format('d/m/Y H:i') }}</li>
                                <li>Nombre de places: {{ $reservation->nombre_place }}</li>
                                <li>Trajet: {{ $reservation->trajet->trajet }}</li>
                                <li>Vehicule: {{ $reservation->client->idCategorie }}</li>
                                <li>Nombre de places: {{ $reservation->nombre_place }}</li>
                            {{-- <li>Véhicule: {{ $reservation->idCategorie->nom }}</li> <!-- Assurez-vous d'ajuster cela en fonction de votre modèle Vehicule --> --}}
                             </ul>
                            </b>
                        </h6>
                       
                    </p>
                 </div>
                <div class="card-footer text-end">
                    <h4><b>Montant :{{ $reservation->trajet->tarif }} </b></h4>
                    <button class="btn btn-primary">Payer</button>
                </div>
            
        </div>
    </div>

    <!-- JavaScript de Bootstrap (optionnel) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
