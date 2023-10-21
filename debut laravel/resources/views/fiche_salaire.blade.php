<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche salaire de Employe {{ $idemploye}} et societe {{ session('idsociete') }}</title>
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/css/styles.css');?>">
</head>
<body>
    <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          @foreach($societe as $detail)
            <p>Nom  societe  : {{ $noms }}</p>
            <p>Cnaps societe : {{ $cnapss }}</p>
            <p>Adresse       : {{ $adresses }}</p>
            <p>telephone     : {{ $telephones }}</p>
          </div>
          <div class="col-md-6">
            <p>NIF : {{ $numif }} </p>
            <p>RC  : {{ $numrc }}</p>
            <p>STAT: {{ $numstat }}</p>
          </div>
          @endforeach
    <br/>

    {{ csrf_field() }}
    @foreach($detail_employe as $detail)
        <div class="row">
            <div class="col-md-3">
                <p>Nom et prenoms</p>
                <p>Matricule : {{ $idemploye}}</p>
                <p>Fonction</p>
                <p>Numero CNAPS</p>
                <p>Date embauche</p>
                <p>Ancienneté</p>
            </div>
            <div class="col-md-4">
                <p>{{ $nomemp  }} {{ $prenom }}</p>
                <p>{{ $idemploye }}</p>
                <p>{{ $poste }}</p>
                <p>{{ $numerocnaps }}</p>
                <p>{{ $debut_service }}</p>
                <p>{{ $anciennete }} jours</p>
            </div>
            <div class="col-md-2">
                <p>Classification</p>
                <p>Salaire de base</p>
                <p>Taux Journalier</p>
                <p>Taux horaire</p>
                <p>Indice</p>
            </div>
            <div class="col-md-3">
                <p>{{ $poste }}</p>
                <p>{{ $salairebase }}</p>
                <p>{{ $taux_journalier }}</p>

                <p>{{  $taux_horaire  }}</p>


                <p>{{ $indice }}</p>
            </div>
        </div>

        @endforeach
        <div class="row ">
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">designation</th>
                    <th scope="col">nombre</th>
                    <th scope="col">taux</th>
                    <th scope="col">montant</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Salaire du (Date)</th>
                    <td>{{ $datepaie }} au  {{ $datefin }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Abscence deductible</th>
                    <td>{{ $nbre_heure_absence }}</td>
                    <td></td>
                    <td>{{ $cout_absence }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Primes de rendement</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Heure supplementaire majorée de 30%</th>
                    <td>{{ $nbre_heure_30 }}</td>
                    <td></td>
                    <td>{{ $heure_sup_30_final }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Heure supplementaire majorée de 40%</th>
                    <td></td>
                    <td></td>
                    <td>{{ $heure_sup_40_final }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Heure supplementaire majorée de 50%</th>
                    <td>{{ $nbre_heure_50 }}</td>
                    <td></td>
                    <td>{{ $heure_sup_50_final }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Heure supplementaire majorée de 100%</th>
                    <td></td>
                    <td></td>
                    <td>{{ $heure_sup_100_final }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Majoration par horaire de nuit</th>
                    <td>{{ $nbre_heure_nuit }}</td>
                    <td></td>
                    <td>{{ $heure_supp_nuit_final }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Primes diverses</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Rappel sur periode anterieure</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Droits de congés</th>
                    <td></td>
                    <td></td>
                    <td>{{ $droit_conger }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Droit de préavis</th>
                    <td></td>
                    <td></td>
                    <td>{{ $droit_preavis }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Indemnités de licenciement</th>
                    <td></td>
                    <td></td>
                    <td>{{ $licencement }}</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <th scope="row">Salaire brut: </th>
                    <td>{{ $total_salairebrute }}</td>
                  </tr>
                </tbody>
              </table>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Retenues</th>
              <td ></td>
              <td ></td>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="col">Retenue CNAPS</th>
                <td ></td>
                <td >{{ $retenue_cnaps }}</td>

              </tr>

              <tr>
                <th scope="row">Retenue Sanitaire</th>
                <td></td>
                <td>{{ $retenue_sanitaire }}</td>
              </tr>

              <tr>
                {{ csrf_field() }}
                @foreach($irsaemp as $irsa)

            <th scope="row">TRANCHE IRSA INF 350.000</th>
            <td></td>
            <td></td>
              </tr>

              <tr>
                <th scope="row">TRANCHE I de 350.000 -> 400.000</th>
                <td></td>
                <td>{{ $irsa1 }}</td>
              </tr>

              <tr>
                <th scope="row">TRANCHE I de 400.001 -> 500.000</th>
                <td></td>
                <td>{{ $irsa2 }}</td>
              </tr>

              <tr>
                <th scope="row">TRANCHE I de 500.001 -> 600.000</th>
                <td></td>
                <td>{{ $irsa3 }}</td>
              </tr>

              <tr>
                <th scope="row">TRANCHE SUP 600.000</th>
                <td></td>
                <td>{{ $irsa4}}</td>
              </tr>

              <tr>
                <th scope="row"> </th>
                <td>TOTAL IRSA :</td>
                <td>{{ $total_retenue }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="row">
            <div class="col-offset-3 col-md-2">Total des retenues : </div>
            <div class="col-md-2">{{ $irsa_total }}</div>
          </div>
          <div class="row">
            <div class="col-offset-3 col-md-2">Autres indemnités</div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            <div class="col-offset-3 col-md-2">Net a payer</div>
            <div class="col-md-2">{{ $net_a_payer }}</div>
          </div>
          <div class="row">
            <div class="">Avantage en nature</div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            {{-- Salaire brut- irsa --}}
            <div class="">Deduction IRSA </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            {{-- Salaire brut - irsa - deductino cnaps -deduction sanitaire --}}
            <div class="col-md-2">Montant Imposable</div>
            <div class="col-md-2">{{ $montant_imposable }}</div>
          </div>
          <div class="row">
            <div class="col-offset-2">Mode de payement : Virement/Cheque</div>
          </div>
          <div class="row">
            <div class="col-offset-2 col-md-3">Signature de l'employeur</div>
            <div class="col-offset-2 col-md-3">Signature de l'employé</div>
          </div>

        </div>

        @if($existe_salaire == 0)
        <form action="{{ url('/exporter') }}" method="get">

        <input type="hidden" name="idemploye" value="{{ $idemploye }}">
        <input type="hidden" name="nomemp" value="{{ $nomemp }}">
        <input type="hidden" name="prenom" value="{{ $prenom }}">
        <input type="hidden" name="debut_service" value="{{ $debut_service }}">
        <input type="hidden" name="poste" value="{{ $poste }}">
        <input type="hidden" name="numerocnaps" value="{{ $numerocnaps }}">
        <input type="hidden" name="salairebase" value="{{ $salairebase }}">
        <input type="hidden" name="taux_journalier" value="{{ $taux_journalier }}">
        <input type="hidden" name="taux_horaire" value="{{ $taux_horaire }}">
        <input type="hidden" name="datepaie" value="{{ $datepaie }}">
        <input type="hidden" name="nbre_heure_absence" value="{{ $nbre_heure_absence }}">
        <input type="hidden" name="heure_sup_30_final" value="{{ $heure_sup_30_final }}">
        <input type="hidden" name="heure_sup_40_final" value="{{ $heure_sup_40_final }}">
        <input type="hidden" name="heure_sup_50_final" value="{{ $heure_sup_50_final }}">
        <input type="hidden" name="heure_sup_100_final" value="{{ $heure_sup_100_final }}">
        <input type="hidden" name="heure_supp_nuit_final" value="{{ $heure_supp_nuit_final }}">
        <input type="hidden" name="prime" value="{{ $prime }}">
        <input type="hidden" name="periode_ant" value="{{ $periode_ant }}">
        <input type="hidden" name="droit_conger" value="{{ $droit_conger }}">
        <input type="hidden" name="droit_preavis" value="{{ $droit_preavis }}">
        <input type="hidden" name="licencement" value="{{ $licencement }}">
        <input type="hidden" name="total_salairebrute" value="{{ $total_salairebrute }}">
        <input type="hidden" name="retenue_cnaps" value="{{ $retenue_cnaps }}">
        <input type="hidden" name="retenue_sanitaire" value="{{ $retenue_sanitaire }}">
        <input type="hidden" name="irsa_inf_350" value="{{ $irsa_inf_350 }}">
        <input type="hidden" name="irsa1" value="{{ $irsa1 }}">
        <input type="hidden" name="irsa2" value="{{ $irsa2 }}">
        <input type="hidden" name="irsa3" value="{{ $irsa3 }}">
        <input type="hidden" name="irsa4" value="{{ $irsa4 }}">
        <input type="hidden" name="irsa_total" value="{{ $irsa_total }}">
        <input type="hidden" name="total_retenue" value="{{ $total_retenue }}">
        <input type="hidden" name="avance" value="{{ $avance }}">
        <input type="hidden" name="net_a_payer" value="{{ $net_a_payer }}">
        <input type="hidden" name="montant_imposable" value="{{ $montant_imposable }}">
        <input type="hidden" name="annee" value="{{ $annee }}">
        <input type="hidden" name="mois" value="{{ $mois }}">
        <button type="submit">Exporter dans la base de donnée</button>
        </form>
        @else
        <p>déja exporté</p>
        @endif

</body>
</html>


