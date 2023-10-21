<html>
    <head></head>
<body>
    <form action="{{ url('voir_detail_emp') }}" method="post">
        {{ csrf_field() }}
<input type="hidden" name="idemploye" value="{{ $idemploye }}">

<select name="choix">
<option value=""></option>
<option value="1">nombre de conger</option>
<option value="2">nombre heure majore</option>
<option value="3">nombre d'absence</option>
<option value="4">salaire mensuel</option>
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


<input type="submit" value="selectionner">
    </form>
</body>
    </html>
