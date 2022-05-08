<?PHP
include "menu.html";
include "dbconnect.php";

$sql = "SELECT * FROM families ORDER BY last_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Last Name</th><th>Parent 1</th><th>Parent 2</th><th>Street</th><th>City</th><th>State</th></tr>";    
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["last_name"] . "</td><td>" . $row["p1_first"] . 
      "</td><td>" . $row["p2_first"] . "</td><td>" . $row["street"] . "</td><td>" . $row["city"] . "</td><td>" . $row["state"] . "</td>";
      echo "<td>" . "<a href='delfamily.php?family_id=" . $row["family_id"] . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editfamily.php?family_id=" . $row["family_id"] . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addfamily.html">Add New</a>