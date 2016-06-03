<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('form_validation');
        $this->load->database();
		$this->load->model('projectname');
		$this->load->model('projectsubform');
        $this->load->library('session');

		$this->form_validation->set_rules('pname', 'pname', 'required|min_length[4]|max_length[10]');



    }
 
    public function index()
    {
        $data['data_get'] = $this->projectname->view();
    	$this->load->view('homepage',$data);
    }

    public function show()
    {
        $data['data_task'] = NULL;
        $data['data_tasks'] = NULL;

    	$data['data_get'] = $this->projectsubform->view();
    	$data['data_information'] = $this->projectsubform->getinformation();
        $data['singletask'] = 0;
        if($this->uri->segment(4) > 0) {
            $data['data_task'] = $this->projectsubform->gettask();
            $data['singletask'] = 1;
        }
        $data['data_tasks'] = $this->projectsubform->gettasks();
    	$data['projectnameid'] = $this->uri->segment(3);
        $data['projectname'] = $this->projectname->getprojectname($this->uri->segment(3));

    	$this->load->view('subform',$data);
    }

    public function save() {
  		if ($this->input->post('newp')) {
	   		$this->projectname->add();
	   		redirect('main');
	  	} 
	  	else
	  	{
	   		redirect('main');
  		}
 	}

 	public function informationsave() {

		$this->projectsubform->saveinformation();
	 	redirect('main/show/'.$this->input->post('projectnameid'));

 	}

 	public function tasksave() {

		$this->projectsubform->savetask();
	 	redirect('main/show/'.$this->input->post('projectnameid'));

 	}
}
 
/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
