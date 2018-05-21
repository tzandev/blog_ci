<?php
/**
 * Created by PhpStorm.
 * User: Ivaylo Tsandev
 * Date: 17.05.18
 * Time: 11:00
 */

class Users extends CI_Controller{

    private $message = '';

    public function __construct(){

        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('form_validation');
        $this->load->helper('form');

    }

    public function index(){
        $data['title'] = "All users";
        $this->load->view("header",$data);
        $this->load->view("profile");
        $this->load->view("footer");

    }

    public function create_user(){
        $data['title'] = "Create new user";
        $this->load->view('header',$data);
        $this->load->view('users/create');
        $this->load->view('footer');
    }

    public function create(){
        $this->users_model->create();
    }

    public function update_user(){
        $data['title'] = "Update existing user";
        $this->load->view('header',$data);
        $this->load->view('users/create');
        $this->load->view('footer');
    }

    public function update($id = NULL){

        if(empty($id)){
            $data['message'] = "Please provide a valid ID";
            $data['title'] = "Update existing user";
            $this->load->view('header',$data);
            $this->load->view('errors/error',$data);
            $this->load->view('footer');
            return;
        }

        $this->users_model->update($id);

    }

    public function posts(){

        $data['records'] = $this->users_model->select_posts();

        $this->load->view('show_posts',$data);

    }

}