<?php

include_once '../models/DbCon.php';
class BookedItemController 
{   
    private $connection;

    public function __construct(){
        $obj = new DBConnection();
        $this->connection = $obj->getConnection();
    }

    public function Insert($user_id,$item_id,$date){
        $sql = "INSERT INTO booked_items (user_id,item_id,date) VALUES (?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param("iis", $user_id,$item_id,$date);
        $statement->execute();
    }

    public function GetAll(){
        $sql = "SELECT booked_items.id,users.name,users.lastname,treatments_item.treatment,date FROM booked_items JOIN users ON users.id=booked_items.user_id JOIN treatments_item ON  treatments_item.id=booked_items.item_id ORDER BY booked_items.id DESC";
        $items = mysqli_query($this->connection,$sql);
        $returnArray = array();
        if(mysqli_num_rows($items) > 0){
            while($row = mysqli_fetch_assoc($items)){
                array_push($returnArray, $row);
            }
        }        
        return $returnArray;
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

    public function ShowAll($items){
        if(count($items)>0){
            foreach($items as $item){
                echo '
                <tr>
                <td>'.$item['id'].'</td>
                <td>'.$item['name'].'</td>
                <td>'.$item['lastname'].'</td>
                <td>'.$this->treatmentName($item['treatment']).'</td>
                <td>'.$item['date'].'</td>
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
}