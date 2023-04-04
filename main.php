<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Motion_Detection.com</title>
</head>
<body>
    <div class = "page">
        
        <nav class="navbar">
            <div class="left">
                <h1>Motion Detection</h1>
            </div>
            <div class="right">
                <input type="checkbox" id="check">
                <label for="check" class="checkBtn">
                    <i class="fa fa-bars"></i>
                </label>
                <ul class="list">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="index.php">Account</a></li>
                </ul>
            </div>      
        </nav>
        

        <div class="container">
      <div class="card card-yellow">
        <h2 class="title">Pushup</h2>
        <img class="product" src="image/pushup.jpg">
        <div class="button-right">
          <button onclick="location.href='pushup.php'">Go</button>
        </div>
      </div>

      <div class="card card-blue">
        <h2 class="title">Squat</h2>
        <img class="product" src="image/squat.jpg">       
        <div class="button-right">
          <button onclick="location.href='squat.php'">Go</button>
        </div>
      </div>

      <div class="card card-red">
        <h2 class="title">Situp</h2>
        <img class="product" src="image/situp.jpg">      
        <div class="button-right">
        <button onclick="location.href='Sit_up.php'">Go</button>
        </div>
      </div>
    </div>

    <!-- <footer>
	    <h4>All Right Reserved to ***** 2022</h4>
    </footer> -->

    </div>
</body>


</html>