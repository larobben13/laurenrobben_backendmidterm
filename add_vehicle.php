<?php include('header.php');?>

<h2>Add a Vehicle</h2>
<div class='row'>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST' id='add_vehicle'>
    <div class='row'>
        <div class='input-field col s4 m3 l1'>
            <input type='number' placeholder='Vehicle Year' id='year' name='year'>
        </div>
        <br>
        <div class='input-field col s8 m6 l4'>
            <input type='text' placeholder='Vehicle Model' id='model' name='model'>
        </div>
        <br>
<div class='row'>
    <div class='input-field col s4 m3 l1'>
        <input type='money' placeholder='Vehicle Price' id='price' name='price' >
    </div>
</div>
<br>
    <div class='row'>
        <label>Type:</label>
        <select name='type' id='type'>
            <?php foreach($types as $vehicle) : ?>
                <option value=<?php echo $vehicle['type_id']?>><?php echo $vehicle['typename']?></option>
                <?php endforeach;?>
            </select>

    <label> Class:</label>
        <select name='class' id='class'>
            <?php foreach($classes as $vehicle) : ?>
                <option value=<?php echo $vehicle['class_id']?>><?php echo $vehicle['classname']?></option>
                <?php endforeach;?>
            </select>
    
    <label> Make:</label>
        <select name='make' id='make'>
            <?php foreach($makes as $vehicle) : ?>
                <option value=<?php echo $vehicle['make_id']?>><?php echo $vehicle['makename']?></option>
                <?php endforeach;?>
            </select>
            </div>
            <br>

        <button class='button1' type='submit' name='action' value='add_vehicle'>
                Add Vehicle
            </button> 
    </form>
</div>

<br>
<br>
<div class='row'>
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='admin'>
    <button class='button2' type='submit' name='action' value='list_vehicles'>
        Vehicle Home
            </button>
            </form>
            </div>
            <?php include('footer.php')?>


