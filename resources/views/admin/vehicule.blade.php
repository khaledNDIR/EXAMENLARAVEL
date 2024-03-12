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
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><b>Vehicules Disponible</b></span>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-car"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <div class="stats">
                                                    <span  class="badge  bg-success">
                                                       {{ $nbrPLegerDispo }} 
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-truck"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <div class="stats">
                                                    <span align="center" class="badge  bg-success">
                                                        {{ $nbrPLourdDispo }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><b>Vehicules sur le terrain</b></span>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-car"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <span align="center" class="badge  bg-warning">
                                                    {{ $nbrPLegerST }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-truck"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <div class="stats">
                                                    <span align="center" class="badge bg-warning">
                                                        {{ $nbrPLourdST }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title"><b>Vehicules en panne</b></span>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-car"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <div class="stats">
                                                    <i class="fas fa-calendar"></i> For this Week
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <div class="icon-big text-center">
                                                    <i class="teal fas fa-truck"></i>
                                                </div>
                                            </div>

                                            <div class="footer">
                                                <hr />
                                                <div class="stats">
                                                    <i class="fas fa-calendar"></i> For this Week
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCandidatModal">
                        Ajouter
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addCandidatModal" tabindex="-1" role="dialog"
                        aria-labelledby="addCandidatModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCandidatModalLabel">Ajouter un vehicule</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the Modal -->
                                    <form action="{{ route('ajoutVehicule') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf <!-- Ajoute un jeton CSRF pour la sécurité -->
                                        <div class="form-group">
                                            <label for="marque">Marque</label>
                                            <input type="text" class="form-control" id="marque" name="marque"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_achat">Date d'achat</label>
                                            <input type="date" class="form-control" id="date_achat"
                                                name="date_achat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="KM_defaut">Kilométrage par défaut</label>
                                            <input type="number" class="form-control" id="KM_defaut"
                                                name="KM_defaut" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="matricule">Matricule</label>
                                            <input type="text" class="form-control" id="matricule"
                                                name="matricule" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image"
                                                name="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="idCategorie">Catégorie</label>
                                            <select class="form-control" id="idCategorie" name="idCategorie"
                                                required>
                                                <option value="">Sélectionnez une catégorie</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->nomCat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header">Liste des vehicules</div>
                        <div class="card-body">
                            <p class="card-title"></p>
                            <table class="table table-hover" id="dataTables-example" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Marque</th>
                                        <th>Date d'achat</th>
                                        <th>KM-Defaut</th>
                                        <th>Matricule</th>
                                        <th>Categorie</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicules as $vehicule)
                                        <tr>
                                            <td>{{ $vehicule->id }}</td>
                                            <td>
                                                @if ($vehicule->image)
                                                    <img src="{{ asset('images/' . $vehicule->image) }}"
                                                        alt="Image du véhicule"
                                                        style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    Pas d'image
                                                @endif
                                            </td>
                                            <td>{{ $vehicule->marque }}</td>
                                            <td>{{ $vehicule->date_achat }}</td>
                                            <td>{{ $vehicule->KM_defaut }}</td>
                                            <td>{{ $vehicule->matricule }}</td>
                                            <td>{{ $vehicule->idCategorie }}</td>
                                            <td colspan="2">
                                                {{-- <a type="button" class="fas fa-pen-square " style="color: rgb(224, 224, 46);" data-toggle="modal" data-target="#editCandidatModal" data-id="{{ $vehicule->id }}" data-marque="{{ $vehicule->marque }}" data-date="{{ $vehicule->date_achat }}" data-km="{{ $vehicule->KM_defaut }}" data-matricule="{{ $vehicule->matricule }}"></a> --}}
                                                <button class="btn btn-primary edit-btn" data-toggle="modal"
                                                    data-target="#editModal" data-id="{{ $vehicule->id }}"
                                                    data-marque="{{ $vehicule->marque }}"
                                                    data-date="{{ $vehicule->date_achat }}"
                                                    data-km="{{ $vehicule->KM_defaut }}"
                                                    data-matricule="{{ $vehicule->matricule }}"
                                                    data-image="{{ asset('images/' . $vehicule->image) }}">Modifier</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Modifier
                                                                    le véhicule</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="editForm"
                                                                action="{{ route('updateVehicule', $vehicule->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <!-- Champs du formulaire de modification -->
                                                                    <input type="hidden" id="editId"
                                                                        name="editId">
                                                                    <div class="form-group">
                                                                        <label for="editMarque">Marque</label>
                                                                        <input type="text" class="form-control"
                                                                            id="editMarque" name="editMarque"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editDate">Date d'achat</label>
                                                                        <input type="date" class="form-control"
                                                                            id="editDate" name="editDate" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editKm">Kilométrage par
                                                                            défaut</label>
                                                                        <input type="number" class="form-control"
                                                                            id="editKm" name="editKm" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editMatricule">Matricule</label>
                                                                        <input type="text" class="form-control"
                                                                            id="editMatricule" name="editMatricule"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editImage">Image</label>
                                                                        <input type="file"
                                                                            class="form-control-file" id="editImage"
                                                                            name="editImage">
                                                                        <img id="editImagePreview" src="#"
                                                                            alt="Aperçu de l'image"
                                                                            style="max-width: 100px; max-height: 100px;">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editCategorie">Catégorie</label>
                                                                        <select class="form-control"
                                                                            id="editCategorie" name="editCategorie"
                                                                            required>
                                                                            @foreach ($categories as $categorie)
                                                                                <option value="{{ $categorie->id }}">
                                                                                    {{ $categorie->nomCat }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Fermer</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Enregistrer les
                                                                        modifications</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <a href="{{ route('editVehicule', $vehicule->id) }}" class="fas fa-pen-square " style="color: rgb(224, 224, 46);"></a> --}}
                                                <form action="{{ route('deleteVehicule', $vehicule->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                         
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')"> 
                                                        supprimer
                                                        </buttton>
                                                </form>
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
    @include('layouts.js');
    <script>
        // Intercepter le clic sur un bouton "Modifier"
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var marque = $(this).data('marque');
            var date = $(this).data('date');
            var km = $(this).data('km');
            var matricule = $(this).(data 'matricule');
            var image = $(this).data('image');
            var categorie = $(this).data('categorie');

            // Remplir le formulaire de modification dans le modal avec les données du véhicule
            $('#editId').val(id);
            $('#editMarque').val(marque);
            $('#editDate').val(date);
            $('#editKm').val(km);
            $('#editMatricule').val(matricule);
            $('#editCategorie').val(categorie);


            // Afficher l'aperçu de l'image si une image existe
            if (image) {
                $('#editImagePreview').attr('src', '/images' + image).show();
            } else {
                $('#editImagePreview').hide();
            }
        });
    </script>

</body>

</html>
