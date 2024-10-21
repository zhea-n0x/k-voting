@extends('layout.master')
@section('wrapper')
<div class="navbar py-1 px-5 w-full md:flex flex-row justify-between items-center bg-white">
    <div class="logo flex flex-row items-center gap-2 py-5 px-10">
        <img src="{{ asset('logo.png') }}" alt="K-PIRA" width="55" height="55">
        <p class="text-md font-bold text-gray-900">Komisi Pemilihan Raya</p>
    </div>
    <div class="menu -ml-24">
        <div class="flex flex-row gap-5">
            <a href="{{ route('privileged_admin') }}" class="font-semibold hover:text-red-500">Dashboard</a>
            <a href={{ route('privileged_admin/dlm') }} class="font-semibold hover:text-red-500">Calon DLM</a>
            <a href={{ route('privileged_admin/capresma') }} class="font-semibold hover:text-red-500">Capresma & Cawapresma</a>
        </div>
    </div>
    <div class="logout px-10">
        <a href="{{ url('/auth/logout') }}" class="text-lg font-semibold text-gray-900">Hi, {{ ucfirst(strtolower(session('name'))) }}</a>
        {{-- show name from session --}}

    </div>
</div>

@yield('body')

@endsection
