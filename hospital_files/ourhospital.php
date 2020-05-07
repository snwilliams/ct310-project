<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
use \Model\OurHospitalModel;
use \Model\OurHospitalDRGModel;



class Controller_Ourhospital extends Controller
{
    /**
     * You will come up with a company name and logo and create a home page.
     * This page will have navigation to other pages but will not contain any data or reports.
     * While you must create your own logo, you can use any properly cited image in your site to make it look professional.
     *
     * @access  public
     * @return  Response
     */

    public function action_home()
    {

        $view = View::forge("components/template.php", array(
            "titlepage" => "Home",
            "main_body" => View::forge("hospitalviews/home.php")
        ));

        return Response::forge($view);

    }

    /**
     * You will come up with a company name and logo and create a home page.
     * This page will have navigation to other pages but will not contain any data or reports.
     * While you must create your own logo, you can use any properly cited image in your site to make it look professional.
     *
     * @access  public
     * @return  Response
     */

    public function action_index()
    {
        return Response::redirect("index.php/ourhospital/home");
    }

    /**
     * On this page, you will have a picture, name, and bio for each of your team members along with a link
     * to their deployment of the entire site.
     * (Yes, you each must host a fully working copy of the application on the due date)
     *
     * @access  public
     * @return  Response
     */
    public function action_about()
    {
        $view = View::forge("components/template.php", array(
            "titlepage" => "About us",
            "main_body" => View::forge("hospitalviews/about.php")
        ));
        return Response::forge($view);
    }

    /**
     * Simple a list of each hospital.  Must include Hospital Name, State, and MPN (Medicare’s 6-digit provider ID number,
     * with leading zeros if needed).
     * This page uses a jQuery Tablesorter to allow a user to sort or filter by Name, MPN, State, and any other reasonable column
     * that you included.
     * Clicking on a hospital’s name takes the user to a page for that hospital.
     *
     * @access  public
     * @return  Response
     */

    public function action_hospital_list($offset = 0)
    {
        $hospital_list = OurHospitalModel::get_hospitals($offset, 20);
        $view = View::forge("components/template.php", array(
            "titlepage" => "List of hospitals",
            "main_body" => View::forge("hospitalviews/hospital_list.php", array(
                "hospital_list" => $hospital_list,
                 "offset" => $offset,
            )),
        ));
        return Response::forge($view);
    }

    /**
     * Similar to the Hospital List page, except this page lists the MS-DRG Number and Description of each MS-DRG that has data in the dataset.
     *  It can be filtered and sorted by either of these columns.
     *Clicking on a DRG Number takes the user to a page for that DRG.
     * @access  public
     * @return  Response
     */

    public function action_drg_list($offset = 0)
    {
        $drg_list = OurHospitalModel::get_drg($offset, 20);
        $view = View::forge("components/template.php", array(

            "titlepage" => "List of DRGs",
            "main_body" => View::forge("hospitalviews/drg_list.php", array(
                "drg_list" => $drg_list,
                "offset" => $offset,
            )),
        ));
        return Response::forge($view);
    }


    /**
     * This is one Controller/Action that, when given a 6-digit MPN, shows a detailed report for the chosen hospital,
     * including the rest of the details about that hospital (Such as address) that appear in the data set.
     * Also shown is a table for each DRG which has DRG Number, DRG Description, and the three payment amount columns.
     * Clicking on a DRG Number takes the user to a page for that DRG.
     *
     * @access  public
     * @return  Response
     */

    public function action_hospital_details($offset = 0)
    {
       if (isset($_GET['searchquery'])){
           $query = $_GET['searchquery'];
           $hospital_data = OurHospitalModel::get_hospital_details($query, $offset, 20);
           $comments = OurHospitalModel::get_comments($query);
           $responses = OurHospitalModel::get_responses($query);
           $view = View::forge("components/template.php", array(
               "titlepage" => "Hospital details",
               "main_body" => View::forge("hospitalviews/hospital_details.php", array(
                   "hospital_data" => $hospital_data,
                   "offset" => $offset,
                   "comments" => $comments,
                   "responses" => $responses,
               )),
           ));
           return Response::forge($view);
       }
       else {
           $hospital_data = OurHospitalModel::get_hospital_details_default($offset, 20);
           $comments = OurHospitalModel::get_comments($_GET['num']);
           $responses = OurHospitalModel::get_responses($_GET['num']);
           $view = View::forge("components/template.php", array(
               "titlepage" => "Hospital details",
               "main_body" => View::forge("hospitalviews/hospital_details.php", array(
                   "hospital_data" => $hospital_data,
                   "offset" => $offset,
                   "comments" => $comments,
                   "responses" => $responses,
               )),
           ));
           return Response::forge($view);
       }
    }

    /**
     * This page shows details for a given DRG and has a table with each Hospital,
     * including the MPN, Name, and State along with the three payment amount columns.
     *
     * @access  public
     * @return  Response
     */

    public function action_drg_details($offset = 0)
    {

        $drg_data = OurHospitalModel::get_drg_details($offset, 20);
        $view = View::forge("components/template.php", array(
            "titlepage" => "DRG details",
            "main_body" => View::forge("hospitalviews/drg_details.php", array(
                "drg_data" => $drg_data,
                "offset" => $offset,

            )),
        ));
        return Response::forge($view);
    }

    public function get_login() {
        $view = View::forge("components/template.php", array(
            "titlepage" => "Log in to our website",
            "main_body" => View::forge("hospitalviews/login.php", array (
                "failed" => false,
                )),
        ));
        return Response::forge($view);
    }

    public function post_login()
    {
        session_start();
        $validation = Controller_Ourhospital::return_login_validation();
        $username = Input::post('username');
        $password = Input::post('password');
        if ($validation->run() && Auth::instance()->login($username, $password)) {
            $_SESSION['username'] = Input::post('username');
            return Response::redirect('index.php/ourhospital/home.php');
        } else {

            $view = View::forge("components/template.php", array(
                "titlepage" => "Log in to our website",
                "main_body" => View::forge("hospitalviews/login.php", array(
                    "failed" => true,
                )),
            ));
            return Response::forge($view);
       }
    }


    public function action_logout() {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        return Response::redirect('index.php/ourhospital/home');
    }

    private static function return_login_validation() {
        $valid = Validation::forge('registration_validation');
        $valid->add('username', 'Your username')->add_rule('required');
        $valid->add('password', 'Your password')->add_rule('required')->add_rule('min_length', 5)->add_rule('max_length', 20);
        return $valid;
    }

    public function post_new_comment(){
        session_start();

            if(strlen(Input::post('comment')) > 0 && isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                OurHospitalModel::post_comment(Input::post('comment'), Input::post('provider-id'), $username);

            }
            return Response::redirect('index.php/ourhospital/hospital_details?num=' . Input::post('provider-id') . '&searchquery=' . Input::post('provider-id') . '&id=' . Input::post('id'));

    }

    public function post_comment_response(){
        session_start();

            if(strlen(Input::post('response')) > 0 && isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                OurHospitalModel::post_comment(
                    Input::post('response'),
                    input::post('provider-id'),
                    $username,
                    Input::post('chat')
                );
                return Response::redirect('index.php/ourhospital/hospital_details?num=' . Input::post('provider-id') . '&searchquery=' . Input::post('provider-id') . '&id=' . Input::post('id'));
            }
        }

}


