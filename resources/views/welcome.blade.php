<h1>Instructeurs in dienst</h1>

<p>Aantal instructeurs: {{ $instructeurs->count() }}</p>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Mobiel</th>
            <th>Datum in dienst</th>
            <th>Aantal sterren</th>
            <th>Voertuigen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($instructeurs as $instructeur)
        <tr>
            <td>{{ $instructeur->voornaam }}</td>
            <td>{{ $instructeur->tussenvoegsel }}</td>
            <td>{{ $instructeur->achternaam }}</td>
            <td>{{ $instructeur->mobiel }}</td>
            <td>{{ $instructeur->datum_in_dienst }}</td>
            <td>{{ $instructeur->aantal_sterren }}</td>
            <td><a href="{{ route('instructeurs.show', $instructeur->id) }}">🚗</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

