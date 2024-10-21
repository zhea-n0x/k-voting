@extends('Layout.master')
@section('wrapper')
{{-- center div --}}
<div class="py-5">
    <div class="hidden lg:flex flex-row justify-around items-center align-middle">
        <div class="logo">
            <img src="{{ asset('calon/1.jpg') }}" alt="K-PIRA" width="55" height="55">
        </div>
        <div class="header-title">
            <p class="text-2xl font-bold text-center text-gray-800">PERMIRA 2022</p>
            <p class="font-light text-center">Tekan tombol pilih pada calon yang diinginkan</p>
        </div>
        <div class="logo">
            <img src="{{ asset('logo.png') }}" alt="K-PIRA" width="55" height="55">
        </div>
    </div>
    <form action="{{ route('user/vote/submit') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mt-8">
            <p class="text-center mb-3 text-lg font-medium">Capresma & Cawapresma</p>
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 px-16">
                {{-- Card --}}
                @foreach($bem as $b)
                <div class="rounded-xl overflow-hidden shadow-lg border-2 border-blue-500">
                    <img class="w-full p-5" src="{{ asset('uploads/bem').'/'.$b['photo'] }}" alt="Pasangan 1">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2"> (No. Urut {{ $b['no_urut'] }}) {{ $b['name'] }}</div>
                      <hr>
                      <p class="text-gray-700 text-base mt-2">
                        <label class="font-bold text-gray-800 text-lg">Visi</label>
                        <br>
                        <p class="mt-2">{{ $b['visi'] }}</p>
                        <hr class="mt-4 mb-4">
                        <label class="font-bold text-gray-800 text-lg">Misi</label>
                        <p class="mt-2">{{ $b['misi'] }}</p>
                      </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                      <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                          <input id="bem-candidate{{ $b['id'] }}" type="radio" value="{{ $b['id'] }}" name="bem" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="bem-candidate{{ $b['id'] }}" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Pilih Kandidat</label>
                      </div>
                    </div>
                  </div>
                @endforeach
                {{-- Card --}}
              </div>
            </div>
        </div>
        <div class="mt-2 ">
            <p class="text-center mb-3 text-lg font-medium">Calon DLM</p>
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 px-16">
                {{-- Card --}}
                @foreach ($dlm as $d)
                <div class="rounded-xl overflow-hidden shadow-lg border-2 border-blue-500">
                    <img class="w-full p-5" src="{{ asset('uploads/dlm').'/'.$d['photo'] }}" alt="Pasangan 1">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">(No. Urut {{ $d['no_urut'] }}) {{ $d['name'] }} </div>
                      <hr>
                      <p class="text-gray-700 text-base mt-2">
                        <label class="font-bold text-gray-800 text-lg">Visi</label>
                        <br>
                        <p class="mt-2">{{ $d['visi'] }}</p>
                        <hr class="mt-4 mb-4">
                        <label class="font-bold text-gray-800 text-lg">Misi</label>
                        <p class="mt-2">{{ $d['misi'] }}</p>
                      </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                      <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                          <input id="dlm-candidate{{ $d['id'] }}" type="radio" value="{{ $d['id'] }}" name="dlm" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                          <label for="dlm-candidate{{ $d['id'] }}" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Pilih Kandidat</label>
                      </div>
                    </div>
                  </div>
                @endforeach
                {{-- Card --}}
              </div>
            </div>
        </div>
        <div class="text-center mb-10">
            <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-4 text-center mr-2 mb-2">Submit Pilihan</button>
        </div>
    </form>
</div>
@endsection
