@extends('layout.user.u_master')
@section('body')
    <center>
        <div class="container px-16 mt-6">
            <div class="rekap-data my-8">
                <div class="header-rekap flex flex-row gap-2">
                    <p class="text-3xl font-bold">Rekap Data</p>
                    <p class="text-md font-regular mt-3">{{ date('l',strtotime(date('Y-m-d'))) }}, {{ date('d/m/Y') }}</p>
                </div>
                <div class="body-rekap flex flex-row justify-around gap-8  mt-8 text-white">
                    <div class="card-rekap w-1/3 h-36 bg-red-600 rounded-lg shadow-lg">
                        <div class="card-header gap-3 flex flex-col justify-between px-5 py-8">
                            <p class="text-md font-bold">Total Mahasiswa</p>
                            <p class="text-4xl font-bold">1399</p>
                        </div>
                    </div>
                    <div class="card-rekap w-1/3 h-36 bg-red-600 rounded-lg shadow-lg">
                        <div class="card-header gap-3 flex flex-col justify-between px-5 py-8">
                            <p class="text-md font-bold">Total Suara Masuk</p>
                            <p class="text-4xl font-bold">{{ $total_suara }}</p>
                        </div>
                    </div>
                    <div class="card-rekap w-1/3 h-36 bg-red-600 rounded-lg shadow-lg">
                        <div class="card-header gap-3 flex flex-col justify-between px-5 py-8">
                            <p class="text-md font-bold">Total Belum Memilih</p>
                            <p class="text-4xl font-bold">{{ 1399-$total_suara }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- chart rekap --}}
            <div class="rekap-vote">
                <div class="header-rekap flex flex-col">
                    <p class="text-xl font-bold">Detail Data Voting</p>
                    <p class="text-sm font-regular">Semua detail pemilih tiap calon akan tampil dibawah</p>
                </div>
                <div class="flex flex-row gap-10 mt-8">
                    <div class="w-1/2">
                        <p class="mb-6">Capresma & Cawapresma</p>
                        <canvas id="presma"></canvas>
                    </div>
                    <div class="w-1/2">
                        <p class="mb-6">DLM</p>
                        <canvas id="dlm"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </center>

    {{-- Script --}}
    <script>
        //refresh page every 15 seconds
        setInterval(function(){
            location.reload();
        }, 15000);

        const presma = document.getElementById('presma');
        const dlm = document.getElementById('dlm');
        const label = [
                @foreach ($label_bem as $key => $label)
                    //decode html entities
                    '{{ html_entity_decode($label) }}',
                @endforeach
            ];

        // console.log($bem);
        new Chart(presma, {
          type: 'pie',
          data: {
            //merge the same label
            labels: label,
            datasets: [{
              label: 'Total of Votes',
              data: [
                @foreach ($count_bem as $key => $count)
                    {{ $count }},
                @endforeach
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
        new Chart(dlm, {
          type: 'pie',
          data: {
            //merge the same label
            labels: [
                @foreach ($label_dlm as $key => $label)
                    '{{ $label }}',
                @endforeach
            ],
            datasets: [{
              label: 'Total of Votes',
              data: [
                @foreach ($count_dlm as $key => $count)
                    {{ $count }},
                @endforeach
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });


      </script>
@endsection
