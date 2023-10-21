
<html>
    <head>
      <title>Accueil-Administrateur </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <link rel="stylesheet" href="<?php echo asset('assets/Acc/bootstrap/css/bootstrap.min.css');?>">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Francois+One&amp;display=swap">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;display=swap">
      <link rel="stylesheet" href="<?php echo asset('assets/Acc/fonts/fontawesome-all.min.css');?>">
      <link rel="stylesheet" href="<?php echo asset('assets/Acc/css/Animated-Toggle-NavBar-BS5.css');?>">
      <link rel="stylesheet" href="<?php echo asset('assets/Acc/css/Black-Navbar.css');?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
      <link rel="stylesheet" href="<?php echo asset('assets/Acc/css/styles.css');?>">
    </head>
    <body>
    <nav class="navbar navbar-dark fixed-top bg-dark" data-aos="fade">
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
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 60px;text-align: center;">
    <a class="btn btn-primary" href="{{url('/conger')}}" style="border-radius: 5px;border-style: none;background: var(--bs-gray);margin-top: 10px;">Planning des congés</a>
    <a class="btn btn-primary" href="{{url('/voir_emp')}}" style="border-radius: 5px;border-style: none;background: var(--bs-gray);margin-top: 10px;">Fiche de Paie de tous les employes</a>
    <a class="btn btn-primary" href="{{url('/voir_etat_de_paie')}}" style="border-radius: 5px;border-style: none;background: var(--bs-gray);margin-top: 10px;">Etat de paie de la societe</a>
    <a href="{{ url('historique') }}">
     voir historique des employes
    </a>
    <a href="{{ url('/pointage') }}">pointage</a>
        <div class="row" style="margin-top: 10px;">
            <div class="col" style="width: 500px;">
                <form action="{{url('/publier')}}" method="post" style="text-align: center;width: 400px;border-radius: 5px;box-shadow: 2px 2px 6px var(--bs-gray);height: 500px;margin-top: 15px;border-width: 1px;border-style: none;">
                {{ csrf_field() }}
                    <h1 style="text-align: center;font-size: 25px;width: 400px;font-family: 'Francois One', sans-serif;">Publier une annonce</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col"><label class="col-form-label">Date limite des inscriptions<br><input class="form-control" type="datetime-local" name="fin" style="width: 240px;margin-top: 5px;text-align: center;"></label></div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="col-form-label" style="width: 240px;"><br><textarea name="pub" class="form-control" style="height: 259px;margin-top: -10px;"></textarea></label></div>
                        </div>
                        <div class="row">
                            <div class="col"><button class="btn btn-primary" type="submit" style="margin-top: 21px;background: var(--bs-gray);border-style: none;border-radius: 5px;">Publier</button>
                                <p><br><br><br><br><br></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
            @if(count($liste)!=0)
                <h1 style="font-size: 25px;text-align: center;font-family: 'Francois One', sans-serif;margin-top: 15px;">Liste des dernières annonces</h1>
                <div class="table-responsive" style="margin-top: 10px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Publication</th>
                                <th>Début de l'annonce</th>
                                <th>Date limite de l'annonce</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($liste as $row)
                            <tr>
                              <td>{{ $row->pub }}</td>
                              <td>{{ $row->datedebut }}</td>
                              <td>{{ $row->datefin }}</td>
                              <td><a class="btn btn-primary" href="{{url('/voir_dossier')}}/{{ $row->idannonce }}" style="background: var(--bs-gray);border-style: none;border-radius: 5px;"><i class="fas fa-clipboard-list"></i></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
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
    <script src="<?php echo asset('assets/Acc/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/Acc/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    </body>
</html>



