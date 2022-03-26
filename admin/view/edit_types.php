<?php include('header.php');?>

<div class='row'>
    <table class='responsive-table centered'>
        <thead> 
            <th>Edit Vehicle Types</th>
        </thead>
    <tbody>
        <?php foreach($types as $type) : ?>
            <tr>
                <td>
                <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='delete_type'>
                <input type='text' name='type' id='type' value='<?php echo $type['typename']; ?>'>
                <button class='button8' type='submit' name='action' value='delete_type'>
                    DELETE 
        </button>
        </form>
        </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
<br>
    <div class='row'>
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='add_type'>
    <div class='row'>
            <input type='text' placeholder='Vehicle Type' name='typename' id='typename'>
        </div>
        <div class='row'>
            <button class='button9' type='submit' name='action' value='add_type'>
                Add Vehicle Type
        </button>
    </div>
        </form>
        </div>
       <br>
       <br>
<div class='row'>
<form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='admin'>
                <button class='button10' type='submit' name='action' value='list_vehicles'>
                  Vehicle Home
        </button>
        </form>
        </div>
        <?php include('footer.php');?>