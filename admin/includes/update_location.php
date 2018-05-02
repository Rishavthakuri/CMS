<form action="" method="post">
    <div class="form-group">
        <label for="location_title">Update Location</label>
        <?php
        if(isset($_GET['edit']))
        {
            $location_id = $_GET['edit'];
            $query = "SELECT * FROM location WHERE location_id = $location_id";
            $select_location_id = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_location_id)) {
                $location_id = $row['location_id'];
                $location_title = $row['location_title'];
            }
            ?>
            <input value="<?php if(isset($location_title)){echo $location_title;}  ?>" class="form-control" type="text" name="location_title">

            <?php
        } ?>

        <?php // Update query : Categories

        if(isset($_POST['update_location'])) {
            $the_location_title = $_POST['location_title'];
            $query = "UPDATE location SET location_title ='{$the_location_title}' WHERE location_id={$location_id}";
            $update_query = mysqli_query($connection, $query);
            if(!$update_query){
                die("Query failed".mysqli_error($connection));
            }
        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_location" value="Update Location">
    </div>

</form>