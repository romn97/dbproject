<?PHP
include "dbconnect.php";

$sql = "select * from families where family_id = ?";

$family_id = $_REQUEST["family_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $family_id);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upfamily.php">
    <label for="last_name">Last Name:</label></br>
    <input type="text" id="last_name" name="last_name" value="<?php echo $row["last_name"];?>"></br>
    <label for="p1_first">Parent 1 First Name:</label></br>
    <input type="text" id="p1_first" name="p1_first" value="<?php echo $row["p1_first"];?>"></br>
    <label for="p2_first">Parent 2 First Name (Optional):</label></br>
    <input type="text" id="p2_first" name="p2_first" value="<?php echo $row["p2_first"];?>"></br>
    <label for="street">Street Address:</label></br>
    <input type="text" id="street" name="street" value="<?php echo $row["street"];?>"></br>
    <label for="city">City:</label></br>
    <input type="text" id="city" name="city" value="<?php echo $row["city"];?>"></br>
    <label for="state">State:</label></br>
    <input type="text" id="state" name="state" value="<?php echo $row["state"];?>"></br>
    <input type="hidden" id="family_id" name="family_id" value="<?php echo $row["family_id"];?>"></br>
    <input type="submit" value="Submit">
</form>