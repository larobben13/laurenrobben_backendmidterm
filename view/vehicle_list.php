<main>
   
    
    <div class='row'>
        <select name='typename' id='typename'>
            <option value=0>View All Types</option>
            <?php foreach ($types as $vehicle) : ?>
                <?php if($vehicle['type_id'] == $type) {?>
                    <option value=<?php echo $vehicle['type_id']?>selected><?php echo $vehicle['typename']?></option>
                <?php }else {?>
                    <option value=<?php echo $vehicle['type_id']?>><?php echo $vehicle['typename']?></option>
                <?php } ?>
                <?php endforeach;?>
                </select>
         </div>
         <br>
         <div class='row'>
        <select name='classname' id='classname'>
            <option value=0>View All Classes</option>
            <?php foreach ($classes as $vehicle) : ?>
                <?php if($vehicle['class_id'] == $class) {?>
                    <option value=<?php echo $vehicle['class_id']?>selected><?php echo $vehicle['classname']?></option>
                <?php }else {?>
                    <option value=<?php echo $vehicle['class_id']?>><?php echo $vehicle['classname']?></option>
                <?php } ?>
                <?php endforeach;?>
                </select>  
                
         </div>
         <br>
         <div class='row'>
        <select name='makename' id='makename'>
            <option value=0>View All Makes</option>
            <?php foreach ($makes as $vehicle) : ?>
                <?php if($vehicle['make_id'] == $make) {?>
                    <option value=<?php echo $vehicle['make_id']?>selected><?php echo $vehicle['makename']?></option>
                <?php }else {?>
                    <option value=<?php echo $vehicle['make_id']?>><?php echo $vehicle['makename']?></option>
                <?php } ?>
                <?php endforeach;?>
                </select>
         </div>
<br>
         <div class='row'>
        <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST'>
            <div class='row'>
                Sort By: 
                <label for='price'>
                    <?php if($sortBy == 'price') {?>
                     <input type='radio' name="sortBy" id='price' value='price' checked>
                     <?php }else{ ?>
                        <input type='radio' name='sortBy' id='price' value='price'>
                   <?php  } ?>
                   <span>Price</span>
                     </label>      
            <label for='year'>
                <?php if($sortBy == 'year') {?>
                    <input type='radio' name='sortBy' id='year' value='year' checked>
    <?php }else{?>
    <input type='radio' name='sortBy' id='year' value='year'>
    <?php }?>
    <span>Year</span>
    </label>
   <button class='button' type="submit"> Go </button> 
    </div>
    </div>
            
            </div>
        </form>
    </div>
</div>


<table class='responsive-table centered'>
    <?php if(!$vehicles) {?>
<thead>
    <tr>
        <h4>There were no vehicles found with these parameters, try again!</h4>
    </tr>
    </thead>
<?php }else{?>
    <thead>
        <tr>
            <th>Year</th>
            <th>Type</th>
            <th>Model</th>
            <th>Make</th>
            <th>Class</th>
            <th>Price</th>
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
                
                
        </tr>
        <?php endforeach ; ?>
        </tbody>
<?php }?>
        </table>

</main>
<?php include('footer.php');?>
