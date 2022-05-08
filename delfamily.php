<?PHP
include "dbconnect.php";

$sql = "delete from families where family_id = ?";

$family_id = $_REQUEST["family_id"];
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $family_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'families.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>