<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Conger</title>
    <link rel="stylesheet" href="<?php echo asset('assets/Conger/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/Conger/css/styles.css');?>">
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
    <div class="container" data-aos="fade-up" data-aos-duration="600" style="margin-top: 70px;">
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;width: 650px;">
                <div class="p-5" style="text-align: center;">
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;"><a class="btn btn-primary" href="{{ url('/ornigramme') }}" style="border-style: none;background: var(--bs-gray);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-diagram-3-fill">
                                    <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1z"></path>
                                </svg></a></h4>
                    </div>
                    <div class="text-center">
                        <h4 class="text-dark mb-4" style="font-size: 20px;">Planning Congée</h4>
                    </div>
                    <form action="{{ url('/trait_conger') }}" method="post" class="user"><label class="form-label"><textarea name="libelle" class="form-control" style="width: 300px;"></textarea></label>
                     {{ csrf_field() }}
                     <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;"><select name="employe" class="form-select" style="width: 220px;">
                              <option value="">employe</option>
                              @foreach($liste_employe as $employe)
                                 <option value="{{ $employe->idemploye }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                              @endforeach
                              </select></label></div>
                            <div class="col-sm-6" style="text-align: center;"><label class="col-form-label" style="text-align: left;"><select name="conger" onclick="funct()" class="form-select" style="width: 220px;">
                                 <option value="">conger</option>
                                 @foreach($liste_conger as $conger)
                                           <option value="{{ $conger->idtype_conger }}">{{ $conger->nom_conger }}</option>
                                 @endforeach
                                 </select></label></div>
                        </div>
                        <div class="row mb-3" style="margin-top: -12px;">
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Du<input class="form-control" type="date" name="date_deb" style="width: 220px;"></label></div>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="text-align: center;"><label class="col-form-label" style="text-align: left;">Au<input class="form-control" type="date" name="date_fin" style="width: 220px;"></label></div>
                        </div><label class="form-label"><select name="desicionnaire" class="form-select" style="width: 220px;">
                              <option value="admin">admin</option>
                              <option value="employe">employe</option>
                           </select></label>
                        <div class="row mb-3">
                            <p id="emailErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                            <p id="passwordErrorMsg-1" class="text-danger" style="display:none;">Paragraph</p>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn-1" type="submit" style="background: var(--bs-gray);font-weight: bold;border-style: none;font-size: 20px;">Ajouter</button>
                        <hr>
                    </form>
                    <div class="text-center">
                     <div class="alert alert-success flash animated" role="alert" style="background: rgba(209,231,221,0);color: var(--bs-gray);border-style: none;border-color: var(--bs-gray);"><span><strong></strong>
                     @if(isset($moitier))
                     {{ $moitier }}
                     @endif
                     @if(isset($inserer))
                     {{ $inserer }}
                     @endif
                     @if(isset($lany_conger))
                     {{ $lany_conger }}
                     @endif
                     @if(isset($depart))
                     {{ $depart }}
                     @endif
                     </span></div>
                     </div>
                </div>
            </div>
        </div>
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center" style="margin-top: 40px;">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;width: 800px;">
                <div class="p-5" style="text-align: center;">
                    <p><label class="form-label"><input type="text" id="rech" class="rech" onkeyup="filtrer()" style="width: 160.8px;" placeholder="Employe"></label><label class="form-label"><input type="text" class="rech1" id="rech1" onkeyup="rechDept()" style="margin-right: 10px;margin-left: 10px;width: 160.8px;" placeholder="Departement"></label><label class="form-label"><input type="text" class="rech2" id="rech2" onkeyup="rechDec()" style="width: 160.8px;" placeholder="Decisionnaire"></label></p>
                    <div class="table-responsive">
                        <table class="table result" id="result">
                            <thead>
                                <tr>
                                    <th>Employé</th>
                                    <th>Département</th>
                                    <th>Nombre de congée</th>
                                    <th>Type de congé</th>
                                    <th>Durée</th>
                                    <th>Année</th>
                                    <th>Décisionnaire</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($planning_conger as $liste)
                              <tr>
                                <td>{{ $liste->nom }} {{ $liste->prenom }}</td>
                                <td>{{ $liste->iddepartement }}</td>
                                <td>{{ $liste->jour_conger }}</td>
                                <td>{{ $liste->idtype_conger }}</td>
                                <td>Du {{ $liste->date_deb }} au {{ $liste->date_fin }}</td>
                                <td>{{ $annee }}</td>
                                <td>{{ $liste->desicionnaire }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center" style="margin-top: 40px;">
            <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-white shadow-lg" style="border-radius: 5px;width: 800px;">
                <div class="p-5" style="text-align: center;">
                    <h1 style="font-size: 20px;">Congé de chaque employé dans chaque département</h1>
                    <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>Département</th>
                                    <th>Employé(s) en congé</th>
                                    <th>Total employé dans le département</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($liste_emp_dep_cong as $liste)
                              <tr>
                                <td>{{ $liste->iddepartement}}</td>
                                <td>{{ $liste->nbre }}</td>
                                <td>{{ $liste->total }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center" data-aos="fade" style="margin-top: 30px;">
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
    <script src="<?php echo asset('assets/Conger/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('assets/Conger/js/bs-init.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
function filtrer()
         {
            var filtre,tableau,ligne,cellule,i,texte;
            filtre=document.getElementById("rech").value.toUpperCase();
            tableau=document.getElementById("result");
            ligne=tableau.getElementsByTagName("tr");
            for(i=0;i<ligne.length;i++)
            {
               cellule=ligne[i].getElementsByTagName("td")[0];
               if(cellule)
               {
                  texte=cellule.innerText;
                  if(texte.toUpperCase().indexOf(filtre)>-1)
                  {
                     ligne[i].style.display="";
                  }
                  else
                  {
                     ligne[i].style.display="none";
                  }
               }
            }
        }

function rechDept()
{
    var filtre,tableau,ligne,cellule,i,texte;
            filtre=document.getElementById("rech1").value.toUpperCase();
            tableau=document.getElementById("result");
            ligne=tableau.getElementsByTagName("tr");
            for(i=0;i<ligne.length;i++)
            {
               cellule=ligne[i].getElementsByTagName("td")[1];
               if(cellule)
               {
                  texte=cellule.innerText;
                  if(texte.toUpperCase().indexOf(filtre)>-1)
                  {
                     ligne[i].style.display="";
                  }
                  else
                  {
                     ligne[i].style.display="none";
                  }
               }
            }
}

function rechDec()
{
    var filtre,tableau,ligne,cellule,i,texte;
            filtre=document.getElementById("rech2").value.toUpperCase();
            tableau=document.getElementById("result");
            ligne=tableau.getElementsByTagName("tr");
            for(i=0;i<ligne.length;i++)
            {
               cellule=ligne[i].getElementsByTagName("td")[6];
               if(cellule)
               {
                  texte=cellule.innerText;
                  if(texte.toUpperCase().indexOf(filtre)>-1)
                  {
                     ligne[i].style.display="";
                  }
                  else
                  {
                     ligne[i].style.display="none";
                  }
               }
            }
}
</script>
</body>

</html>
