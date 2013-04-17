<html>
  <body>
    <script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
    <form method="POST" id = "geoIPForm" action="Browselocations.php">
      <input style="display: none" id="location" name="myLoc" value="hey">
      </input>
    </form>
    <script type="text/javascript">
      $(document).ready(function() {
        if (navigator.geolocation) 
        {
          var myLat;
          var myLong;
          navigator.geolocation.getCurrentPosition( function(pos) {
            myLat = "" + pos.coords.latitude + "";
            myLong = "" + myLat + "," + pos.coords.longitude + "";
            console.log(myLong);
            $("#location").attr("value", myLong);
            $("#geoIPForm").submit();
          });
        }
      });
    </script>
  </body>
</html>