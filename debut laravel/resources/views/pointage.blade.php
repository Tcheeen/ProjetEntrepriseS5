<html>

<head>
</head>

<body>

<h1>Pointage des employe</h1>

<form action="{{ url('/ajout_pointage') }}" method="post">
{{ csrf_field() }}


<select name="employe">
<option value="">choisir employe</option>
@foreach($liste_employe as $row)
<option value="{{ $row->idemploye }}">{{ $row->nom }} {{ $row->prenom }}</option>
@endforeach
</select>


<select name="jour">
<option value="">choisir jour</option>
<option value="1">lundi</option>
<option value="2">mardi</option>
<option value="3">mercredi</option>
<option value="4">jeudi</option>
<option value="5">vendredi</option>
</select>

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
<?php for($i=2000;$i<=2022;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
</select>

<select name="mouvement">
<option value="">choisir heure supp</option>
    <option value="1">heure supplementaire</option>
    <option value="2">heure nuit</option>
</select>

<input type="number" name="heure">

<input type="submit" value="inserer">

</form>
</body>

</html>
