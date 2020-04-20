<?php

namespace Model;
use \DB;

class OurHospitalModel extends \Model {

    public static function get_hospitals(){

        return DB::query(
            "SELECT DISTINCT provider_id, provider_name, provider_street_address, provider_city, provider_state, hospital_referral_region FROM `medicare`", DB::SELECT
        )->execute()->as_array();
    }

   public static function get_drg(){

        return DB::query(
            "SELECT DISTINCT DRG_Number, DRG_Description FROM `medicare`", DB::SELECT)->execute()->as_array();



//        $data = DB::query("SELECT DISTINCT DRG_Definition FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT)->execute()->as_array();
//	$to_return = array();
//	$inbetween = array();
//	foreach ($data as $row) {
//		$splits = explode('-', $row['DRG_Definition']);
//		$inbetween['DRG_Number'] = trim($splits[0]);
//		$inbetween['DRG_Definition'] = trim($splits[1]);
//		$to_return[] = $inbetween;
//	}
//	return $to_return;
}

    public static function get_drg_details(){
        $drg_query = $_GET['id'];
        return DB::query(
            "SELECT DISTINCT provider_id, provider_name, provider_state, average_covered_charges, average_total_payments, average_medicare_payments FROM `medicare` WHERE DRG_Number = $drg_query",
            DB::SELECT)->execute()->as_array();

    }
}
?>
