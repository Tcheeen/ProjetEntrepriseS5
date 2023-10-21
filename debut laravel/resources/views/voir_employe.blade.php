<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employes</title>
</head>
<body>


    <h1>Liste des employés</h1>
    {{ csrf_field() }}
    @foreach($liste_employe as $employe)
    <form action="{{ url('/fiche_salaire') }}" method="get">
    <p>{{ $employe->idemploye }}</p>
    <p>{{ $employe->nom }}</p>
    <input type="text" name="idemploye" value="{{ $employe->idemploye }}">
    <input type="date" name="datepaie">
    <input type="submit" value="ok">
    </form>
    @endforeach
</body>
</html>
