<html>
    <head></head>
<body>

    <h1>Total : {{ $total }}</h1>
    <p>Liste des employes</p>
    @foreach($liste as $rows)
<p>{{ $rows->nom }} {{ $rows->prenom }}</p>
<a href="{{ url('detail_emp')}}/{{ $rows->employe }}">voir details</a>
    @endforeach

</body>

    </html>
