<?php

include_once '../models/DbCon.php';
class ItemController 
{   
    private $connection;

    public function __construct(){
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
    }

    public function Insert($emri, $cmimi, $koha,$t_id,$img_url){
        $sql = "INSERT INTO treatments_item (name,price,time,treatment,img_url) VALUES (?,?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("sdiis", $emri, $cmimi, $koha,$t_id,$img_url);
        $statement->execute();
    }

    public function Update($id,$emri,$cmimi,$koha,$t_id){
        $sql = "UPDATE treatments_item SET name='$name', price=$cmimi, time=$koha, treatment=$t_id WHERE id=$id";
        $success = $this->connection->query($sql);
        if($success){
           header("location: adminForm.php");
       }
    }

    public function Delete($id){
        $sql = "DELETE FROM treatments_item WHERE id=$id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(); 

    }
    public function GetAll(){
        $sql = "SELECT * FROM treatments_item ORDER BY id DESC";
        $items = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if(mysqli_num_rows($items) > 0){
            while($row = mysqli_fetch_assoc($items)){
                array_push($returnArray, $row);
            }
        }        
        return $returnArray;
    }

    public function ShowAllItems($items){
        if(count($items)>0){
            foreach($items as $item){
                echo '
                <tr>
                <td>'.$item['id'].'</td>
                <td>'.$item['name'].'</td>
                <td>'.$item['price'].'</td>
                <td>'.$item['time'].'</td>
                <td>'.$this->treatmentName($item['treatment']).'</td>
                <td><img src="'.$item['img_url'].'" class="img"/></td>
                <td>
                    <a  href="editItemForm.php?id='.$item['id'].'"><button class="edit">Edit</button></a>
                    &nbsp;
                    <a class="delete" onclick=showModal('.$item['id'].')><button class="delete" id="delete">Delete</button></a>
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

    public function treatmentName($t_id){
        $sql = "SELECT name FROM treatments WHERE id=$t_id";
        $treatments = mysqli_query($this->connection,$sql);
        $name;
        while($row = mysqli_fetch_assoc($treatments)){
            $name = $row['name'];
        }
        return $name;
    }

    public function getItemByTreatmentId($id){
        
        $sql = "SELECT * FROM treatments_item WHERE treatment=$id";
        $treatments = mysqli_query($this->connection,$sql);
        $returnArray = array();
        while($row = mysqli_fetch_assoc($treatments)){
            array_push($returnArray, $row);
        }
        return $returnArray;
    }

    public function getItemById($id){
        $sql="SELECT * FROM treatments_item WHERE id=$id";
        $items = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if($items){
            while($row = mysqli_fetch_assoc($items)){
                array_push($returnArray, $row);
            }     
            return $returnArray[0];

        }else{
            echo'So ka bon';
        }
    }

}
