@section('title', 'Dashboard Kastrat')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang Kementrian Kajian Aksi dan Strategi!') }}
        </h2>
    </x-slot>
    <livewire:kastrat />
</x-app-layout>