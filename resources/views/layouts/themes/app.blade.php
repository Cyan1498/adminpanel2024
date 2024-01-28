<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Systema of Pharmacy') }}</title> --}}
    <title>Panel admin</title>
    
    @include('layouts.themes.styles')

    @livewireStyles

</head>

<body>

    {{-- Main container --}}
    <main id="app">
        <form id="logout-form" action="url('/logout')" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="main-wrapper">
            {{-- @livewire('sidebar') --}}
            @include('layouts.themes.header')
            @include('layouts.themes.sidebar')

            <div class="main-content">
                <section class="section">
                    {{-- {{$slot}} --}}
                    @yield('content')
                </section>
                
            </div>
            {{-- @yield('content') --}}
            @include('layouts.themes.footer')
        </div>
    </main>
    @include('layouts.themes.scripts')

    @livewireScripts
    {{-- <x:notify-messages /> --}}
    {{-- @livewire('notify-messages') --}}

</body>

</html>