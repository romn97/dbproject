<?PHP
include "dbconnect.php";

$sql = "SELECT * from coaches";
$result = $conn->query($sql);
$coaches = $result->fetch_all(MYSQLI_ASSOC);

$sql = "select * from groups where group_id = ?";

$group_id = $_REQUEST["group_id"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $group_id);

$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<form action="upgroup.php">
    <label for="group_name">Group Name:</label></br>
    <input type="text" id="group_name" name="group_name" value="<?php echo $row["group_name"];?>"></br>
    <label for="num_swimmers">Number of Swimmers:</label></br>
    <input type="text" id="num_swimmers" name="num_swimmers" value="<?php echo $row["num_swimmers"];?>"></br>
    
    <label for="coach_id">Coach:</label></br>
    <select id="coach_id" name="coach_id" >
        <?php
        for($i=0; $i< count($coaches); $i++)
        {
            echo '<option value = "' . $coaches[$i]["coach_id"];
            if($coaches[$i]["fname"] == $row["coach"])
                echo '" selected>';
            else
                echo '">';
            echo $coaches[$i]["fname"] . "</option>";
        }
        ?>
    </select> </br>
    
    <label for="assistant_1">Assistant 1:</label></br>
    <select id="assistant_1" name="assistant_1" >
        <?php
        for($i=0; $i< count($coaches); $i++)
        {
            echo '<option value = "' . $coaches[$i]["fname"];
            if($coaches[$i]["fname"] == $row["assistant_1"])
                echo '" selected>';
            else
                echo '">';
            echo $coaches[$i]["fname"] . "</option>";
        }
        echo '<option value = NULL>None</option>';
        ?>
    </select> </br>
    
    <label for="assistant_2">Assistant 2:</label></br>
    <select id="assistant_2" name="assistant_2" >
        <?php
        for($i=0; $i< count($coaches); $i++)
        {
            echo '<option value = "' . $coaches[$i]["fname"];
            if($coaches[$i]["fname"] == $row["assistant_2"])
                echo '" selected>';
            else
                echo '">';
            echo $coaches[$i]["fname"] . "</option>";
        }
        echo '<option value = NULL>None</option>';
        ?>
    </select> </br>
    
    <label for="age_range">Age Range:</label></br>
    <input type="text" id="age_range" name="age_range" value="<?php echo $row["age_range"];?>"></br>
    <input type="hidden" id="group_id" name="group_id" value="<?php echo $row["group_id"];?>"></br>
    <input type="submit" value="Submit">
</form>
<?php
include "swimmers.php";
$conn->close();
?>