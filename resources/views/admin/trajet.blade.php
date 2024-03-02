<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    @extends('layouts.app')
    <div class="wrapper">
        @include('layouts.sidebar')
        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('layouts.navbar')
            <!-- end of navbar navigation -->


            <div class="content">
                <div class="container">
                    <div class="row mt-5" style="box-shadow: 2px 0px 8px 0px rgb(156, 154, 154);">
                        <div class="col-12">
                            <form action="{{route('trajetTab')}} " method="POST" enctype="multipart/form-data">
                                @csrf <!-- Ajoute un jeton CSRF pour la sécurité -->
                                <div class="form-group">
                                    <label for="image">Itineraire</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="trajet">Trajet</label>
                                    <input type="text" class="form-control" id="trajet" name="trajet" required>
                                </div>
                                <div class="form-group">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" class="form-control" id="tarif" name="tarif" required>
                                </div>
    
                                <br>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>

                        <div class="col-12">
                            <hr>
                    <div class="card">
                        <div class="card-header"><i class="fas fa-map-marked-alt"></i> | <b>Liste des Trajets</b></div>
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
                                        @foreach($itineraires as $itineraire)
                                        <tr>
                                            <td>{{ $itineraire->id }}</td>
                                            <td>
                                                @if($itineraire->image)
                                                <img src="{{ asset('images/' . $itineraire->image) }}" alt="Image du véhicule" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    Pas d'image
                                                @endif
                                            </td>
                                            <td>{{ $itineraire->trajet }}</td>
                                            <td>{{ $itineraire->tarif }}</td>
                                            <td>
                                                <!-- Ajoutez ici les boutons pour les actions que vous souhaitez réaliser, par exemple la modification ou la suppression -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                

                            </div>
                        </div>
                    </div>
                        </div>

                    </div>

                   
                </div>
            </div>
        </div>

    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
