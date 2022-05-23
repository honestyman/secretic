@php
    $active_navbar_item = $active_navbar_item?? null;
@endphp

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="40" src="{{ asset('assets/logo.png') }}">
            <span class="fs-4">SecretNotes</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ $active_navbar_item === 'home' ? 'active' : '' }}" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('new.note') }}" class="nav-link {{ $active_navbar_item === 'new.note' ? 'active' : '' }}">Новая заметка</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link {{ $active_navbar_item === 'about' ? 'active' : '' }}">О SecretNotes</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        </ul>
    </header>
</div>
