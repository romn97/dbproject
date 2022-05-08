<?PHP
include "dbconnect.php";

$fname = $_REQUEST["fname"];
$birthday = $_REQUEST["birthday"];
$gender = $_REQUEST["gender"];
$group_name = $_REQUEST["group_name"];
$family_id = $_REQUEST["family_id"];

$sql = "select last_name FROM families WHERE family_id = " . $family_id;
$result = $conn->query($sql);
$family = $result->fetch_all(MYSQLI_ASSOC);
$last_name = $family[0]["last_name"];

$sql = "call upNumSwimmers(?, 1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $group_name);
$stmt->execute();

$sql = "insert into swimmers (fname, birthday, gender, group_name, last_name, family_id) VALUES(?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $fname, $birthday, $gender, $group_name, $last_name, $family_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'swimmers.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>