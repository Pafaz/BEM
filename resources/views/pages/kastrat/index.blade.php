@section('title', 'Dashboard Kastrat')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang') }}
        </h2>
    </x-slot>

    <livewire:kastrat />
</x-app-layout>