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

    public function action_hospital_list()
    {
        $hospital_list = OurHospitalModel::get_hospitals();
        $view = View::forge("components/template.php", array(
            "titlepage" => "List of hospitals",
            "main_body" => View::forge("hospitalviews/hospital_list.php", array(
                "hospital_list" => $hospital_list
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

    public function action_drg_list()
    {
        $drg_list = OurHospitalModel::get_drg();
        $view = View::forge("components/template.php", array(

            "titlepage" => "List of DRGs",
            "main_body" => View::forge("hospitalviews/drg_list.php", array(
                "drg_list" => $drg_list
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

    public function action_hospital_details()
    {

        $view = View::forge("components/template.php", array(
            "titlepage" => "Hospital details",
            "main_body" => View::forge("hospitalviews/hospital_details.php")
        ));
        return Response::forge($view);
    }

    /**
     * This page shows details for a given DRG and has a table with each Hospital,
     * including the MPN, Name, and State along with the three payment amount columns.
     *
     * @access  public
     * @return  Response
     */

    public function action_drg_details()
    {
        $drg_data = OurHospitalModel::get_drg_details();
        $view = View::forge("components/template.php", array(
            "titlepage" => "DRG details",
            "main_body" => View::forge("hospitalviews/drg_details.php", array(
                "drg_data" => $drg_data
            )),
        ));
        return Response::forge($view);
    }
}


