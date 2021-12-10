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

$update = new Controller();

/*Con los siguientes issets, comprueba que existen: "name", "lastname", "surname" y "phone. */
if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['surname']) && isset($_POST['phone'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    if(isset($_POST['update'])) {
        /*Si le damos click al botón update, coge los valores: name, lastname, surname y phone y si cumple
        con los requerimientos, modificará el contacto y te llevará  a la página principal
        (donde muestra todos los contactos)*/
        if ($update->update($name, $lastname, $surname, $phone)){
            header("Location: index.php");
        }
        else{
            /*Si no cumple con los requerimientos, mostrará un alert*/
            echo "The phone number you want to update doesn't exist. Do you want to register it?";
            alert();
        }
    }
}
else {
    displayForm();
}

/*ALERT*/
if (isset($_POST['yes'])){
    /* Si da a yes, te llevará a la página para crear un contacto */
    header("Location: CreateForm.php");

}
else if(isset($_POST['no'])){
    /* Si da a no, te llevará a la página de "show contacts" */
    header("Location: index.php");
}
else if(isset($_POST['back'])){
    /* Si da a back, te llevará a la página de update */
    header("Location: UpdateForm.php");
}

?>

<?php
function displayForm()
{
    ?>

    <div class="container">
        <form class="form" method="post">
            <h3>UPDATE A CONTACT</h3>
            <input type="text" name="name" placeholder="Name"/>
            <input type="text" name="lastname" placeholder="Lastname"/>
            <input type="text" name="surname" placeholder="Surname"/>
            <input type="text" name="phone" placeholder="Phone"/>
            <input type="submit" name="update" value="Update contact"/>
        </form>
    </div>
    <?php
}

function alert()
{?>
<form method="post">
    <input type="submit" name="yes" value="Yes"/>
    <input type="submit" name="no" value="No"/>
    <input type="submit" name="back" value="Go back"/>
</form>
<?php
}
?>
</body>
</html>
