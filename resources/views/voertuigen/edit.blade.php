<h1>Wijzigen voertuiggegevens</h1>

<form method="POST" action="{{ route('voertuigen.update', $voertuig->id) }}">
    @csrf
    @method('PUT')

        <label>Instructeur:</label>
    <select name="instructeur_id">
        @foreach($instructeurs as $instructeur)
            <option value="{{ $instructeur->id }}" {{ (isset($huidigeInstructeur) && $huidigeInstructeur->id == $instructeur->id) ? 'selected' : '' }}>
                {{ $instructeur->voornaam }} {{ $instructeur->tussenvoegsel }} {{ $instructeur->achternaam }}
            </option>
        @endforeach
    </select>
    <br>
    
    <label>Type Voertuig:</label>
    <select name="type_voertuig_id">
        @foreach($typeVoertuigen as $type)
            <option value="{{ $type->id }}" {{ $voertuig->type_voertuig_id == $type->id ? 'selected' : '' }}>
                {{ $type->type_voertuig }}
            </option>
        @endforeach
    </select>
    <br>
    

    <label>Type:</label>
    <input type="text" name="type" value="{{ $voertuig->type }}">
    <br>

    <label>Kenteken:</label>
    <input type="text" name="kenteken" value="{{ $voertuig->kenteken }}">
    <br>

    <label>Bouwjaar:</label>
    <input type="date" name="bouwjaar" value="{{ $voertuig->bouwjaar }}" readonly>
    <br>

    <label>Brandstof:</label>
    <select name="brandstof">
        <option value="Benzine" {{ $voertuig->brandstof == 'Benzine' ? 'selected' : '' }}>Benzine</option>
        <option value="Diesel" {{ $voertuig->brandstof == 'Diesel' ? 'selected' : '' }}>Diesel</option>
        <option value="Elektrisch" {{ $voertuig->brandstof == 'Elektrisch' ? 'selected' : '' }}>Elektrisch</option>
    </select>
    <br>
    <label>Rijbewijscategorie:</label>
    <input type="text" value="{{ $voertuig->type_voertuig->rijbewijscategorie ?? '' }}" disabled>
    <br>



    <button type="submit">Opslaan</button>
</form>

<a href="{{ url()->previous() }}">Annuleren</a>
