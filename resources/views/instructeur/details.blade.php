<h1>Voertuigen van {{ $instructeur->voornaam }} {{ $instructeur->achternaam }}</h1>
<p>Datum in dienst: {{ $instructeur->datum_in_dienst }}</p>
<p>Aantal sterren: {{ $instructeur->aantal_sterren }}</p>
Create voertuig
<a href="">🚗</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>wijzigen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($instructeur->voertuigen as $voertuig)
        <tr>
            <td>{{ $voertuig->type_voertuig->type_voertuig ?? 'N/A' }}</td>
            <td>{{ $voertuig->type }}</td>
            <td>{{ $voertuig->kenteken }}</td>
            <td>{{ $voertuig->bouwjaar }}</td>
            <td>{{ $voertuig->brandstof }}</td>
            <td>{{ $voertuig->type_voertuig->rijbewijscategorie ?? 'N/A' }}</td>
            <td><a href="{{ route('voertuigen.edit', $voertuig->id) }}">✏️</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('/') }}">Terug naar overzicht</a>
