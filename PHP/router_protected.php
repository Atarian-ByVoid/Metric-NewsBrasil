<?php
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "validator";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
if (!isset($_SESSION['username'])) {
    header('Location: router_protected.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="music.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" href="light-metric.png" type="image/x-icon">
    <link rel="shortcut icon" href="light-metric.png" type="image/x-icon">
  <title>Music</title>
</head>
<body>


<header class="header"><label>Metric&NewsBrasil</label>
    <nav class="navbar">
      <a href="home.html">Home</a>
      <a href="/pages/sport.html">Sport</a>
      <a href="/pages/weather.html">Weather</a>
      <a href="router_protected.php">Music</a>
      <a href="/pages/photos.html">Photos</a>
      <a href="/pages/more.html">More</a>
      <a href="login.html">   <i class='bx bxs-user-circle bx-tada bx-flip-horizontal'></i>Login</a>
    </nav>
    <form action="#" class="search-bar">

      <input type="text" placeholder="Search...">
      <button type="submit"><i class='bx bx-search'></i></button>
    </form>
  </header>

  <form action="#" class="search-bar">

<input type="text" placeholder="Search...">
<button type="submit"><i class='bx bx-search'></i></button>
</form>
</header>
 

<div class="image-player">

<div class="music-player">
<audio id="audio-player">
<source src="pinkfloyd.mp3" type="audio/mpeg">
</audio>
<div class="controls">
<button id="previous-button">&lt;&lt;</button>
<button id="play-button">Play</button>
<button id="pause-button">Pause</button>
<button id="next-button">&gt;&gt;</button>
</div>
</div>
</div>

<section class="top-stories">
<div class="container">
<h2>Music news</h2>
<ul>
  <li>
    <a href="#">
      <img  src="travis.png" alt="" />
      <h3>New album release confirmed</h3>
      <p>Rapper confirm rummors about release of his new album</p>
    </a>
  </li>
  <li>
    <a href="#">
      <img src="festival.png" alt="" />
      <h3>New festival comming</h3>
      <p>The "Loolapalooza 2024" offically open tickets sales</p>
    </a>
  </li>
  <li>
    <a  href="#">
      <img  src="spotify.png" alt="" />
      <h3>New record</h3>
      <p>The Weekend breaks all-time record for Spotify streams with his latest album</p>
    </a>
  </li>
</ul>
</div>
</section>

<section class="top-stories">
<div class="container">
<h2>Artists</h2>
<ul>
  <li>
    <a href="#">
      <img id="teste"src="adele.png" alt="" />
      <h3>Comming back</h3>
      <p>Adele returns to the stage with a new world tour</p>
    </a>
  </li>
  <li>
    <a href="#">
      <img src="taylor.png" alt="" />
      <h3>New single</h3>
      <p>Taylor Swift releases new single in partnership with successful Latin artist </p>
    </a>
  </li>
  <li>
    <a href="#">
      <img src="ed.png" alt="" />
      <h3>The reunion</h3>
      <p>Ed Sheeran announces new album and reveals collaborations with big names in music</p>
    </a>
  </li>
</ul>
</div>
</section>

<section class="top-stories">
<div class="container">
<h2>Interviews</h2>
<ul>
  <li>
    <a href="#">
      <img src="bts.png" alt="" />
      <h3>Behind the scenes</h3>
      <p>BTS World Tour Behind the Scenes: Interview with the Producer</p>
    </a>
  </li>
  <li>
    <a href="#">
      <img  src="justin.png" alt="" />
      <h3>VIP Talk</h3>
      <p>Exclusive Conversation With Justin Bieber: How He Created His Latest Musical Masterpiece</p>
    </a>
  </li>
  <li>
    <a href="#">
      <img src="producer.png" alt="" />
      <h3>Big revelations</h3>
      <p>Music producer Max Martin shares his secrets and recording techniques in an interview</p>
    </a>
  </li>
</ul>
</div>
</section> 


<footer>
<div class="container">
<div class="social-links">
  <a href="https://www.linkedin.com/in/carlos-alberto-94255a21b/"><img src="linkedin.png" alt="linkedin"></a>
  <a href="https://github.com/Atarian-ByVoid"><img src="github.png" alt="github"></a>
  <a href="https://twitter.com/atarian_by_void"><img src="twitter.png" alt="twitter"></a>
</div>
<p>&copy; 2023 Metric&NewsBrasil. All rights reserved.</p>
</div>
</footer>


</body>
</html>

