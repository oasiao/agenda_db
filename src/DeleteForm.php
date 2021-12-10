<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        h3{
            margin-top: 10vh;
            font-family: 'Architects Daughter', cursive;
        }

        .form > input[type="text"], .form > input[type="submit"]{
            width: 50vh;
            font-family: 'Architects Daughter';
        }
    </style>
</head>
<body>
<?php
include 'Controller.php';
include "layout.php";

$delete = new Controller();

if (isset($_POST['phone'])){
    $phone = $_POST['phone'];

    /*si da click al botón de delete, borrará el contacto que coincida con el input*/
    if(isset($_POST['delete'])){
        if ($delete->delete($phone)){
            header('Location: index.php');
        }
        else {
            echo "This contact doesn't exist.";
            back();
        }
    }
    else if(isset($_GET['back'])){
        displayForm();
    }
}
else {
    displayForm();
}

?>

<?php
function displayForm()
{
    ?>
        <div class="container">
            <form class="form" method="post">
                <h3>DELETE A CONTACT</h3>
                <input type="text" name="phone" placeholder="Phone"/>
                <input type="submit" name="delete" value="Delete contact"/>
            </form>
        </div>


    <?php
}

function back()
{?>
    <form>
        <input type="submit" name="back" value="Go back"/>
    </form>
    <?php
}

?>
</body>
</html>
