<?PHP
include "dbconnect.php";

$swimmer_id = ltrim(substr($_REQUEST["key"], 0, 4), "0");
$gender = substr($_REQUEST["key"], 4, 1);
$group_name = ltrim(substr($_REQUEST["key"], 5, 30), "1");
$last_name = ltrim(substr($_REQUEST["key"], 35), "1");

$sql = "SELECT * from groups";
$result = $conn->query($sql);
$groups = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SELECT * from families";
$result = $conn->query($sql);
$families = $result->fetch_all(MYSQLI_ASSOC);

$sql = "call upNumSwimmers(?, -1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $group_name);
$stmt->execute();

$sql = "select * from swimmers where swimmer_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $swimmer_id);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upswimmer.php">
    <label for="fname">First Name:</label></br>
    <input type="text" id="fname" name="fname" value="<?php echo $row["fname"];?>"></br>
    <label for="birthday">Birthday (YYYY-MM-DD):</label></br>
    <input type="text" id="birthday" name="birthday" value="<?php echo $row["birthday"];?>"></br>
    
    <label for="gender">Gender:</label></br>
    <select id="gender" name="gender" >
        <?php
            echo '<option value = "M"';
            if($gender == 'M')
                echo ' selected>';
            else
                echo '>';
            echo "M</option>";
            echo '<option value = "F"';
            if($gender == 'F')
                echo ' selected>';
            else
                echo '>';
            echo "F</option>";
        ?>
    </select> </br>
    
    <label for="group_name">Group:</label></br>
    <select id="group_name" name="group_name" >
        <?php
        for($i=0; $i< count($groups); $i++)
        {
            echo '<option value = "' . $groups[$i]["group_name"];
            if($groups[$i]["group_name"] == $row["group_name"])
                echo '" selected>';
            else
                echo '">';
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
    
    <input type="hidden" id="swimmer_id" name="swimmer_id" value="<?php echo $row["swimmer_id"];?>"></br>
    <input type="submit" value="Submit">
</form>
<?php
$conn->close();
?>