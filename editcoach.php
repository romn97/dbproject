<?PHP
include "dbconnect.php";

$sql = "SELECT * from families";
$result = $conn->query($sql);
$families = $result->fetch_all(MYSQLI_ASSOC);

$sql = "select * from coaches where coach_id = ?";

$coach_id = $_REQUEST["coach_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $coach_id);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upcoach.php">
    <label for="fname">First Name:</label></br>
    <input type="text" id="fname" name="fname" value="<?php echo $row["fname"];?>"></br>
    <label for="birthday">Birthday (YYYY-MM-DD):</label></br>
    <input type="text" id="birthday" name="birthday" value="<?php echo $row["birthday"];?>"></br>
    <label for="alma_mater">Alma Mater:</label></br>
    <input type="text" id="alma_mater" name="alma_mater" value="<?php echo $row["alma_mater"];?>"></br>
    
    <label for="family_id">Family:</label></br>
    <select id="family_id" name="family_id" >
        <?php
        for($i=0; $i< count($families); $i++)
        {
            echo '<option value = "' . $families[$i]["family_id"];
            if($families[$i]["family_id"] == $row["family_id"])
                echo '" selected>';
            else
                echo '">';
            echo $families[$i]["family_id"] . ' ' . $families[$i]["last_name"]. "</option>";
        }
        ?>
    </select> </br>
    
    <input type="hidden" id="coach_id" name="coach_id" value="<?php echo $row["coach_id"];?>"></br>
    <input type="submit" value="Submit">
</form>