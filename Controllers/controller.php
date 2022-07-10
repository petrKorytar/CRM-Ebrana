<?php
      require __DIR__.'/../Models/dbOperation.php';
      $dbOperation = new DbOperation();

      //Based on inputs from app.js, it calls methods in the Dboperation class. /////////////////////////////
         $received_data = json_decode(file_get_contents("php://input"));
         
         switch($received_data->action){
            case 'fetchall': // Returns all users.
               echo json_encode($dbOperation->fetchAllUsers());
               break;

            case 'insert': // Insert new user to the database.
               $firstName = $received_data->firstName;
               $lastName = $received_data->lastName;
               $job = $received_data->job;
           
               $dbOperation->insertUser($firstName, $lastName, $job);
               break;

            case 'fetchSingle': // Finds the user by user id and returns it.
               $result = $dbOperation->fetchSingleUser($received_data->id);
               echo json_encode($result);
               break;

            case 'update': // Inserts the updated user data back in to the database.
               $firstName = $received_data->firstName;
               $lastName = $received_data->lastName;
               $job = $received_data->job;
               $id = $received_data->hiddenId;
        
               $dbOperation->updateUser($firstName,$lastName,$job,$id);
               break;

            case 'delete': // Delete user by user id.
               $id = $received_data->id;
               $dbOperation->deleteUser($id);
               break;
         }
?>