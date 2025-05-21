<h1 class="text-2xl font-bold mb-2 mt-4 text-blue-700">Alle beschikbare voertuigen</h1>
<p>Naam: {{ $instructeur->voornaam }} {{ $instructeur->tussenvoegsel }} {{ $instructeur->achternaam }}</p>
<p>Datum in dienst: {{ $instructeur->datum_in_dienst }}</p>
<p>Aantal sterren: {{ $instructeur->aantal_sterren }}</p>

<table class="min-w-full bg-white border border-gray-300 rounded shadow mb-6 mt-4">
    <thead>
        <tr class="bg-blue-100 text-blue-900">
            <th class="py-2 px-4 border-b">Type Voertuig</th>
            <th class="py-2 px-4 border-b">Type</th>
            <th class="py-2 px-4 border-b">Kenteken</th>
            <th class="py-2 px-4 border-b">Bouwjaar</th>
            <th class="py-2 px-4 border-b">Brandstof</th>
            <th class="py-2 px-4 border-b">Rijbewijscategorie</th>
            <th class="py-2 px-4 border-b text-center">Toevoegen</th>
            <th class="py-2 px-4 border-b text-center">Wijzigen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($voertuigen as $voertuig)
        <tr class="hover:bg-blue-50">
            <td class="py-2 px-4 border-b">{{ $voertuig->type_voertuig->type_voertuig ?? 'N/A' }}</td>
            <td class="py-2 px-4 border-b">{{ $voertuig->type }}</td>
            <td class="py-2 px-4 border-b">{{ $voertuig->kenteken }}</td>
            <td class="py-2 px-4 border-b">{{ $voertuig->bouwjaar }}</td>
            <td class="py-2 px-4 border-b">{{ $voertuig->brandstof }}</td>
            <td class="py-2 px-4 border-b">{{ $voertuig->type_voertuig->rijbewijscategorie ?? 'N/A' }}</td>
            <td class="py-2 px-4 border-b text-center">
                <form method="POST" action="{{ route('voertuigen.assign', [$instructeur->id, $voertuig->id]) }}">
                    @csrf
                    <button type="submit" title="Toevoegen" class="text-green-600 text-xl hover:scale-125 transition">➕</button>
                </form>
            </td>
            <td class="py-2 px-4 border-b text-center">
                <a href="{{ route('voertuigen.edit', $voertuig->id) }}" class="text-yellow-600 text-xl hover:scale-125 transition" title="Wijzigen">✏️</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('instructeurs.show', $instructeur->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Terug</a>
