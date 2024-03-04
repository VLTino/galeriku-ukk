@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
    <div class="content container mt-5">

            <section class="p-5 mt-5 w-full">
          <canvas id="bars"></canvas>
        </section>
            <div class="row">
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-primary">
                  <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <h3 style="text-align: center"><i class="fa fa-user" aria-hidden="true"></i> 50</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-warning">
                  <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <h3 style="text-align: center"><i class="fa-solid fa-user-tie"></i> 5</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-dark">
                  <div class="card-body">
                    <h5 class="card-title">Image</h5>
                    <h3 style="text-align: center"><i class="fa-solid fa-images"></i> 150</h3>
                  </div>
                </div>
              </div>
            </div>  
    </div>

    <script>
      var chartColors = {
          red: 'rgb(255, 99, 132)',
          orange: 'rgb(255, 159, 64)',
          yellow: 'rgb(255, 205, 86)',
          green: 'rgb(75, 192, 192)',
          info: '#41B1F9',
          blue: '#3245D1',
          purple: 'rgb(153, 102, 255)',
          grey: '#EBEFF6'
      };
  
      // Define default data
      var defaultData = [
          { date: '2024-01-01', count: 10 },
          { date: '2024-01-02', count: 20 },
          { date: '2024-01-03', count: 15 },
          // Add more data as needed
      ];
  
      var ctxBar = document.getElementById("bars");
      var labels = defaultData.map(gambar => gambar.date);
      var counts = defaultData.map(gambar => gambar.count);
  
      var myBar = new Chart(ctxBar, {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Jumlah Upload Gambar',
                  data: counts,
                  backgroundColor: chartColors.blue,
                  barPercentage: 0.2,
                  categoryPercentage: 0.3
              }]
          },
          options: {
              responsive: true,
              barRoundness: 1,
              title: {
                  display: false,
                  text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
              },
              legend: {
                  display: false
              },
              scales: {
                  y: {
                      max: 100
                  }
              }
          }
      });
  </script>
  
@endsection