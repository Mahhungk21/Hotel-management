<?php
include_once __DIR__.'/../../lib/database.php';
include_once __DIR__.'/color.php';

class Color_Model
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function get_color_list($ids)
    {
        $query = "SELECT * FROM `color`;";
        $result = $this->database->select($query);
        $color_table = $result->fetch_all(MYSQLI_ASSOC);
        $color_list = array();
        foreach ($color_table as $row) {
            if (str_contains($ids, $row["id"])) {
                $color = new Color($row['id'], $row['color_name'], $row['color_img'], true);
            } else {
                $color = new Color($row['id'], $row['color_name'], $row['color_img'], false);
            }

            array_push($color_list, $color);
        }
        return $color_list;
    }

    public function get_color_list_by_ids($color_list)
    {
        $filter_color_list = array();
        foreach ($color_list as $color) {
            if ($color->getColorState()) {
                array_push($filter_color_list, $color);
            }
        }
        return $filter_color_list;
    }

    public function remove_color($color_list, $color)
    {
        $color_list = explode(',', $color_list);
        $color = array($color);
        $remove_color = array_diff($color_list, $color);
        return implode(',', $remove_color);
    }

    // if search to result, return a list, otherwise return []
    public function get_color_type_list(){
        $query = "SELECT * FROM `color`";
        $result = $this->database->select($query);
        if ($result == false){
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}