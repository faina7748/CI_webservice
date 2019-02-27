<?php 
Class Actor extends CI_Controller{    
    public function index(){
        $this->load->model('Actor_Model');
        $rows = $this->Actor_Model->listing();  
        //foreach($rows as $actor){
        //    echo $actor['first_name'] . '<br>';            
        //}
        
        header('Content-Type: application/json');
        echo json_encode($rows);
    }

    public function add(){
        $this->load->model('Actor_Model');
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $this->Actor_Model->insert([
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
        echo "actor added";
    }
}