<?php

include_once '../models/DbCon.php';
class TreatmentController 
{   
    private $connection;

    public function __construct(){
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
    }

    public function Insert($emri){
        $sql = "INSERT INTO treatments (name) VALUES (?)";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("s", $emri);
        $statement->execute();
    }

    public function Update($id,$name){
        $sql = "UPDATE treatments SET name='$name' WHERE id=$id";
        $success = $this->connection->query($sql);
        if($success){
           header("location: adminForm.php");
       }
    }

    public function Delete($id){
        $sql = "DELETE FROM treatments WHERE id=$id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        

    }
    public function GetAll(){
        $sql = "SELECT * FROM treatments ORDER BY id DESC";
        $treatments = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if(mysqli_num_rows($treatments) > 0){
            while($row = mysqli_fetch_assoc($treatments)){
                array_push($returnArray, $row);
            }
        }        
        return $returnArray;
    }

    public function ShowAllTreatments($treatments){
        if(count($treatments)>0){
            foreach($treatments as $treatment){
                echo '
                <tr>
                <td>'.$treatment['id'].'</td>
                <td>'.$treatment['name'].'</td>
                <td>
                    <a  href="editTreatmentForm.php?id='.$treatment['id'].'"><button class="edit">Edit</button></a>
                    &nbsp;
                    <a class="delete" onclick=showModal('.$treatment['id'].')><button class="delete" id="delete">Delete</button></a>
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

    public function getTreatmentById($id){
        $sql="SELECT * FROM treatments WHERE id=$id";
        $treatments = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if($treatments){
            while($row = mysqli_fetch_assoc($treatments)){
                array_push($returnArray, $row);
            }     
            return $returnArray[0];

        }else{
            echo'So ka bon';
        }
    
    }

}
