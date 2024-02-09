<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Add New Annonce</title>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Add New Annonce</h2>
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

        <form action="{{ route('annonces.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Titre">
            </div>

            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 text-sm font-bold mb-2">Contenu:</label>
                <input type="text" name="contenu" id="contenu" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contenu">
            </div>

            <div class="mb-3">
                <label for="entreprise_id" class="form-label">entreprise_id:</label>
                <select name="entreprise_id" class="form-select">
                    <option value=""></option>
                    @foreach($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="entreprise_id" class="block text-gray-700 text-sm font-bold mb-2">Select Skills:</label>
                <select class="form-select" id="update-skills" name="skills[]" multiple>
                    @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
