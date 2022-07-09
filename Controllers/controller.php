<?php
      require __DIR__.'/../Models/dbOperation.php';
      $dbOperation = new DbOperation();

      //Based on inputs from app.js, it calls methods in the Dboperation class. /////////////////////////////
         $received_data = json_decode(file_get_contents("php://input"));
         
      // Returns all users.   //////////////////////////////////////////////////
         if($received_data->action == 'fetchall'){

          echo json_encode($dbOperation->fetchAllUsers());
         }

      // Insert new user to the database. ///////////////////////////////////////
         if($received_data->action == 'insert'){

            $firstName = $received_data->firstName;
            $lastName = $received_data->lastName;
            $job = $received_data->job;
           
            $dbOperation->insertUser($firstName, $lastName, $job);
         }

      // Finds the user by user id and returns it. ///////////////////////
         if($received_data->action == 'fetchSingle'){

          $result = $dbOperation->fetchSingleUser($received_data->id);
            echo json_encode($result);
         }

      // Inserts the updated user data back in to the database. ///////////////////
         if($received_data->action == 'update'){
            
            $firstName = $received_data->firstName;
            $lastName = $received_data->lastName;
            $job = $received_data->job;
            $id = $received_data->hiddenId;
        
            $dbOperation->updateUser($firstName,$lastName,$job,$id);
         }

      // Delete user by user id.  /////////////////////////////////
         if($received_data->action=='delete'){
            $id = $received_data->id;
            $dbOperation->deleteUser($id);
         }
?>