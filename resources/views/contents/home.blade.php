@extends('layouts.app', ['title' => 'Home'])

@section('content')
<main>
  <div class="m-4">
    <h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
    <p class="lead">Berikut adalah data monitoring terbaru:</p>

    {{-- CARD UNTUK DATA RADIUS TERAKHIR --}}
    <div class="card shadow-sm border-primary mb-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Data Monitoring Terbaru</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush" id="latest-monitoring">
          <li class="list-group-item d-flex justify-content-between">
            <strong>Volt Cel1:</strong> <span id="cel1" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Volt Cel2:</strong> <span id="cel2" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Volt Cel3:</strong> <span id="cel3" class="fw-bold"></span>
          </li>
            <li class="list-group-item d-flex justify-content-between">
            <strong>Volt Cel4:</strong> <span id="cel4" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Volt Total:</strong> <span id="total" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Current:</strong> <span id="current" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>SOC:</strong> <span id="soc" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Internal Resistance:</strong> <span id="resistance" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Temperature:</strong> <span id="temperature" class="fw-bold"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <strong>Hasil Fuzzy:</strong> <span id="fuzzy" class="fw-bold"></span>
          </li>
        </ul>
      </div>      
    </div>

    {{-- CHART --}}
    <div class="card shadow-sm" style="margin-bottom: 20px">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Grafik Monitoring</h5>
      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>


  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Tambahkan Raphael.js terlebih dahulu -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function fetchMonitoring() {
        $.ajax({
            url: "{{ url('api/monitoring/latest') }}",
            method: 'GET',
            success: function(data) {
                var cel1 = data.data.cel1;
                var cel2 = data.data.cel2;
                var cel3 = data.data.cel3;
                var cel4 = data.data.cel4;
                var total = data.data.total;
                var current = data.data.current;
                var soc = data.data.soc;
                var resistance = data.data.resistance;
                var temperature = data.data.temperature;
                var fuzzy = data.data.fuzzy;

                $('#cel1').text(cel1 + ' V');
                $('#cel2').text(cel2 + ' V');
                $('#cel3').text(cel3 + ' V');
                $('#cel4').text(cel4 + ' V');
                $('#total').text(total + ' V');
                $('#current').text(current + ' A');
                $('#soc').text(soc + ' %');
                $('#resistance').text(resistance + ' Ohm');
                $('#temperature').text(temperature + ' °C');
                $('#fuzzy').text(fuzzy);

            }, 
            error: function(err) {
                console.error('Error fetching data', err);
            }
        });
    }

    setInterval(fetchMonitoring, 1000);
    fetchMonitoring();
  </script>

  {{-- Script Chart --}}
<script>
  let myChart;

  function updateChart() {
    fetch('/api/monitoring/chart')
      .then(response => response.json())
      .then(response => {
        const data = response.data;
        const labels = data.map(item => item.timestamp);
        const cel1 = data.map(item => item.cel1);
        const cel2 = data.map(item => item.cel2);
        const cel3 = data.map(item => item.cel3);
        const cel4 = data.map(item => item.cel4);
        const total = data.map(item => item.total);
        const current = data.map(item => item.current);
        const soc = data.map(item => item.soc);
        const resistance = data.map(item => item.resistance);
        const temperature = data.map(item => item.temperature);
        const fuzzy = data.map(item => item.fuzzy);

        if (myChart) {
          // Perbarui data
            myChart.data.labels = labels;
            myChart.data.datasets[0].data = cel1;
            myChart.data.datasets[1].data = cel2;
            myChart.data.datasets[2].data = cel3;
            myChart.data.datasets[3].data = cel4;
            myChart.data.datasets[4].data = total;
            myChart.data.datasets[5].data = current;
            myChart.data.datasets[6].data = soc;
            myChart.data.datasets[7].data = resistance;
            myChart.data.datasets[8].data = temperature;
            myChart.data.datasets[9].data = fuzzy;

          myChart.update();
        } else {
          // Buat chart pertama kali
          const ctx = document.getElementById('myChart').getContext('2d');
          myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [
                {
                    label: 'Cel 1',
                    data: cel1,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Cel 2',
                    data: cel2,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Cel 3',
                    data: cel3,
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Cel 4',
                    data: cel4,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Total Volt',
                    data: total,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Current',
                    data: current,
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'SOC',
                    data: soc,
                    borderColor: 'rgba(255, 99, 132, 0.5)',
                    borderWidth: 2,
                    fill: false
                },
                {
                  label: 'Internal Resistance',
                  data: resistance,
                  borderColor: 'rgba(54, 162, 235, 0.5)',
                  borderWidth: 2,
                  fill: false
                },
                {
                  label: 'Temperature',
                  data: temperature,
                  borderColor: 'rgba(255, 206, 86, 0.5)',
                  borderWidth: 2,
                  fill: false
                },
                {
                  label: 'Hasil Fuzzy',
                  data: fuzzy,
                  borderColor: 'rgba(75, 192, 192, 0.5)',
                  borderWidth: 2,
                  fill: false
                }
                
              ]
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        }
      })
      .catch(error => console.error('Error:', error));
  }

  // Jalankan sekali saat awal dan update tiap 1 detik
  updateChart();
  setInterval(updateChart, 1000);
</script>

</main>
@endsection