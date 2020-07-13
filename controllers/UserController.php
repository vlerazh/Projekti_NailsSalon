<?php

include_once '../models/DbCon.php';
class UserController 
{   
    private $connection;

    public function __construct(){
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
    }

    public function Insert($emri, $mbiemri, $email,$pw){
        $sql = "INSERT INTO users (name,lastname,email,password) VALUES (?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("ssss", $emri,$mbiemri, $email,$pw);
        $statement->execute();
    }

    public function Update($id,$name,$lastname,$email,$password){
         $sql = "UPDATE users SET name='$name', lastname='$lastname', email='$email', password='$password' WHERE id=$id";
         $success = $this->connection->query($sql);
         if($success){
            header("location: adminForm.php");
        }
    }

    public function Delete($id){
        $sql = "DELETE FROM users WHERE id=$id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        
    }
    public function GetAll(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $users = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if(mysqli_num_rows($users) > 0){
            while($row = mysqli_fetch_assoc($users)){
                array_push($returnArray, $row);
            }
        }        
        return $returnArray;
    }

    public function ShowAllUsers($users){
        if(count($users)>0){
            foreach($users as $user){
                echo '
                <tr>
                <td>'.$user['id'].'</td>
                <td>'.$user['name'].'</td>
                <td>'.$user['lastname'].'</td>
                <td>'.$user['email'].'</td>
                <td>'.$user['is_admin'].'</td>
                <td>
                    <a  href="editUserForm.php?id='.$user['id'].'"><button class="edit">Edit</button></a>
                    &nbsp;
                    <a class="delete" onclick=showModal('.$user['id'].')><button class="delete" id="delete">Delete</button></a>
                </td>
                </tr>
                ';
            }
        }else{
            echo '
                <tr>
                <td colspan="6">No data </td>
                </tr>';
          }
        
    }

    public function GetUserForLogIn($name,$pw){

        $sql = "SELECT * FROM users WHERE name = '$name' AND password='$pw'";
        $users = mysqli_query($this->connection,$sql);
        $user = mysqli_fetch_assoc($users);
        session_start();
        if($users->num_rows > 0){
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin'];
            
            return true;
        }
    
        session_unset();
        session_destroy();
    
        return false;
    }

    public function getUserById($id){
        $sql="SELECT * FROM users WHERE id=$id";
        $users = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if($users){
            while($row = mysqli_fetch_assoc($users)){
                array_push($returnArray, $row);
            }     
            return $returnArray[0];

        }else{
            echo'So ka bon';
        }
    }

}
