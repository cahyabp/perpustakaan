@extends('layouts.app', ['title' => 'Dashboard - Admin'])
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full h-screen flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Pelaporan</h1>
        <div class="w-full h-[500px]">
            <canvas id="line-chart" width="100%" height="500px"></canvas>
        </div>
        <div class="w-full h-[500px] mt-5">
            <canvas id="pie-chart" width="100%" height="500px"></canvas>
        </div>

    </main>

    {{-- <footer class="w-full bg-white text-gray-600 text-left p-4">
        Copyright © Your Website 2023
    </footer> --}}

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

   $(document).ready(function(){
     $.ajax({
        url: `{{ route('admingetChartData') }}`,
          method: 'GET',
      dataType: 'json',
      success:  function(data){
        console.log(data);
           new Chart(
        document.getElementById('line-chart'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Jumlah Buku Yang Belum Dikembalikan Tiap Bulan',
                    data: data.bukuBelumDikembalikan,
                    borderColor: "#3cba9f",
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart Jumlah Buku Yang Belum Dikembalikan'
                    }
                }
            }
        }
    );

        new Chart(
        document.getElementById('pie-chart'), {
            type: 'pie',
            data: {
                labels: data?.popularBook.map(item => item.judul),
                datasets: [{
                    label: 'Total Peminjaman',
                    data: data?.popularBook.map(item => item.total_pinjam),
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Buku Paling Banyak Di Pinjam Bulan Ini'
                    }
                }
            }
        }
    );
      },
      error: function (error) {
        
      }
    })
   })
 


</script>
@endsection