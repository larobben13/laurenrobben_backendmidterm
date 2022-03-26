<?php include('header.php');?>

<div class='row'>
    <table class='responsive-table centered'>
        <thead> 
            <th>Edit Vehicle Classes</th>
        </thead>
    <tbody>
        <?php foreach($classes as $class) : ?>
            <tr>
                <td>
                <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='delete_class'>
                <input type='text' name='class' id='class' value='<?php echo $class['classname']; ?>'>
                <button class='button' type='submit' name='action' value='delete_class'>
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
    <form action='<?php echo $_SERVER['PHP_SELF']?>' method='POST' id='add_class'>
    <div class='row'>
        
            <input type='text' placeholder='Vehicle Class' name='classname' id='classname'>
        </div>
        <div class='row'>
            <button class='button9' type='submit' name='action' value='add_class'>
                Add Vehicle Class
        </button>
    </div>
        </form>
        </div>
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