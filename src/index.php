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

    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Architects+Daughter&display=swap" rel="stylesheet">

    <style>
        h1{
            font-family: 'Architects Daughter', cursive;
            margin-bottom: -5vh;
        }

        table{
            font-family: 'Architects Daughter',cursive;
            font-size: 3vh;
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
        }

    </style>
</head>
<body>
<?php

include 'Controller.php';
include "layout.php";

$read = new Controller();

?>
<div class="container">
    <!--Nos muestra todos los contactos que aparecen en la base de datos que he creado desde 0-->
    <h1>MY CONTACTS</h1>
    <?php
    /* llamamos la función read() que se encuentra en la clase Controller */
    echo $read->read();
    ?>
</div>
</body>
</html>
