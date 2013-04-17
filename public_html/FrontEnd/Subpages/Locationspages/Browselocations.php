<style type="text/css">
  #resultTable
  {
    background: cornsilk;
    border-radius: 15px;
    width: 100%;
  }
  th 
  {
    font: bold 20px "Helvectica";
    color:#000;
    width: 50%;
    text-align:left;
    padding:10px 20px 10px 20px;
  }
  td
  {
    width:50%;
    padding:15px;
  }

</style>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
<title>Check-in Somewhere</title>

</head>

<body>
<div class="bigdiv">

<?php
  include("locNavbar.php");
?>

<div class="secondary">
<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Locations Navigation
  </li>
  <li>
    <a id="checkSel" href="Checkin.html"><img class="otherpics" src="../../img/otherpics_black/map_marker_black.png"></img>Check-in Somewhere</a>
  </li>
  <li class="active">
    <a id="browseSel" href='geoIP.php'><img class="otherpics" src="../../img/otherpics_black/search_black.png"></img>Browse Locations</a>
  </li>
  <!--<li>
    <a href='Map.html'><img class="otherpics" src="../../img/otherpics_white/compass_white.png"></img>See the Map</a>
  </li>-->
</ul>
</div>


<div class="signup">
  <table id="resultTable">
    <tr>
      <th id="type">
        Type
      </th>
      <th id="name">
        Name
      </th>
    <tr>
    <br />
  <?php
    $location = $_POST["myLoc"];
    $data = array(
          "location"=>$location,
          "radius"=>'5000',
          "types"=>"bar|casino|cafe|amusement_park|bowling_alley|food|gym|library|movie_theater|night_club|restaurant|shopping_mall|stadium|zoo|establishment",
          "key"=>'AIzaSyCvcpJY0O0kYdLFSapWJM9oJuuLBklDZX0',
          "sensor"=>'false',
        );
    $url = "https://maps.googleapis.com/maps/api/place/search/json?location=". $data["location"] . "&radius=" . $data["radius"] . "&name=" . $data["name"] . "&key=" . $data["key"] . "&sensor=" . $data["sensor"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = json_decode(curl_exec($ch), true);

    for ($i = 0; $i <= count($result['results']); $i++)
    {

      $icon = $result['results'][$i]["icon"];
      $name = $result['results'][$i]["name"];
      if (strlen($name) > 30)
        continue;

      echo "<tr>" . "<td>" . "<img src='". $icon . "' height=71 width=71 />" . "</td>" . "<td>" . $name . "</td>" . "</tr>";
    }
    //var_dump($id);
  ?>
  </table>
</div
</div>
</body>
</html>