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
                    <hr>
                    <div class="card">
                        <div class="card-header"><i class="fas fa-user-tie"></i> | <b>Liste des Clients</b></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Telephone</th>
                                            <th>Adresse</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Nombre De Place</th>
                                            <th>Categorie</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($clients as $client)
                                       <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->nom }}</td>
                                        <td>{{ $client->prenom }}</td>
                                        <td>{{ $client->telephone }}</td>
                                        <td>{{ $client->adresse }}</td>
                                        <td>{{ $client->date }}</td>
                                        <td>{{ $client->heure }}</td>
                                        <td>{{ $client->nombre_place }}</td>
                                        <td>{{ $client->idCategorie }}</td>
                                        
                                        <td>
                                            <button type="submit" class="btn btn-warning">Modifier</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
