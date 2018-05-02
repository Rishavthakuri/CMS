<div class="well">
    <?php
    $query = "SELECT * FROM location";
    $select_location_sidebar = mysqli_query($connection,$query);

    ?>
    <h4>Locations</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                while($row = mysqli_fetch_assoc($select_location_sidebar ))
                {
                    $location_title = $row['location_title'];
                    $location_id = $row['location_id'];
                    echo"<li><a href='location.php?location=$location_id'>{$location_title}</a></li>";

                }
                ?>

            </ul>
        </div>
    </div>
</div>


