<?php
use \Model\HospitalDataModel;
use \Debug;

class Controller_HospitalData extends Controller {

    public function action_index() {
        return Response::redirect(View::forge('index.php/hospitaldata/home'));
    }

    public function action_hospitals() {
        $hospital_data = HospitalDataModel::get_hospitals(0,10);
        Debug::dump($hospital_data);
        $view = View::forge("hospitalviews/hospitals.php");
    }
}
?>
