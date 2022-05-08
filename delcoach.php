<?PHP
include "dbconnect.php";

$sql = "delete from coaches where coach_id = ?";

$coach_id = $_REQUEST["coach_id"];
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $coach_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'coaches.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>