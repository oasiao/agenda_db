<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <!--FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a87bd14a53.js" crossorigin="anonymous"></script>

    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Architects+Daughter&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
    <style>

        body{
            margin: 0;
        }

        .principal{
            display: flex;
            background-color: black;
            color: white;

        }

        a {
            background-color: black;
            color: white;
            text-decoration: none;
            font-family: 'Amatic SC',cursive;
        }

        a:hover{
            background-color: white;
            color: black;
        }

        h1{
            display: flex;
            justify-content: center;
        }

        .logo{
            display: flex;
            align-items: center;
            background-color: #000;
            height: 10vh;
            margin: 3vh;
        }

        .fa-address-book{
            font-size: 5vh;
            color:white;
        }

        .field{
            display: flex;
            gap: 5vh;
            margin-inline: auto;
            font-size: 4vh;
            align-items: center;
        }

    </style>
</head>
<body>

<!--layout del navbar que podemos observar en cada html de la app-->
<div class="principal">
    <div class="logo"><i class="far fa-address-book"></i></div>
    <div class="field">
        <a href="CreateForm.php">ADD CONTACT</a>
        <a href="index.php">SHOW CONTACTS</a>
        <a href="UpdateForm.php">UPDATE CONTACT</a>
        <a href="DeleteForm.php">DELETE CONTACT</a>
    </div>
</div>
</body>
</html>
