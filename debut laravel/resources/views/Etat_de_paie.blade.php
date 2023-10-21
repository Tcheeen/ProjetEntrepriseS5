<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ETAT DE PAIE Octobre 2022</title>
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/fonts/fontawesome-all.min.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="<?php echo asset('assets/eval_test/css/styles.css');?>">
</head>
    <div class="row">

<form action="{{ url('/recherchePaie') }}" method="get">
<select name="mois">
<option value="">choisir mois</option>
<option value="1">janvier</option>
<option value="2">fevrier</option>
<option value="3">mars</option>
<option value="4">avril</option>
<option value="5">mai</option>
<option value="6">juin</option>
<option value="7">juillet</option>
<option value="8">aout</option>
<option value="9">septembre</option>
<option value="10">octobre</option>
<option value="11">novembre</option>
<option value="12">decembre</option>
</select>
<select name="annee">
<option value="">choisir annee</option>
@for ($i=2000;$i<=2022;$i++)
<option value="{{ $i }}">{{ $i }}</option>
@endfor
</select>
<button type="submit">rechercher</button>
</form>

    <table class="table">
        <thead>
          <tr>
            <th >Date</th>
            <th >NBR</th>
            <th >Matricule</th>
            <th >NO CNAPS</th>
            <th >Nom et prenoms</th>
            <th >Date embauche</th>
            <th >Abscence du mois</th>
            {{-- Categorie --}}
            <th >CAT</th>
            {{-- Poste dans l'entreprise --}}
            <th >Fonction</th>
            <th >Salaire de base</th>
            <th >Retenu sur</th>
            <th >Salaire de base du mois</th>
            <th >Indemnité</th>
            <th >Rappel</th>
            <th >Autres</th>
            <th >HR SUPP/Majorée</th>
            <th >Salaire brut</th>
            <th >Cnaps 1%</th>
            <th >OSTIE 5%</th>
            <th >Revenu imposable</th>
            <th >Impot du</th>
            <th >EFA?</th>
            <th >Montant</th>
            <th >IGR NET</th>
            <th >TOTAL Retenues</th>
            <th >Salaire NET</th>
            <th >Avance</th>
            <th >Net a payer</th>
            <th >Autres indemnités</th>
            <th >NET DU MOIS</th>
          </tr>
        </thead>
        <tbody>

            @foreach($liste as $rows)
            <tr>
            <td >{{ $rows->datepaie }}</td>
            <td >1</td>
            <td >{{ $rows->idemploye }}</td>
            <td >{{ $rows->num_cnaps }}</td>
            <td >{{ $rows->nom }} {{ $rows->prenom }}</td>
            <td >{{ $rows->date_embauche }}</td>
            <td >{{ $rows->absc_deductible }}</td>
            <td >OSE3</td>
            <td >{{ $rows->fonction }}</td>
            <td >{{ $rows->salaire_base }}</td>
            <td >{{ $rows->total_ret }}</td>
            <td >{{ $rows->salaire_base }}</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td >{{ $rows->heure_supp_30+$rows->heure_supp_50+$rows->heure_supp_40+$rows->heure_supp_100 }}</td>
            <td >{{ $rows->salairebrut }}</td>
            <td >{{ $rows->cnaps }}</td>
            <td >{{ $rows->sanitaire }}</td>
            <td >{{ $rows->montant_amp }}</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td >{{ $rows->total_ret }}</td>
            <td >{{ $rows->net_a_payer }}</td>
            <td >{{ $rows->avance }}</td>
            <td >{{ $rows->net_a_payer }}</td>
            <td ></td>
            <td >{{ $rows->net_a_payer }}</td>

            </tr>
            @endforeach
            <td>hjvajvhshabls</td>
            <td>sansaonaosssa</td>
            <td>sasjxcoasvfas</td>
            <td> sasjxcoasvfas</td>
            <td>sasjxcoasvfas</td>
            <td>sasjxcoasvfa</td>
            <td>sasjxcoasvfas </td>
            <td>xkbjavasfsiaueg</td>
            <td> xkbjavasfsiaueg</td>
</br>
<td>hjvajvhshabls</td>
            <td>sansaonaosssa</td>
            <td>sasjxcoasvfas</td>
            <td> sasjxcoasvfas</td>
            <td>sasjxcoasvfas</td>
            <td>sasjxcoasvfa</td>
            <td>sasjxcoasvfas </td>
            <td>xkbjavasfsiaueg</td>
            <td> xkbjavasfsiaueg</td>
            
            <td>{{ $total->total_base }}</td>
            <td>{{ $total->total_ret }}</td>
            <td>{{ $total->total_base }}</td>
            <td>xkbjavasfsiaueg </td>
            <td>xkbjavasfsiaueg </td>
            <td>xkbjavasfsiaueg </td>
            <td>{{ $total->total_supp }}</td>
            <td>{{ $total->total_salairebrut }}</td>
            <td>{{ $total->total_cnaps }}</td>
            <td>{{ $total->total_sanitaire }}</td>
            <td>{{ $total->total_montant_amp }}</td>
            <td>xkbjavasfsiaueg </td>
            <td>xkbjavasfsiaueg </td>
            <td>xkbjavasfsiaueg </td>
            <td>xkbjavasfsiaueg </td>
            <td>{{ $total->total_ret }}</td>
            <td>{{ $total->total_net_a_payer }}</td>
            <td>{{ $total->total_avance }}</td>
            <td>{{ $total->total_net_a_payer }}</td>
            <td> </td>
            <td>{{ $total->total_net_a_payer }}</td>
        </tbody>
      </table>

    </div>
</body>
</html>
