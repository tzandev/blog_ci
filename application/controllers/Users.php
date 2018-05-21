<?php
/**
 * Created by PhpStorm.
 * User: Ivaylo Tsandev
 * Date: 17.05.18
 * Time: 11:00
 */

class Users extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('users_model');

    }

    public function index(){

        $data['title'] = "User profile";

        $this->load->view("header",$data);
        $this->load->view("profile");
        $this->load->view("footer");

    }

    public function create(){

        $this->users_model->create();

    }

    public function update($id = NULL){

        if(empty($id)){
            echo "Please provide a valid ID";
            exit();
        }

        $this->users_model->update($id);

    }

    public function posts(){

        $data['records'] = $this->users_model->select_posts();

        $this->load->view('show_posts',$data);

    }

}