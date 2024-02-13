<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            <div class="pull-right">
                <a class="btn  " href="{{ route('dashboard') }}"> Entreprises</a>
            </div>
            <a class="btn  " href="{{ route('skills.index') }}"> Skills</a>
            <a class="btn  " href="{{ route('annonces.index') }}"> Annonces</a>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Start block -->
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">

    <div class="statistics-container" style="background-color: #f8f9fa; padding: 10px; ">
    <p style="font-size: 18px; color: #333;">Statistics:</p>
    <p style="font-size: 16px; color: #555;">Number of Users: {{ $usersCount }}</p>
    <p style="font-size: 16px; color: #555;">Number of Annonces: {{ $annoncesCount }}</p>
    <p style="font-size: 16px; color: #555;">Number of Entreprises: {{ $entreprisesCount }}</p>
</div>

</section>
</x-app-layout>
