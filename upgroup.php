<?PHP
include "dbconnect.php";



$group_id = $_REQUEST["group_id"];
$group_name = $_REQUEST["group_name"];
$num_swimmers = $_REQUEST["num_swimmers"];
$coach_id = $_REQUEST["coach_id"];
$age_range = $_REQUEST["age_range"];
$assistant_1 = $_REQUEST["assistant_1"];
$assistant_2 = $_REQUEST["assistant_2"];

$sql = "select fname FROM coaches WHERE coach_id = " . $coach_id;
$result = $conn->query($sql);
$coaches = $result->fetch_all(MYSQLI_ASSOC);
$fname = $coaches[0]["fname"];

$sql = "update groups set group_name= ?, num_swimmers = ?, coach_id = ?, coach = ?, age_range = ?, assistant_1 = ?, assistant_2 = ? where group_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siissssi",  $group_name, $num_swimmers, $coach_id, $fname, $age_range, $assistant_1, $assistant_2, $group_id);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'groups.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
