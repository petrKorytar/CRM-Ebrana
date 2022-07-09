<?php

    class DbOperation{

        // Connection to database.
        public function dbConnection(){
            $serverName = 'localHost';
            $userName = 'root';
            $password = '';
            $dbName = 'users';

            return new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        }

        // Returns all users as an array.
        public function fetchAllUsers(){

            $allUsers =  $this->dbConnection()->query("SELECT * FROM my_users ORDER BY id DESC");
            while($row = $allUsers->fetch(PDO::FETCH_ASSOC)){
                $data[]=$row;
            }
            return $data;
         }

         // Insert new user to the database.
        public function insertUser($firstName, $lastName, $job){

            $this->dbConnection()->query("INSERT INTO my_users (firstName, lastName, job)
            VALUES ('$firstName', '$lastName', '$job')");
         }

         // Finds the user by user id and returns it as an array.
        public function fetchSingleUser($userId){
            
            $searchedUser =  $this->dbConnection()->query("SELECT * FROM my_users WHERE id = '$userId'");
            $result = $searchedUser->fetchAll();

            foreach($result as $row){
             $data['id'] = $row['id'];
             $data['firstName'] = $row['firstName'];
             $data['lastName'] = $row['lastName'];
             $data['job'] = $row['job'];
            }
            return $data;   
         }

         // Inserts the updated user data back in to the database.
        public function updateUser($firstName, $lastName, $job,$id){
            $this->dbConnection()->query("UPDATE my_users SET firstName ='$firstName',
            lastName ='$lastName', job ='$job' WHERE id =$id");
         }

         // Delete user by user id.
        public function deleteUser($id){
            $this->dbConnection()->query("DELETE FROM my_users WHERE id =$id");
         }
    }
?>