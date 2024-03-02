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
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-car"></i>
                                            </div>
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
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-truck"></i>
                                            </div>
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
                    <hr>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addChauffeurModal">
                        Ajouter
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addChauffeurModal" tabindex="-1" role="dialog"
                        aria-labelledby="addCandidatModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCandidatModalLabel">Ajouter un Chauffeur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form inside the Modal -->
                                    <form action="{{ route('ajoutChauffeur') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf <!-- Ajoute un jeton CSRF pour la sécurité -->
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input type="text" class="form-control" id="nom" name="nom"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Expérience</label>
                                            <input type="number" class="form-control" id="experience" name="experience"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_permit">Numéro de permis</label>
                                            <input type="text" class="form-control" id="numero_permit"
                                                name="numero_permit" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_emission">Date d'émission du permis</label>
                                            <input type="date" class="form-control" id="date_emission"
                                                name="date_emission" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_expiration">Date d'expiration du permis</label>
                                            <input type="date" class="form-control" id="date_expiration"
                                                name="date_expiration" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="idCategorie">Catégorie</label>
                                            <select class="form-control" id="idCategorie" name="idCategorie" required>
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
                        <div class="card-header"><i class="fas fa-user-tie"></i> | <b>Liste des Chauffeurs</b></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Expérience</th>
                                            <th>Numéro de permis</th>
                                            <th>Date d'émission</th>
                                            <th>Date d'expiration</th>
                                            <th>Deplacement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chauffeurs as $chauffeur)
                                            <tr>
                                                <td>{{ $chauffeur->id }}</td>
                                                <td>{{ $chauffeur->nom }}</td>
                                                <td>{{ $chauffeur->prenom }}</td>
                                                <td>{{ $chauffeur->experience }}</td>
                                                <td>{{ $chauffeur->numero_permit }}</td>
                                                <td>{{ $chauffeur->date_emission }}</td>
                                                <td>{{ $chauffeur->date_expiration }}</td>
                                                <td>{{ $chauffeur->Deplacement ? 'Oui' : 'Non' }}</td>
                                                <td>
                                                    <!-- Boutons d'édition et de suppression -->
                                                    <button type="button" class="btn btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#modifierChauffeur{{ $chauffeur->id }}">
                                                        Modifier
                                                    </button>
                                                    @foreach ($chauffeurs as $chauffeur)
                                                        <!-- Modal de modification pour le chauffeur {{ $chauffeur->id }} -->
                                                        <div class="modal fade"
                                                            id="modifierChauffeur{{ $chauffeur->id }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="modifierChauffeurLabel{{ $chauffeur->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modifierChauffeurLabel{{ $chauffeur->id }}">
                                                                            Modifier Chauffeur {{ $chauffeur->nom }}
                                                                            {{ $chauffeur->prenom }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Fermer">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('updateChauffeur', $chauffeur->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-body">
                                                                            <!-- Champs du formulaire de modification -->
                                                                            <div class="form-group">
                                                                                <label for="nom">Nom</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="nom" name="nom"
                                                                                    value="{{ $chauffeur->nom }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="prenom">Prénom</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="prenom" name="prenom"
                                                                                    value="{{ $chauffeur->prenom }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="experience">Expérience</label>
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    id="experience" name="experience"
                                                                                    value="{{ $chauffeur->experience }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="numero_permit">Numéro de
                                                                                    permis</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="numero_permit"
                                                                                    name="numero_permit"
                                                                                    value="{{ $chauffeur->numero_permit }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="date_emission">Date
                                                                                    d'émission du permis</label>
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="date_emission"
                                                                                    name="date_emission"
                                                                                    value="{{ $chauffeur->date_emission }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="date_expiration">Date
                                                                                    d'expiration du permis</label>
                                                                                <input type="date"
                                                                                    class="form-control"
                                                                                    id="date_expiration"
                                                                                    name="date_expiration"
                                                                                    value="{{ $chauffeur->date_expiration }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="Deplacement">Déplacement</label>
                                                                                <select class="form-control"
                                                                                    id="Deplacement"
                                                                                    name="Deplacement" required>
                                                                                    <option value="1"
                                                                                        {{ $chauffeur->Deplacement ? 'selected' : '' }}>
                                                                                        Oui</option>
                                                                                    <option value="0"
                                                                                        {{ !$chauffeur->Deplacement ? 'selected' : '' }}>
                                                                                        Non</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Fermer</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Enregistrer les
                                                                                modifications</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <form action="{{ route('deleteChauffeur', $chauffeur->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur?')">Supprimer</button>
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

    </div>
    @include('layouts.js');
</body>

</html>
