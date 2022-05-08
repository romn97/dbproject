<?PHP
include "dbconnect.php";

$sql = "SELECT * from groups";
$result = $conn->query($sql);
$groups = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * from families";
$result = $conn->query($sql);
$families = $result->fetch_all(MYSQLI_ASSOC);
?>

<form action="addswimmer2.php">
    <label for="fname">First Name:</label></br>
    <input type="text" id="fname" name="fname"></br>
    <label for="birthday">Birthday (YYYY-MM-DD):</label></br>
    <input type="text" id="birthday" name="birthday"></br>
    
    <label for="gender">Gender:</label></br>
    <select id="gender" name="gender" >
        <?php
            echo '<option value = "M">';
            echo "Male</option>";
            echo '<option value = "F">';
            echo "Female</option>";
        ?>
    </select> </br>
    
    <label for="group_name">Group:</label></br>
    <select id="group_name" name="group_name" >
        <?php
        for($i=0; $i< count($groups); $i++)
        {
            echo '<option value = "' . $groups[$i]["group_name"] . '">';
            echo $groups[$i]["group_name"] . "</option>";
        }
        ?>
    </select> </br>
    
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
    
    <input type="submit" value="Submit">
</form>