<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="<?php echo asset('assets/ajout_note/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/ajout_note/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/ajout_note/css/styles.css');?>">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark" data-aos="fade" style="background: var(--bs-gray);">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Roboto, sans-serif;font-weight: bold;">ITU</a><button data-bs-toggle="collapse" class="navbar-toggler collapsed" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-center" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">First Item</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Second Item</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Third Item</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 120px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: 12px;"><a class="btn btn-primary" href="{{url('/retour')}}/{{$idannonce}}" style="background: rgba(108,117,125,0);border-style: none;font-size: 25px;"><i class="far fa-arrow-alt-circle-left" style="color: #000000;"></i></a></h4>
                        <h4 class="text-dark mb-4" style="font-size: 20px;margin-top: 12px;">Saisie des notes du candidat n°{{ $idcandidat }} sur l'{{ $idannonce }}</h4>
                    </div>
                    <form action="{{url('/saisie_note')}}" method="post" class="user">
                    {{ csrf_field() }}
                        @foreach($descri_candidat as $descri_candidat)
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Expérience</p><label class="form-label" style="text-align: left;"><input class="form-control" type="text" name="experience" value="{{$descri_candidat -> experience}}" readonly style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input class="form-control" type="number" name="note_exp" step="0.25" min="0" id="note_exp" value="0" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input class="form-control" type="number" name="coeff_exp" min="1"  value="1" id="coeff_exp" onchange="changernote()" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Diplôme</p><label class="form-label" style="text-align: left;"><input class="form-control" name="diplome" value="{{$descri_candidat -> diplome}}" readonly type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input class="form-control" type="number" name="note_dip" step="0.25" min="0" id="note_dip" value="0" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input class="form-control" name="coeff_dip" min="1" value="1" id="coeff_dip" onchange="changer_dip()" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Age</p><label class="form-label" style="text-align: left;"><input class="form-control" name="age" value="{{$descri_candidat -> age }}" readonly type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_age"step="0.25"  min="0"id="note_age"value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_age" min="1" value="1" id="coeff_age"  onchange="changer_age()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Date de naissance</p><label class="form-label" style="text-align: left;"><input class="form-control" name="dtn" value="{{$descri_candidat -> datenaissance }}" readonly type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input class="form-control" type="number" name="note_dtn"min="0" max= step="0.25" id="note_dtn"value="0" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_dtn" min="1"  value="1" id="coeff_dtn"  onchange="changer_dtn()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Genre</p><label class="form-label" style="text-align: left;"><input name="note_genre"  value="{{$descri_candidat -> sex }}"readonly class="form-control" type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_genre"min="0" step="0.25" id="note_genre"value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_genre" min="1" value="1"   id="coeff_genre"  onchange="changer_genre()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Situation juridique</p><label class="form-label" style="text-align: left;"><input  name="juridique" min="0" max="1" value="{{$descri_candidat -> st_juridique }}"readonly class="form-control" type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_j"min="0" step="0.25" id="note_j"value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_j" min="1" value="1"  id="coeff_j"  onchange="changer_j()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Localisation</p><label class="form-label" style="text-align: left;"><input name="localisation" value="{{$descri_candidat -> adresse  }}"readonly class="form-control" type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_loc" step="0.25" min="0" id="note_loc" value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_loc" min="1" value="1"  id="coeff_loc"  onchange="changer_loc()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Enfant(s) à charge</p><label class="form-label" style="text-align: left;"><input name="enfant" min="0" value="{{$descri_candidat -> enfant_a_charge }}"readonly class="form-control" type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_enfant"min="0" step="0.25" id="note_enfant"value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_enfant" min="1"  value="1" id="coeff_enfant" onchange="changer_enf()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col" style="text-align: center;">
                                    <p style="text-align: center;">Situation matrimoniale</p><label class="form-label" style="text-align: left;"><input name="sm" min="1" max="3" value="{{$descri_candidat -> st_matrimoniale }}"readonly class="form-control" type="text" style="width: 150px;"></label><label class="form-label" style="text-align: left;margin-right: 10px;margin-left: 10px;">Note<br><input name="note_sm"min="0" step="0.25" id="note_sm" value="0" class="form-control" type="number" style="width: 150px;"></label><label class="form-label" style="text-align: left;">Coefficient<input name="coeff_sm" min="1"  value="1" id="coeff_sm" onchange="changer_sm()" class="form-control" type="number" style="width: 150px;"></label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Enregistrer les notes</button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="<?php echo asset('assets/ajout_note/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/ajout_note/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    function changernote(){
        document.getElementById('note_exp').value *= document.getElementById('coeff_exp').value;
    }
    function changer_dip(){
        document.getElementById('note_dip').value *= document.getElementById('coeff_dip').value;
    }
    function changer_age(){
        document.getElementById('note_age').value *= document.getElementById('coeff_age').value;
    }
    function changer_dtn(){
        document.getElementById('note_dtn').value *= document.getElementById('coeff_dtn').value;
    }
    function changer_genre(){
        document.getElementById('note_genre').value *= document.getElementById('coeff_genre').value;
    }
    function changer_j(){
        document.getElementById('note_j').value *= document.getElementById('coeff_j').value;
    }
    function changer_loc(){
        document.getElementById('note_loc').value *= document.getElementById('coeff_loc').value;
    }
    function changer_enf(){
        document.getElementById('note_enfant').value *= document.getElementById('coeff_enfant').value;
    }
    function changer_sm(){
        document.getElementById('note_sm').value *= document.getElementById('coeff_sm').value;
    }
</script>
</body>

</html>
