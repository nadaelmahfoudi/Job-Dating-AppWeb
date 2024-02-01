<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Edit an Entreprise</title>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Edit an Entreprise</h2>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('dashboard') }}">Back</a>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger bg-red-200 text-red-800 p-4 mb-4">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" value="{{ $annonce->titre }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Titre">
            </div>

            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 text-sm font-bold mb-2">Contenu:</label>
                <input type="text" name="contenu" id="contenu" value="{{ $annonce->contenu }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contenu">
            </div>

            <div class="mb-3">
                <label for="entreprise_id" class="block text-gray-700 text-sm font-bold mb-2">Entreprise ID:</label>
                <select name="entreprise_id" class="form-select">
                    <option value=""></option>
                    @foreach($entreprises as $entrepriseOption)
                        <option value="{{ $entrepriseOption->id }}" {{ $entrepriseOption->id == $annonce->entreprise_id ? 'selected' : '' }}>
                            {{ $entrepriseOption->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
