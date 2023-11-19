<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .clock-container {
            background-color: #ff9999; /* Less lighter red background */
            border-radius: 10px;
            padding: 20px; /* Increased padding */
            color: white; /* White text color */
            text-align: center;
            font-size: 28px; /* Increased font size */
        }

        .calendar-container {
            background-color: skyblue; /* Sky blue background */
            border-radius: 10px;
            padding: 20px; /* Increased padding */
            color: white; /* White text color */
            text-align: center;
            font-size: 28px; /* Increased font size */
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">PROJECT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="brand.php">Brand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php">Orders</a>
      </li>         
    </ul>
  </div>  
</nav>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="clock-container">
                <h2 style="font-size: 20px;">Current Time</h2>
                <div id="clock"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="calendar-container">
                <h2 style="font-size: 20px;">Current Date</h2>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours() % 12 || 12; // Use 12-hour format
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var period = now.getHours() < 12 ? 'AM' : 'PM';
        document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds + ' ' + period;
        setTimeout(updateClock, 1000);
    }

    function updateCalendar() {
        var now = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('calendar').innerHTML = now.toLocaleDateString('en-US', options);
        setTimeout(updateCalendar, 60000); // Update every minute
    }

    updateClock();
    updateCalendar();
</script>

</body>
</html>


