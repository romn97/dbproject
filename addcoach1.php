<?PHP
include "dbconnect.php";

$sql = "SELECT * from families";
$result = $conn->query($sql);
$families = $result->fetch_all(MYSQLI_ASSOC);
?>

<form action="addcoach2.php">
    <label for="fname">First Name:</label></br>
    <input type="text" id="fname" name="fname"></br>
    <label for="birthday">Birthday (YYYY-MM-DD):</label></br>
    <input type="text" id="birthday" name="birthday"></br>
    <label for="alma_mater">Alma Mater:</label></br>
    <input type="text" id="alma_mater" name="alma_mater"></br>
    
    <label for="family_id">Family:</label></br>
    <select id="family_id" name="family_id" >
        <?php
        for($i=0; $i< count($families); $i++)
        {
            echo '<option value = "' . $families[$i]["family_id"] . '">';
            echo $families[$i]["family_id"] . ' ' . $families[$i]["last_name"]. "</option>";
        }
        ?>
    </select> </br>
    
    <input type="submit" value="Submit">
</form>