<?php
include_once '../lib/database.php';

class Location_Model
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    // public function get_category_by_object($object)
    // {
    //     $query = "SELECT * FROM `category` WHERE object = '$object';";
    //     $result = $this->database->select($query);
    //     if ($result) {
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } else {
    //         return array();
    //     }

    // }

    public function get_location_by_id($id)
    {
        $query = "SELECT * FROM `location` WHERE id = $id;";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }
        return null;
    }
    public function get_all_location()
    {
        $query = "SELECT * FROM `location` ";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return null;
    }

    public function get_apartment_by_id($location_id)
    {
        $query = "SELECT name FROM `location` WHERE id = $location_id"; // Chỉ lấy cột 'name'
        $result = $this->database->select($query);
    
        if ($result && $result->num_rows > 0) {
            // Lấy dòng đầu tiên và cột 'name' từ kết quả trả về
            $location = $result->fetch_assoc();
            return $location['name']; // Trả về giá trị của cột 'name'
        } 
        return null;
    }
    // lay bang apartment
    public function get_all_apartment($id)
    {
        $query = "SELECT * FROM `apartment` WHERE id = $id";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }
        return null;
    }
    public function get_star_by_id($apartment_id)
    {
        $query = "SELECT * FROM `rating` WHERE id = $apartment_id";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }
        return null;
    }
    public function get_apartment_has_room($apartment_id)
    {
        $query = "SELECT * FROM `apartment_has_room` WHERE apartment_id = $apartment_id";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
    public function get_category_by_id($location_id)
    {
        $query = "SELECT * FROM `category` WHERE location_id = $location_id";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
    // apartment_has_room
    public function get_roomtyp_by_id($id)
    {
        $query = "SELECT * FROM `room_typ` WHERE id = $id";
        $result = $this->database->select($query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
}