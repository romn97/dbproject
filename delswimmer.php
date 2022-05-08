<?PHP
include "dbconnect.php";


$swimmer_id = ltrim(substr($_REQUEST["key"], 0, 4), "0");
$group_name = ltrim(substr($_REQUEST["key"], 5, 30), "1");

$sql = "call upNumSwimmers(?, -1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $group_name);
$stmt->execute();

$sql = "delete from swimmers where swimmer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $swimmer_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'swimmers.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>