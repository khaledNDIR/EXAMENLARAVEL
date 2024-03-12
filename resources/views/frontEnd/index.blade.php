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
                    <h2><b class="text-warning">YO|</b>voyage</h2>
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
                        <a class="nav-link" href="{{ route('avis') }}">Avis Client</a>
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
        <div class="row bg-dark apropos">
            <div class=" text-white m-5">
        
                    <b>
                        YOvoyage, une entreprise de location de véhicules confortables,
                         offre des solutions de voyage régional de qualité supérieure. 
                         Avec une flotte diversifiée de véhicules et un service client exceptionnel,
                         nous assurons des déplacements en toute commodité et sécurité.
                         Notre engagement envers l'excellence se reflète dans chaque aspect de notre entreprise, 
                         offrant à nos clients une expérience de voyage inoubliable. 
                         Que ce soit pour des voyages d'affaires ou des escapades personnelles, 
                         YOvoyage est votre partenaire de confiance pour explorer 
                         les merveilles de votre région en tout confort.
                    </b>
                
            </div>
        </div>
        <hr>
        <h3><b>Nos Trajets</b> </h3>
        <hr>
        <div class="card">
            <div class="card-header"><b>RESERVATION</b></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Itineraires</th>
                                <th>Trajets</th>
                                <th>Tarifs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itineraires as $itineraire)
                                <tr>
                                    <td>{{ $itineraire->id }}</td>
                                    <td>
                                        @if ($itineraire->image)
                                            <img src="{{ asset('images/' . $itineraire->image) }}"
                                                alt="Image du véhicule" style="max-width: 100px; max-height: 100px;">
                                        @else
                                            Pas d'image
                                        @endif
                                    </td>
                                    <td>{{ $itineraire->trajet }}</td>
                                    <td>{{ $itineraire->tarif }}</td>
                                    <td>
                                        <a href="{{ route('reservation', ['trajet_id' => $itineraire->id]) }}"
                                            class="btn btn-success">Reserver</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <h3><b>Espace Client</b></h3>
        <hr>

        <div class="card bg-white evaluation">
            <h5 class="card-header"><b class="fas fa-star">Evaluer Nos chauffeurs</b></h5>
              <div class="card-body">
                <form action="{{ route('evaluer') }}" method="POST" class="container mt-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-select form-control mb-3" aria-label="Sélectionner un chauffeur" name="nom_prenom_chauffeur">
                                <option selected>Sélectionner un chauffeur</option>
                                @foreach ($chauffeurs as $chauffeur)
                                    <option value=" {{ $chauffeur->prenom }} {{ $chauffeur->nom }}">{{ $chauffeur->nom }} {{ $chauffeur->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Ajoutez le reste de votre formulaire ici -->
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Entrez votre message ici" name="commentaire"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" class="form-control mb-3" placeholder="Entrez un nombre"
                                name="note">
                        </div>
                    </div>


            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Evaluer</button>
            </div>
            </form>
        </div>
    </div>



</html>
