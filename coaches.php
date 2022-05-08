<?PHP
include "menu.html";
include "dbconnect.php";

$sql = "SELECT * FROM coaches ORDER BY last_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table border=1><tr><th>Last Name</th><th>First Name</th><th>Birthday</th><th>Alma Mater</th></tr>";    
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["last_name"] . "</td><td>" . $row["fname"] . "</td><td>" . $row["birthday"] . 
      "</td><td>" . $row["alma_mater"] . "</td>";
      echo "<td>" . "<a href='delcoach.php?coach_id=" . $row["coach_id"] . "'>Del</a>" . "</td>";
      echo "<td>" . "<a href='editcoach.php?coach_id=" . $row["coach_id"] . "'>Edit</a>" . "</td>";
      echo "</tr>";
  }
  echo "</table>";    
} 
$conn->close();

?>
<a href="addcoach1.php">Add New</a>