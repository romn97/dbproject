<?PHP
include "menu.html";
include_once "dbconnect.php";

$last_name = $_REQUEST["last_name"];
$fname = $_REQUEST["fname"];

$sql = "SELECT * FROM swimmer_bests WHERE last_name = '" . $last_name . "' AND fname = '" . $fname . "' ORDER BY last_name, fname";

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