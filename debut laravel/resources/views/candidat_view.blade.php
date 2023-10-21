<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>candidat_view</title>
    <link rel="stylesheet" href="<?php echo asset('assets/candidat_view/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/candidat_view/css/styles.css');?>">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark" data-aos="fade" style="background: var(--bs-gray);">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Roboto, sans-serif;font-weight: bold;">ITU</a><button data-bs-toggle="collapse" class="navbar-toggler collapsed" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-center" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{url('/retour_annonce')}}">Annonce</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/liste_embauche')}}/{{ $ida }}">Liste des embauches</a></li>

                </ul>
            </div>
        </div>
    </nav>
    @if($if_posted == 1)
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    @foreach($descri_annonce as $descri_annonce)
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="font-size: 25px;">{{ $descri_annonce->pub }}</h4>
                        </div>
                    <div class="text-center" style="margin-top: -25px;"><small>{{ $descri_annonce->datedebut }} - {{ $descri_annonce->datefin }}</small></div>
                    @endforeach
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: 12px;">Liste candidat</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listeCandidatGeneral as $rows)
                                <tr>
                                    <td>{{ $rows->idcandidat}}</td>
                                    <td>{{ $rows->nom }}</td>
                                    <td>{{ $rows->prenom }}</td>
                                        <td style="text-align: center;">
                                        <a class="small btn btn-primary" href="{{ url('/postuler') }}/{{ $rows->idcandidat }}/{{ $idannonce }}" style="background: var(--bs-gray);border-style: none;">Postuler sur cette annonce</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: 12px;">Inscrire un candidat</h4>
                    </div>
                    <form action="{{url('/ajoutc')}}" method="post" class="user">
                        {{ csrf_field() }}
                        <p><input type="hidden" name="idannonce" value="{{ $ida }}"></p>
                        <p><input type="hidden" name="email"></p>
                        <p><input type="hidden" name="mdp"></p>

                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Nom<small style="color: var(--bs-red);">*</small><input class="form-control" name="nom" placeholder="nom" required type="text" style="width: 220px;"></label></div>
                            <div class="col-sm-6" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Prénom<small style="color: var(--bs-red);">*</small><input class="form-control" type="text" name="prenom" placeholder="prenom" required style="width: 220px;"></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Age<small style="color: var(--bs-red);">*</small><input class="form-control" type="number" name="age" id="age" min="1" style="width: 220px;"></label></div>
                            <div class="col-sm-6" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Adresse<small style="color: var(--bs-red);">*</small><input class="form-control" type="text" name="adresse" placeholder="adresse" required style="width: 220px;"></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Date de naissance<small style="color: var(--bs-red);">*</small><input class="form-control" type="date" style="width: 220px;"></label></div>
                            <div class="col-sm-6" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Sexe<span style="color: var(--bs-red);">*</span><br><input type="radio" name="sexe" value="H" checked style="margin-top: 12px;">&nbsp;Homme&nbsp;<input type="radio"  name="sexe" value="F">&nbsp;Femme&nbsp;<input type="radio" name="sexe" value="A">&nbsp;Autre&nbsp;<br></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Nom du père<input class="form-control" type="text" name="pere" id="pere" placeholder="Nom du père" style="width: 220px;"></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Profession<input class="form-control" type="text" name="profpere" id="profpere" placeholder="profession du pere" style="width: 220px;"></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Nom de la mère<input class="form-control" type="text" name="mere" id="mere" placeholder="Nom de la mère" style="width: 220px;"></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Profession<input class="form-control" type="text" name="profmere" id="profmere" placeholder="profession de la mère" style="width: 220px;"></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Situation juridique<small style="color: var(--bs-red);">*</small><select class="form-select" name="juridique" id="juridique" style="width: 220px;">
                                        <option value="1">Sans Casier judiciaire</option>
                                        <option value="2">avec Casier judiciaire</option>
                                    </select></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Affiliation<small style="color: var(--bs-red);">*</small><input class="form-control" type="text" name="affiliation" id="affiliation" placeholder="Votre affilation" required style="width: 220px;"></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Enfant(s) à charge<small style="color: var(--bs-red);">*</small><input class="form-control" type="number" name="enfant" id="enfant" style="width: 220px;"></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Situation matrimoniale<small style="color: var(--bs-red);">*</small><select class="form-select" name="matrimoniale" id="matrimoniale" style="width: 220px;">
                                        <option value="1">Celibataire</option>
                                        <option value="2">Fiance(e)</option>
                                        <option value="3">Marie(e)</option>
                                    </select></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Diplôme<small style="color: var(--bs-red);">*</small><select class="form-select" name="diplome" style="width: 220px;">
                                        <option value="1">Aucun</option>
                                        <option value="2">BTS</option>
                                        <option value="3">Licence</option>
                                        <option value="5">Master</option>
                                        <option value="7">Doctorat</option>
                                    </select></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Année d'expérience<small style="color: var(--bs-red);">*</small><input class="form-control" type="number" name="experience" min="0" placeholder="Expérience"></label></div>
                        </div>
                        <button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Ajouter</button>
                        <hr>
                        @if(isset($valider))
                            <div class="alert alert-success flash animated" role="alert" style="background: rgba(209,231,221,0);border-style: none;text-align: center;"><span style="color: var(--bs-success);"><strong></strong>{{ $valider }}</span></div>
                        @endif
                    </form>
                    <div class="text-center"><a class="small btn btn-primary" href="{{url('/liste_cand')}}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;font-weight: bold;">Candidats à noter</a></div>
                    @if(count($liste_candidat)!=0)
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: 12px;">Liste des candidats qualifiés pour le test</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>note general de la candidature</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_candidat as $rows)
                                <tr>
                                    <td>{{ $rows->nom }}</td>
                                    <td>{{ $rows->prenom }}</td>
                                    <td>{{ $rows->note }}</td>
                                    @if($rows->email_envoye==0)
                                        <td style="text-align: center;"><a class="small btn btn-primary" href="{{url('/eval_test')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="fab fa-telegram-plane"></i>&nbsp;Envoyer mail</a></td>
                                    @else
                                        <td style="text-align: center;"><a class="small btn btn-primary" href="{{url('/log_candidat')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;margin-right: 10px;margin-left: 10px;"><i class="fas fa-clipboard-list"></i>&nbsp;Test</a>
                                        <a class="small btn btn-primary" href="{{url('/corriger_test')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="far fa-check-circle"></i>&nbsp;Corriger</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @ENDIF
                    @if(count($heure_passage)!=0)
                        <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;margin-top: 10px;">Heure de passage</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date du test</th>
                                        <th>Jour du test</th>
                                        <th>Heure de passage</th>
                                        <th>Durée du test</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($heure_passage as $rows)
                                    <tr>
                                        <td>{{ $rows->nom }}</td>
                                        <td>{{ $rows->prenom }}</td>
                                        <td>{{ $rows->date_test }} </td>
                                        <td>{{ $rows->jour_test }} </td>
                                        <td>{{ $rows->heure_test }}</td>
                                        <td>{{ $rows->minute_test }} min</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @ENDIF
                    @if(count($liste_entretien)!=0)
                    <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;margin-top: 10px;">Liste des candidats pour l'entretien</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Note</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_entretien as $rows)
                                <tr>
                                    <td>{{ $rows->nom }}</td>
                                    <td>{{ $rows->prenom }}</td>
                                    <td>{{ $rows->note }}</td>
                                    <td style="text-align: center;"><a class="small btn btn-primary" href="{{url('/eval_entretien')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="fas fa-user-tie"></i>&nbsp;Entretien</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @ENDIF

                    @if(count($liste_entretien)!=0)
                    <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;margin-top: 10px;">Liste des candidats embauchés</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Note</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_embauche as $rows)
                                <tr>
                                    <td>{{ $rows->nom }}</td>
                                    <td>{{ $rows->prenom }}</td>
                                    <td>{{ $rows->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @ENDIF
                    @if(count($moyenne)!=0)
                    <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;margin-top: 10px;">Statistiques</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Age</th>
                                    <th>Note</th>
                                    <th>Expérience</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($moyenne as $rows)
                                <tr>
                                    <td>{{ $rows->age }}</td>
                                    <td>{{ $rows->note }}</td>
                                    <td>{{ $rows->experience }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @ENDIF
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 25px;">Cette annonce n'est plus disponible</h4>
                    </div>
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;">Liste des candidats pour faire le test</h4>
                    </div>
                    <div class="text-center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Numéro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($liste_candidat as $rows)
                                    <tr>
                                        <td>{{ $rows->idcandidat }}</td>
                                        <td style="text-align: center;"><a class="small btn btn-primary" href="{{url('/eval_test')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="fas fa-clipboard-list"></i>&nbsp;Evaluation Test</a>
                                        <a class="small btn btn-primary" href="{{url('/log_candidat')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;margin-right: 10px;margin-left: 10px;"><i class="fas fa-paper-plane"></i>&nbsp;Envoyer mail</a>
                                        <a class="small btn btn-primary" href="{{url('/eval_entretien')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="fas fa-user-tie"></i>&nbsp;Entretien</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;"><a class="small btn btn-primary" href="{{url('/eval_embauche')}}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;margin-right: 10px;margin-left: 10px;"><i class="far fa-user"></i>&nbsp;Voir le candidat embauché</a></h4>
                    <h4 class="text-dark mb-4" style="font-size: 20px;text-align: center;margin-top: 10px;">Liste des candidats pour l'entretien</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Note</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_entretien as $rows)
                                <tr>
                                    <td>{{ $rows-> nom }}</td>
                                    <td>{{ $rows->note }}</td>
                                    <td style="text-align: center;"><a class="small btn btn-primary" href="{{url('/eval_entretien')}}/{{ $rows->idcandidat }}/{{ $ida }}" style="background: var(--bs-gray);border-style: none;"><i class="fas fa-user-tie"></i>&nbsp;Entretien</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <footer class="text-center" data-aos="fade" style="margin-top: 20px;">
        <div class="container text-muted py-4 py-lg-5" style="height: 140px;">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                    </svg></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg></li>
            </ul>
            <p class="mb-0">Copyright © 2022</p>
        </div>
    </footer>
    <script src="<?php echo asset('assets/candidat_view/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/candidat_view/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>
