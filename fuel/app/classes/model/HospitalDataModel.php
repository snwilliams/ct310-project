<?php
namespace Model;
use \DB;

class HospitalDataModel extends \Model {

    public static function get_hospitals($from, $amount) {
        return DB::query(
            "SELECT Provider_Name, Provider_State, Provider_Id FROM 'medicare' LIMIT $amount OFFSET $from", DB::SELECT
        )->execute()->as_array();
    }

    public static function get_drgs($from, $amount) {
        $data =  DB::query(
            "SELECT DRG_Definition FROM 'medicare' LIMIT $amount OFFSET $from", DB::SELECT
        )->execute()->as_array();
        $to_return = array();
        foreach ($data as $row) {
            $splits = explode($row['DRG_Definition'], '-');
            $to_return['DRG_Number'] = trim($splits[0]);
            $to_return['DRG_Definition'] = trim($splits[1]);
        }
        return $to_return;
    }
  
}
?>