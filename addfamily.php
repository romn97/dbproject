<?PHP
include "dbconnect.php";

$sql = "insert into families (last_name, p1_first, p2_first, street, city, state) VALUES(?, ?, ?, ?, ?, ?)";

$last_name = $_REQUEST["last_name"];
$p1_first = $_REQUEST["p1_first"];
$p2_first = $_REQUEST["p2_first"];
$street = $_REQUEST["street"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $last_name, $p1_first, $p2_first, $street, $city, $state);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'families.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>