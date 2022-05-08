<?PHP
include "dbconnect.php";

$coach_id = $_REQUEST["coach_id"];
$fname = $_REQUEST["fname"];
$birthday = $_REQUEST["birthday"];
$alma_mater = $_REQUEST["alma_mater"];
$family_id = $_REQUEST["family_id"];

$sql = "select last_name FROM families WHERE family_id = " . $family_id;
$result = $conn->query($sql);
$family = $result->fetch_all(MYSQLI_ASSOC);
$last_name = $family[0]["last_name"];

$sql = "update coaches set fname= ?, birthday = ?, alma_mater = ?, last_name = ?, family_id = ? where coach_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssii", $fname, $birthday, $alma_mater, $last_name, $family_id, $coach_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'coaches.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>