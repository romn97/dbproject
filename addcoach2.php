<?PHP
include "dbconnect.php";

$fname = $_REQUEST["fname"];
$birthday = $_REQUEST["birthday"];
$alma_mater = $_REQUEST["alma_mater"];
$family_id = $_REQUEST["family_id"];

$sql = "select last_name FROM families WHERE family_id = " . $family_id;
$result = $conn->query($sql);
$family = $result->fetch_all(MYSQLI_ASSOC);
$last_name = $family[0]["last_name"];

$sql = "insert into coaches (fname, birthday, alma_mater, last_name, family_id) VALUES(?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $fname, $birthday, $alma_mater, $last_name, $family_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'coaches.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>