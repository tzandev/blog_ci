<?php
/**
 * Created by PhpStorm.
 * User: Ivaylo Tsandev
 * Date: 17.05.18
 * Time: 14:08
 */

class Users_model extends CI_Model{

    public function __construct(){

        parent::__construct();

    }

    public function create(){

        $data = array("post" => "some other escaped` post's text");
        $result = $this->db->insert("blog",$data);

        if($result == TRUE){
            echo "Insert success";
        }else{
            echo "Fault";
        }

        echo "<br>";
        echo "Create new post page";

    }

    public function update($id){

        $data = array('post' => "changed text of the post");
        $this->db->where("id",$id);
        $update = $this->db->update("blog",$data);

        if($update == TRUE){
            echo "Update of record $id successful";
        }else{
            echo "Fault";
        }

        echo "<br>";
        echo "\n Update Record Page";

    }

    public function select_posts(){

        $data = $this->db->get('blog');

        foreach($data->result() as $row){
            $result[] = $row;
        }

        return $result;

    }

}