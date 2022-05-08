<?PHP
include "menu.html";
include "dbconnect.php";

$sql = "SELECT * FROM weekly_pool_usage";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Weekday</th><th>Half Hour Block</th><th>Group Name</th><th>Number of Lanes</th></tr>";    
  while($row = $result->fetch_assoc()) {
      $key = $row["weekday"] . $row["group_name"];
      echo "<tr>";
      echo "<td>" . $row["weekday"] . "</td><td>" . $row["halfHour"] . "</td><td>" . $row["group_name"] . "</td><td>" . $row["num_of_lanes"] . "</td>";
      echo "<td>" . "<a href='delweekly_pool_use.php?key=" . $key . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editweekly_pool_use.php?key=" . $key . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addweekly_pool_use1.php">Add New</a>