<?PHP
include "dbconnect.php";

$sql = "delete from groups where group_id = ?";

$group_id = $_REQUEST["group_id"];
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $group_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'groups.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>