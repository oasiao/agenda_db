<?php

include "Database/Connection.php";

class Controller
{

    private function getConnection(){
        $connection = new Connection();
        return $connection->getConnection();
    }

    public function create($name,$lastname,$surname,$phone){
        $connection = $this->getConnection();
        try {
            $existe = false;

            /**
             * Recorremos la base de datos para mirar si el contacto existe
             */
            foreach ($connection->pg_query("SELECT PHONE FROM oasiao_agenda_db.public.contacts") as $contact) {
                if ($contact['PHONE'] === $phone) {
                    $existe = true; //si coincide alguno, entonces retornamos true
                    break;
                }
            }

            $query = "INSERT INTO oasiao_agenda_db.public.contacts (NAME, LASTNAME, SURNAME, PHONE) VALUES ('$name','$lastname','$surname','$phone')";
            if ($existe === false) {
                $connection->exec($query);
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error in adding a new contact!";
            die();
        }
    }

    public function read(){
        $connection = $this->getConnection();
        $output = "<table border 1px solid style='margin: 10vh;'><tr>";
        $output .= "<th>Name</th><th>Lastname</th><th>Surname</th><th>Phone</th></tr>";
        foreach ($connection->query("SELECT * FROM oasiao_agenda_db.contacts") as $contact) {
            $output .= "<tr>";
            $output .= '<th>' . $contact['NAME'] . '</th>';
            $output .= '<th>' . $contact['LASTNAME'] . '</th>';
            $output .= '<th>' . $contact['SURNAME'] . '</th>';
            $output .= '<th>' . $contact['PHONE'] . '</th>';
            $output .= "</tr>";
        }
        $output .= "</table>";
        return $output;
    }

    public function update($name,$lastname,$surname,$phone){
        $connection = $this->getConnection();
        try {


            $existe = false;

            foreach ($connection->query("SELECT * FROM oasiao_agenda_db.contacts") as $contact) {
                if ($contact['PHONE'] === $phone) {
                    $existe = true;
                    break;
                }
            }

            $query = "UPDATE oasiao_agenda_db.contacts SET NAME = '$name', LASTNAME = '$lastname', SURNAME = '$surname', PHONE = '$phone' WHERE PHONE = '$phone'";
            $connection->exec($query);


            if ($existe){
                return true; //si no existe, enviamos un mensaje de "Bien hecho!"
            }
            else{
                return false; //si existe, nos mostrará un mensaje de error
            }


        } catch (PDOException $e) {
            echo "Error in updating contact!";
            die();
        }
    }

    public function delete($phone){
        $connection = $this->getConnection();
        try {
            $existe = false;

            foreach ($connection->query("SELECT PHONE FROM oasiao_agenda_db.contacts") as $contact) {
                if ($contact['PHONE'] === $phone) {
                    $existe = true;
                    break;
                }
            }

            $query = "DELETE FROM oasiao_agenda_db.contacts WHERE PHONE = '$phone'";


            if ($existe === true) {
                $connection->exec($query);
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error in updating contact!";
            die();
        }

    }


}