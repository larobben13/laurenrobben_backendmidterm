<?php include('header.php');?>

<div class='row'>
    <table class='responsive-table centered'>
        <thead> 
            <th>Edit Vehicle Makes</th>
        </thead>
    <tbody>
        <?php foreach($makes as $make) : ?>
            <tr>
                <td>
                <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='delete_make'>
                <input type='none' name='make' id='make' value='<?php echo $make['makename']; ?>'>
                <button class='button' type='submit' name='action' value='delete_make'>
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
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='add_make'>
    <div class='row'>
            <input type='text' placeholder='Vehicle Make' name='makename' id='makename'>
        </div>
        </div>
        <div class='row'>
            <button class='button9' type='submit' name='action' value='add_make'>
                Add Vehicle Make
        </button>
    </div>
        </form>
        
       
        <br>
        <br>
<div class='row'>
<form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='admin'>
                <button class='button' type='submit' name='action' value='list_vehicles'>
                  Vehicle Home
        </button>
        </form>
        </div>
        <?php include('footer.php');?>