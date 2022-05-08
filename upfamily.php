<?PHP
include "dbconnect.php";

$sql = "update families set last_name= ?, p1_first = ?, p2_first = ?, street = ?, city = ?, state = ? where family_id = ?";

$family_id = $_REQUEST["family_id"];
$last_name = $_REQUEST["last_name"];
$p1_first = $_REQUEST["p1_first"];
$p2_first = $_REQUEST["p2_first"];
$street = $_REQUEST["street"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $last_name, $p1_first, $p2_first, $street, $city, $state, $family_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'families.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>