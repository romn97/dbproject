<?PHP
include "menu.html";
include "dbconnect.php";

$sql = "SELECT * from swimmers";
$result = $conn->query($sql);
$swimmers = $result->fetch_all(MYSQLI_ASSOC);
?>

<form action="swimmer_bests.php">
    
    <label for="fname">First Name:</label></br>
    <select id="fname" name="fname" >
        <?php
        for($i=0; $i< count($swimmers); $i++)
        {
            echo '<option value = "' . $swimmers[$i]["fname"] . '">';
            echo $swimmers[$i]["fname"] . "</option>";
        }
        ?>
    </select> </br>
    
    <label for="last_name">Last Name:</label></br>
    <select id="last_name" name="last_name" >
        <?php
        for($i=0; $i< count($swimmers); $i++)
        {
            echo '<option value = "' . $swimmers[$i]["last_name"] . '">';
            echo $swimmers[$i]["last_name"] . "</option>";
        }
        ?>
    </select> </br>
    
    <input type="submit" value="Submit">
</form>
<?PHP

$sql = "SELECT * FROM best_times NATURAL JOIN swimmers ORDER BY last_name, fname";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>First Name</th><th>Last Name</th><th>Distance</th><th>Stroke</th><th>Time</th><th>Hundredths</th><th>Date Achieved</th></tr>";    
  while($row = $result->fetch_assoc()) {
      $key = str_pad($row["distance"], 4, "00", STR_PAD_LEFT) . $row["stroke"] . $row["swimmer_id"];
      echo "<tr>";
      echo "<td>" . $row["fname"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["distance"] . "</td><td>" . $row["stroke"] . 
      "</td><td>" . $row["time"] . "</td><td>" . $row["hundredths"] . "</td><td>" . $row["date_achieved"] . "</td>";
      echo "<td>" . "<a href='delbest_time.php?key=" . $key . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editbest_time.php?key=" . $key . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addbest_time1.php">Add New</a>