<?php

namespace Model;
use \DB;

class OurHospitalModel extends \Model {

    public static function get_hospitals($offset, $limit){

        return DB::query(
            "SELECT hospitalinfo.provider_id, provider_name, provider_street_address, 
                    provider_city, provider_state, hospital_referral_region 
             FROM `hospitalinfo` LIMIT $limit OFFSET $offset", DB::SELECT
        )->execute()->as_array();
    }

   public static function get_drg($offset, $limit){

        return DB::query(
            "SELECT drginfo.DRG_Number, DRG_Description FROM `drginfo` LIMIT $limit OFFSET $offset", DB::SELECT)->execute()->as_array();



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

    public static function get_drg_details($offset, $limit){
          $drg_query = $_GET['id'];
            return DB::query(
                "SELECT hospitalinfo.provider_id, provider_name, provider_state, 
                    average_covered_charges, average_total_payments,
                    average_medicare_payments 
             FROM `hospitalinfo` INNER JOIN `financialinfo` ON hospitalinfo.provider_id = financialinfo.provider_id
             WHERE financialinfo.DRG_Number = $drg_query LIMIT $limit OFFSET $offset",
                DB::SELECT)->execute()->as_array();


    }

    public static function get_hospital_details($query, $offset, $limit){

        return DB::query(
            "SELECT DISTINCT hospitalinfo.provider_id, provider_name, provider_street_address, provider_city, 
                    provider_state, hospital_referral_region, 
                    drginfo.DRG_Number, DRG_Description, 
                    average_covered_charges, average_total_payments, 
                    average_medicare_payments
             FROM `hospitalinfo`
                                INNER JOIN `financialinfo`
                                    ON hospitalinfo.provider_id=financialinfo.provider_id
                                INNER JOIN `drginfo`
                                    ON drginfo.DRG_number = financialinfo.DRG_Number
             WHERE financialinfo.provider_id = $query LIMIT $limit OFFSET $offset",
            DB::SELECT)->execute()->as_array();

    }

    public static function get_hospital_details_default($offset, $limit){
        if(isset($_GET['num'])) {
            $provider_query = $_GET['num'];
        }
        else{
            $provider_query = $_POST['id'];
        }
        return DB::query("SELECT DISTINCT hospitalinfo.provider_id, provider_name, provider_street_address,
                                 provider_city, provider_state,
                                 hospital_referral_region, drginfo.DRG_Number,
                                 DRG_Description, average_covered_charges, 
                                 average_total_payments,
                                 average_medicare_payments
                          FROM `hospitalinfo`
                                INNER JOIN `financialinfo`
                                    ON hospitalinfo.provider_id=financialinfo.provider_id
                                INNER JOIN `drginfo`
                                    ON drginfo.DRG_number = financialinfo.DRG_Number
                          WHERE financialinfo.provider_id = $provider_query LIMIT $limit OFFSET $offset", DB::SELECT)->execute()->as_array();

    }

    public static function post_comment($comment, $provider_id, $username, $parent_comment = NULL){
        $query = DB::insert('comments');
        $query->columns(array(
            'comment',
            'provider_id',
            'username',
            'parent_id'
        ));
        $query->values(array(
           $comment,
           $provider_id,
           $username,
           $parent_comment
        ));
        return $query->execute();
    }

    public static function edit_comment($comment, $comment_id){
        $timestamp = \Date::forge()->get_timestamp();
        $date = date('Y-m-d H:i:s', $timestamp);

        $query = DB::update('comments');
        $query->set(array(
            'comment' => $comment,
            'edited' => $date,
        ));
        $query->where('comment_id', '=', $comment_id);

        return $query->execute();
    }


    public static function delete_comment($comment_id){
        $children = OurHospitalModel::find_children($comment_id);
        $parents = OurHospitalModel::find_parent($comment_id);

        if(sizeof($children) == 0 && sizeof($parents) != 0){
            $query = DB::delete('comments');
            $query->where('comment_id', '=', $comment_id);
            return $query->execute();
        }
        else {
            $query = DB::update('comments');
            $query->set(array(
                'comment' => 'deleted',
                'username' => 'deleted',
            ));
            $query->where('comment_id', '=', $comment_id);

            return $query->execute();
        }
    }



    public static function get_comments($provider_id){
        return DB::query("SELECT * FROM `comments` WHERE provider_id = $provider_id AND parent_id IS NULL", DB::SELECT)->execute()->as_array();
    }

    public static function get_responses($provider_id){
        return DB::query("SELECT * FROM `comments` WHERE provider_id = $provider_id AND parent_id IS NOT NULL", DB::SELECT)->execute()->as_array();

    }

    public static function find_children($comment_id){
        return DB::query("SELECT `comment_id` FROM `comments` WHERE `parent_id` = $comment_id", DB::SELECT)->execute()->as_array();
    }

    public static function find_parent($comment_id){
        return DB::query("SELECT `comment_id` FROM `comments` WHERE `comment_id` = $comment_id AND `parent_id` IS NULL", DB::SELECT)->execute()->as_array();
    }

    public static function upvote_comment($comment_id){
        $score = OurHospitalModel::get_score($comment_id);
        $query = DB::update('comments');
        $query->set(array(
                'score' => $score[0]['score'] + 1,
        ));
        $query->where('comment_id', '=', $comment_id);
        return $query->execute();
    }

    public static function downvote_comment($comment_id){
        $score = OurHospitalModel::get_score($comment_id);
        $query = DB::update('comments');
        $query->set(array(
            'score' => $score[0]['score'] - 1,
        ));
        $query->where('comment_id', '=', $comment_id);
        return $query->execute();
    }

    public static function get_score($comment_id){
        return DB::query("SELECT `score` FROM `comments` WHERE `comment_id` = $comment_id", DB::SELECT)->execute()->as_array();
    }


}
?>