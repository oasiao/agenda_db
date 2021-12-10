<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <!-- C S S -->
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

include "Controller.php";
include "layout.php";

$create = new Controller();

/*Comprueba que existen los valores: name, lastname, surname y phone*/
if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['surname']) && isset($_POST['phone'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    if(isset($_POST['create'])){
        /*si se cumplen los requerimientos y no se encuentra en la base de datos, se añadirá el nuevo contacto.*/
        if ($create -> create($name,$lastname,$surname,$phone)){
            header('Location: index.php');
        }
        else {

            /*Si no cumple con los requerimientos anteriores, entonces te dirá que lo vuelvas a intentar.*/
            echo "Try again!";
            displayForm();
        }

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
            <h3>ADD A CONTACT</h3>
            <input type="text" name="name" placeholder="Name"/>
            <input type="text" name="lastname" placeholder="Lastname"/>
            <input type="text" name="surname" placeholder="Surname"/>
            <input type="text" name="phone" placeholder="Phone"/>
            <input type="submit" name="create" value="Add Contact"/>
        </form>
    </div>

    <?php
}

?>
</body>
</html>
