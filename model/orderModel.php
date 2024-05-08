<?php
include_once("../lib/database.php");

class OrderModel extends Database
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
        // echo "132";

    }
    public function __get($customer_id)
    {
        $sql = "SELECT * from order_detail WHERE customer_id = $customer_id and is_cart = 0";
        $result = self::$link->query($sql);
        return $result;
    }

    public function __getOrder($orderid)
    {
        $sql = "SELECT * from order_detail WHERE id = $orderid";
        $result = self::$link->query($sql);
        return $result;
    }
    public function __getOrderDetail($orderid)
    {
        $sql = "SELECT * from order_has_room WHERE order_id = $orderid";
        $result = self::$link->query($sql);
        return $result;
    }
    public function __getOrderInformation($id)
    {
        $sql = "SELECT apartment_type.name, room_typ.name , room_count,  price, room_count*price as total
                FROM order_has_room,apartment_type,apartment_has_room,room_typ,location,apartment_location
                WHERE order_id = $id
                and order_has_room.apartment_id = apartment_has_room.apartment_id
                and order_has_room.room_id = apartment_has_room.room_id
                and order_has_room.apartment_id = apartment_type.id
                and order_has_room.room_id = room_typ.id;";
        $result = self::$link->query($sql);
        return $result;
    
    }
}
