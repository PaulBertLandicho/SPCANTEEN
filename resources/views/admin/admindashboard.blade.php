@extends('layout.admindashboard')

@section('title')
Admin
@endsection
@section('content')
@include('layout.adminNavbar')
    <div class="container-shadow">
      <div class="container">
        <h1 style="margin-top: 20px;">
          <b>Hello Admin!</b>
        </h1>
        <div class="topp">
          <div class="box">
            <img class="boxImg" src="uploads/avatars/first.png" alt="first.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/second.png" alt="second.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/third.png" alt="third.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
          <div class="box">
            <img class="boxImg" src="uploads/avatars/first.png" alt="fourth.png">
            <div class="left">
              <h3>75</h3>
              <p class="above">Total Completed</p>
              <p class="below">
                <img class="smol" src="uploads/avatars/smolicon.png" alt="smolicon.png"> 4% (30 days)
              </p>
            </div>
          </div>
        </div>
        <div class="bottomm">
        <div class="chartBox">
        <div class="currentMonth" style="font-size: 15px; margin-left: 20px; font-weight: bold; color: maroon;">Month of <?php echo date('F'); ?> <div class="currentMonth" style="font-size: 20px; margin-left: 550px; font-weight: bold; color: gray;"><span style="color: blue;"> &#8226;</span> <?php echo date('Y'); ?></div>

        <canvas id="myChart"></canvas>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
      // setup 
      const data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
          label: 'Weekly Total Revenue',
          data: <?php echo json_encode($data); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(128, 0, 0, 1)', // Maroon color

          tension: 0.4
        }]
      };

      // config 
      const config = {
        type: 'line',
        data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // render init block
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

      // Instantly assign Chart.js version
      const chartVersion = document.getElementById('chartVersion');
      chartVersion.innerText = Chart.version;
    </script>      
      </div>
      </div>
  @endsection