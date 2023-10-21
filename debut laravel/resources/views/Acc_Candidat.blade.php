<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/css/accordion-faq-list.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/css/Faq-by-pomdre-1.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/css/Faq-by-pomdre.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/Acc_candidat/css/styles.css');?>">
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
        <div class="row">
            <div class="col">
            <h1 style="text-align: center;font-size: 25px;">Annonce {{ $idannonce }}</h1>
            @if(!isset($delai_ecoule))
                <form action="{{url('/test_cand')}}" method="post" style="text-align: center;border-radius: 5px;border-style: none;">
                {{ csrf_field() }}
                    <h1 style="text-align: center;"><a href="{{url('/retour')}}/{{$idannonce}}"><i class="far fa-arrow-alt-circle-left" style="color: rgb(0,0,0);"></i></a></h1>
                    <p style="text-align: center;">Bienvenue n°{{ $idcandidat }}<br>Vous allez passer un test et vous <br>devrez répondre aux questions suivantes.<br>
                        Vous avez jusqu'à {{ $delai }} pour le faire.</p>
                    @IF(isset($Reponse))
                        <div class="alert alert-success" role="alert" style="background: rgba(209,231,221,0);border-style: none;color: var(--bs-teal);"><span><i class="fas fa-exclamation"></i><strong>&nbsp;</strong>{{$Reponse}}</span></div>
                    @ENDIF
                    <section id="faq" style="padding: 2px;margin: 11px;">
                        <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                        <input type="hidden" name="idannonce" value="{{ $idannonce }}">
                        <div class="container" style="width: 405px;">
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 1&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Qu'est au'un ordinateur?</p><textarea name="quest_1" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 2&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quelles sont les deux parties qui composent un ordinateur?</p><textarea name="quest_2" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 3&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Citez un language de programmation que vous connaissez</p><textarea name="quest_3" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 4&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Citer une application de design que vous connaissez</p><textarea name="quest_4" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 5&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Citez tous les langages de programmation que vous maitrisez</p><textarea name="quest_5" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 6&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quelle tache preferez-vous effectuer lorsque vous executez un nouveau projet?</p><textarea name="quest_6" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 7&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Depuis quand avez-vous commence a coder?</p><textarea name="quest_7"class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 8&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Citez quelques base de donnees que vous connaissez ?</p><textarea name="quest_8" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 9&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Qu'est ce qu'une base de donnees?</p><textarea name="quest_9" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 10&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Trouvez-vous Java difficile comme langage?</p><textarea name="quest_10" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 11&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quel langage est le plus en vogue lorsqu'il est question de web dynamique et de design?</p><textarea name="quest_11" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 12&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Qu'est ce que la RAM?</p><textarea name="quest_12" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 13&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Qu'est ce que la ROM?</p><textarea name="quest_13" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 14&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Donnez une application qui permet de concevoir des applications mobiles</p><textarea name="quest_14" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 15&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quel composant de java permet d'executer des taches</p><textarea name="quest_15" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 16&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">HTML est-il un langage de programmation?</p><textarea name="quest_16" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 17&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quel composant d'un ordinateur permet de garder une qualite graphique net?</p><textarea name="quest_17" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 18&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Citez plusieurs d'IDE que vous connaissez?</p><textarea name="quest_18" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 19&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Donnez la requete qui permet  de selectionner toutes les lignes d'une table</p><textarea name="quest_19" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                            <div class="faqelement"><button class="btn btn-primary faq on" type="button" style="box-shadow: none;">Question 20&nbsp;</button>
                                <div class="panel">
                                    <p style="text-align: left;margin-top: 5px;">Quelle methode de php permet de recuperer les resultats d'un formulaire(sans apercu)?</p><textarea name="quest_20" class="form-control" style="margin-top: -5px;"></textarea>
                                </div>
                            </div><br >
                        </div>
                    </section><button class="btn btn-primary" type="submit" style="border-style: none;background: var(--bs-gray);">Enregistrer</button>
                </form>
                @ELSE
                    <p style="text-align: center;">Votre délai est écoulé. Vous ne pouvez plus repondre au questionnaire.</p>
                @ENDIF
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
    <script src="<?php echo asset('assets/Acc_candidat/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/Acc_candidat/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?php echo asset('assets/Acc_candidat/js/Faq-by-pomdre.js');?>"></script>
</body>

</html>
