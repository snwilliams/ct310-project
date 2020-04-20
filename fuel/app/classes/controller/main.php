<?php

//Controller_File where it lives
class Controller_Home extends Controller_Template
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		$this->template->title = 'Home Page';
		$this->template->content = View::forge('home/index', $data);
		//you can also pass in stuff that would be highlighted in the nav bar etc
	}
	
	/**
	* The name of the function after the 'action' is what goes in the url
	* For east/west you'll need a function for home, east, and west
	*/
	public function action_other()
	{
		/*$data = array();
		$this->template->title = 'Other Page';
		$this->template->content = View::forge('other/other', $data);*/
		die('home other');
	}
	
	//css stylesheets need to be inside assets and inside local_html

}
