<?php
if (!defined('BASEPATH')) exit('No direct script access <span class="IL_AD" id="IL_AD4">allowed</span>');
 
class Projectsubform extends CI_Model {
  
  function add() 
  {
    $pname = $this->input->post('pname');
   
    $data = array('projectname' => $pname);
    $this->db->insert('projectnames', $data);
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

  function getinformation()
  {

    $pnameid = $this->uri->segment(3);
    $this->db->where('pid', $pnameid);
    $informations = $this->db->get('information');
    
    if ($informations->num_rows() > 0) 
    {
      foreach ($informations->result() as $data) 
      {
        $information[] = $data;
      }
      return $information;
    }
  }

  function gettask()
  {
    $pnameid = $this->uri->segment(3);
    $taskid = $this->uri->segment(4);

    //$this->db->where('pid', $pnameid);
    //$task = $this->db->get('burndown');

        

    $task = $this->db->select("t2.key, t2.description, t2.start, t2.end, t2.neededby,t1.effort, t1.start, t1.progress,t1.time")
      ->from('burndown as t1')
      ->where('t1.pid', $pnameid)
      ->where('t1.key', $taskid)
      ->join('gantt as t2', 't1.key = t2.key')
      ->get();

    
    if ($task->num_rows() > 0) 
    {
      foreach ($task->result() as $data) 
      {
        $tasks[] = $data;
      }
      return $tasks;
    }
  }

  function gettasks()
    {
      $pnameid = $this->uri->segment(3);    
      $this->db->distinct();
      $task = $this->db->select("t2.key, t2.description, t2.start, t2.end, t2.done,t2.neededby,t1.effort, t1.effort,t1.deadline, t1.progress,t1.time")
        ->from('burndown as t1')
        ->where('t1.pid', $pnameid)
        ->join('gantt as t2', 't1.key = t2.key')
        ->get();

      
      if ($task->num_rows() > 0) 
      {
        foreach ($task->result() as $data) 
        {
          $tasks[] = $data;
        }
        return $tasks;
      }
    }


  function saveinformation() {

    if((int)$this->input->post('projectnameid') && (int)$this->input->post('informationid'))    {
      $data = array(
        "pid" => $this->input->post('projectnameid'),
        "membername" => $this->input->post('membername'),
        "startdate" => $this->input->post('startdate'),
        "enddate" => $this->input->post('enddate')
      );

      $this->db->where('id', $this->input->post('informationid') );
      $this->db->update('information', $data);
      $this->session->set_flashdata('status', array('message' => 'information updated successfully','class' => 'Success'));


    }
    else if( (int)$this->input->post('projectnameid'))
    {
      $data = array(
        "pid" => $this->input->post('projectnameid'),
        "membername" => $this->input->post('membername'),
        "startdate" => $this->input->post('startdate'),
        "enddate" => $this->input->post('enddate')
      );
    
      $this->db->insert('information', $data);   
      $this->session->set_flashdata('status', array('message' => 'information created successfully','class' => 'Success')); 

    }
  }


  function savetask() {

    if((int)$this->input->post('projectnameid') && (int)$this->input->post('taskid'))    {

      $ganttdata = array(
        "pid" => $this->input->post('projectnameid'),
        "description" => $this->input->post('desc'),        
        "start" => $this->input->post('startdate'),
        "end" => $this->input->post('enddate'),
        "done" => $this->input->post('progress'),        
        "neededby" => $this->input->post('neededby')
      );

      $burndowndata = array(
        "pid" => $this->input->post('projectnameid'),
        "description" => $this->input->post('desc'),
        "effort" => $this->input->post('effort'),
        "start" => $this->input->post('startdate'),
        "deadline" => $this->input->post('enddate'),
        "progress" => $this->input->post('progress'),
        "time" => $this->input->post('time')
      );

      $this->db->where('key', $this->input->post('taskid') );
      $this->db->update('gantt', $ganttdata);
      $this->db->update('burndown', $burndowndata);
      $this->session->set_flashdata('status', array('message' => 'Task Updated successfully','class' => 'Success')); 


    }
    else if( (int)$this->input->post('projectnameid'))
    {
      $ganttdata = array(
        "pid" => $this->input->post('projectnameid'),
        "description" => $this->input->post('desc'),        
        "start" => $this->input->post('startdate'),
        "end" => $this->input->post('enddate'),
        "done" => $this->input->post('progress'),        
        "neededby" => $this->input->post('neededby')
      );

      $burndowndata = array(
        "pid" => $this->input->post('projectnameid'),
        "description" => $this->input->post('desc'),
        "effort" => $this->input->post('effort'),
        "start" => $this->input->post('startdate'),
        "deadline" => $this->input->post('enddate'),
        "progress" => $this->input->post('progress'),
        "time" => $this->input->post('time')
      );

      $this->db->insert('gantt', $ganttdata);
      $this->db->insert('burndown', $burndowndata);
      $this->session->set_flashdata('status', array('message' => 'Task created successfully','class' => 'Success')); 


    }
  }
}