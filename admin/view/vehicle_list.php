<?php include('header.php'); ?>

    <div class='row'>
        <p class='input-field col s3'>
        <label> Vehicle Type: </label>
            <select name='type' id='type'>
                <option value=0>All Types</option>
                <?php foreach ($types as $vehicle) : ?>
                <?php if($vehicle['typeID'] == $type) { ?>
                <option value=<?php echo $vehicle['type_id']?>selected><?php echo $vehicle['typename']?></option>
                <?php } else { ?>
                    <option value=<?php echo $vehicle['type_id']?>><?php echo $vehicle['typename']?></option>
               <?php } ?>
               <?php endforeach;?>
            </select>
                </div>
    <div class='row'>
        <p class='input-field col s3'>
        <label> Vehicle Class: </label>
            <select name='class' id='class'>
                <option value=0>All Classes</option>
                <?php foreach ($classes as $vehicle) : ?>
                <?php if($vehicle['class_id'] == $class) { ?>
                <option value=<?php echo $vehicle['class_id']?>selected><?php echo $vehicle['classname']?></option>
                <?php } else { ?>
                    <option value=<?php echo $vehicle['class_id']?>><?php echo $vehicle['classname']?></option>
               <?php } ?>
               <?php endforeach;?>
            </select>
            
                </div>
        <div class='row'>
        <p class='input-field col s3'>
        <label> Vehicle Make: </label>
            <select name='make' id='make'>
                <option value=0>All Makes</option>
                <?php foreach ($makes as $vehicle) : ?>
                <?php if($vehicle['make_id'] == $make) { ?>
                <option value=<?php echo $vehicle['make_id']?>selected><?php echo $vehicle['makename']?></option>
                <?php } else { ?>
                    <option value=<?php echo $vehicle['make_id']?>><?php echo $vehicle['makename']?></option>
               <?php } ?>
               <?php endforeach;?>
            </select>
            
        </div>
        <div class='row'> 
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
        <div class='row'>
            Sort By:
            <label for='year'>
                <?php if($sortBy == 'year') {?>
                    <input type='radio' name='sortBy' id='year' value='year' checked>
                <?php } else { ?>
                    <input type='radio' name='sortBy' id='year' value='year'>
                <?php } ?>
                <span>Year</span>
            </label>
            <label for='price'>
                <?php if($sortBy == 'price') {?>
                    <input type='radio' name='sortBy' id='price' value='price' checked>
                <?php } else { ?>
                    <input type='radio' name='sortBy' id='price' value='price'>
                <?php } ?>
                <span>Price</span>
            </label>
        <button class='button2' type='submit'> Go</submit>
    </div>
        
                </div>
                </form>
                </div>
                </div>
<table class='responsive-table centered'>
    <?php if(!$vehicles) { ?>
        <thead>
            <tr>
                <h4> No Vehicles were Found! Please try again with a different search.</h4>
            </tr>
        </thead>
        <?php } else { ?>
        <thead>
            <tr>
                <th>Year</th>
                <th>Model</th>
                <th>Price</th>
                <th>Type</th>
                <th>Class</th>
                <th>Make</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vehicles as $vehicle) : ?>
                <tr>
                    <td><p><?php echo $vehicle['year']?></p></td>
                    <td><p><?php echo $vehicle['model']?></p></td>
                    <td><p class='money'><?php echo $vehicle['price']?></p></td>
                    <td><p><?php echo $vehicle['typename']?></p></td>
                    <td><p><?php echo $vehicle['classname']?></p></td>
                    <td><p><?php echo $vehicle['makename']?></p></td>
                    <td>
                        <form action='<?php echo $_SERVER['PHP_SELF']?>'method='POST' id='delete_item'>
                        <input type='hidden' name='vehicleID' id='vehicleID' value='<?php echo $vehicle['vehicleID'];?>'>
                        <button class='button4' type='submit' name='action' value='delete_vehicle'>
                            <i>Cancel</i>
             </form>  
            </td>
            </tr>
            <?php endforeach ; ?>
            </tbody>  
            <?php } ?>
            </ul>
            </table>
        <div class='row'>
        <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='admin'>
        <button class='button4' type='submit' name='action' value='add_vehicle_form'>
            Add a Vehicle
            </button>
        <button class='button5' type='submit' name='action' value='edit_types_form'>
            Edit Vehicle Types
            </button>
        <button class='button6' type='submit' name='action' value='edit_classes_form'>
        Edit Vehicle Classes
            </button>
        <button class='button7' type='submit' name='action' value='edit_makes_form'>
        Edit Vehicle Makes
            </button>
            </form>
            </div>
            <?php include('footer.php');?>