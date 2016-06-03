<?php
if (!defined('BASEPATH')) exit('No direct script access <span class="IL_AD" id="IL_AD4">allowed</span>');
 
class Projectname extends CI_Model {
  
  function add() 
  {
    $pname = $this->input->post('pname');
   
    $data = array('projectname' => $pname);
    $this->db->insert('projectnames', $data);
    $this->session->set_flashdata('status', array('message' => 'Projectname created successfully','class' => 'Success'));
  }

  function view() 
  {
    $projectnames = $this->db->get('projectnames');

    if ($projectnames->num_rows() > 0) 
    {
      foreach ($projectnames->result() as $data) 
      {
        $hasil[] = $data;
      }
      return $hasil;
    }
  } 

  function getprojectname($id)
  {
    $this->db->where('id', $id);
    $projectname = $this->db->get('projectnames');
    
    if ($projectname->num_rows() > 0) 
    {
      foreach ($projectname->result() as $data) 
      {
        $pname[] = $data;
      }
      return $pname;
    }

  } 
}