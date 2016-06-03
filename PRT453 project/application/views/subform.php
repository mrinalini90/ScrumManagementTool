<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Scrum management Tool</title>
    <link  rel="stylesheet" href="<?php echo base_url(); ?>Style/stylesheet.css" type="text/css" />
    <link  rel="stylesheet" href="<?php echo base_url(); ?>Style/jquery-ui.css" /> 
    <link  rel="stylesheet" href="<?php echo base_url(); ?>Style/bootstrap.min.css" />
            <link  rel="stylesheet" href="<?php echo base_url(); ?>Style/jquery.toast.css" />

    <script src="<?php echo base_url(); ?>Script/jquery-1.12.3.min.js"></script>
    <script src="<?php echo base_url(); ?>Script/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>Script/script.js"></script>
    <script src="<?php echo base_url(); ?>Script/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>Script/jquery.toast.js"></script>

  </head>

  <body>

  <?php
if($this->session->flashdata('status')) {
  $message = $this->session->flashdata('status');
  ?>
<script type="text/javascript">
  $.toast({
    heading: '<?php echo$message['class'] ?>',
    text: '<?php echo $message['message']; ?>',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'success'
});
</script>

<?php
}
?>

    <div class="container-fluid">
      <div class="jumbotron">
        <h1>Scrum Management Tool</h1>      
      </div>

      <div class="row">
        <div class="col-sm-3" >
          <button id ="createProject" type="button" class="btn btn-info btn-block">Add Project </button>
          <div class="list-group"> 
          <?php
            if ($data_get != NULL) {
              foreach ($data_get as $row) {
          ?>
                <a href="<?php echo site_url('main/show/' . $row->id); ?>" class="list-group-item">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"><?php echo $row->projectname ?></span></a>
          <?php    
              }
            }
          ?>
          </div>
        </div>

        <div class="col-sm-9" >
          <div id="nav" class="overlay">

            <div class="overlay-content1">
                <?php 
                  $attributes = array('class' => 'myform','role'=>'form');
                  echo form_open('main/save', $attributes); ?>
                <label for="usr">Enter Project Name:</label> 
                <label for="usr">Enter Project Name:</label> 
                <input type="hidden" name="newp" value="1" >
                <input type="text" class="" id="pname" name="pname">
                <input type="submit" name="pnamesubmit" class="frmsubmit btn btn-default" value="Create Project">
                <!--<button type="button" class="btn btn-default" id="create">Create Project</button>-->
                <button type="button" class="btn btn-default" id="closeButton">Cancel</button>
              </form>              
            </div>   
            
            <div class="overlay-content2">
              
              <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#info">Information</a></li>
                <li><a data-toggle="tab" href="#tasks">Tasks</a></li>
                <li><a data-toggle="tab" href="#burn">Burndown Chart</a></li>
                <li><a data-toggle="tab" href="#gantt">Gantt Chart</a></li>
                </ul>

                <div class="tab-content">

                   <div id="info" class="tab-pane fade in active">

                      <?php 

                        if($projectname != NULL) {
                          foreach ($projectname as $row) {
                          ?>
                          <h3><?php echo $row->projectname ?></h3>
                       <?php    
                          }
                        }
                        ?>
                      <p>

                      <?php echo form_open('main/informationsave', 'class="form-horizontal"'); ?>


                      <input type="hidden" name="projectnameid" value="<?php echo $projectnameid; ?>"></input>

                        <?php 

                        if($data_information != NULL) {
                          foreach ($data_information as $row) {
                          ?>
                            <input type="hidden" name="informationid" value="<?php echo $row->id; ?>"></input>

                             <div class="form-group">
                                <label class="control-label col-sm-2" for="Members">Enter Group members</label>
                                <div class="col-sm-10">
                                  <input type="text" name="membername" value="<?php echo $row->membername ?>" class="form-control inforead" id="member" placeholder="Enter memberNames" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="startDate">Start date</label>
                                <div class="col-sm-10">
                                  <input type="text" name="startdate" value="<?php echo $row->startdate ?>" class="form-control inforead" id="startDate" placeholder="start Date" readonly>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="endDate">Expected End Date</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="enddate" value="<?php echo $row->enddate ?>" class="form-control inforead" id="endDate" placeholder="end Date" readonly>
                                </div>
                             </div>

                              <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <button type="button" class="btn btn-default editinfo">Edit</button>

                            </div>
                         </div>
                        <?php    
                          }
                        }
                        else
                        {
                        ?>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Members">Enter Group members</label>
                                <div class="col-sm-10">
                                  <input type="text" name="membername" value="" class="form-control" id="member" placeholder="Enter memberNames">
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="startDate">Start date</label>
                                <div class="col-sm-10">
                                  <input type="text" name="startdate" value="" class="form-control" id="startDate" placeholder="start Date">
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="endDate">Expected End Date</label>
                                <div class="col-sm-10"> 
                                  <input type="text" name="enddate" value="" class="form-control" id="endDate" placeholder="end Date">
                                </div>
                             </div>

                              <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button></div>
                         </div>
                        <?php
                        }
                        ?>

                        


                      </form>



                      </p> 
                   </div>

                   <div id="tasks" class="tab-pane fade">
                      <h3>Tasks</h3>
                      <p>

                      <?php echo form_open('main/tasksave', 'class="form-horizontal"'); ?>


                        <input type="hidden" name="projectnameid" value="<?php echo $projectnameid; ?>"></input>

                        <?php 

                        if($data_task != NULL) {
                          foreach ($data_task as $row) {
                          ?>
                            <input type="hidden" name="taskid" value="<?php echo $row->key; ?>"></input>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="">Description:</label>
                            <div class="col-sm-10">
                            <input type="text" value="<?php echo $row->description; ?>" name="desc" class="form-control" id="decs" placeholder="Enter Description">
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Effort:</label>
                            <div class="col-sm-10">         
                             <input type="text" value="<?php echo $row->effort; ?>" name="effort" class="form-control" id="effort" placeholder="Enter effort"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="startDate">Start Date</label>
                            <div class="col-sm-10">        
                              <input type="text" value="<?php echo $row->start; ?>" name="startdate" class="form-control" id="start" placeholder="Enter start date"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="endDate">End Date</label>
                            <div class="col-sm-10">        
                              <input type="text" value="<?php echo $row->end; ?>" name="enddate" class="form-control" id="end" placeholder="Enter effort"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="progress">Progress:</label>
                            <div class="col-sm-10">          
                            <input type="text" value="<?php echo $row->progress; ?>" name="progress" class="form-control" id="prog" placeholder="Enter progress"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Time:</label>
                            <div class="col-sm-10">         
                             <input type="text" value="<?php echo $row->time; ?>" name="time" class="form-control" id="time" placeholder="Enter time"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Needed By:</label>
                            <div class="col-sm-10">         
                             <input type="text" value="<?php echo $row->neededby; ?>" name="neededby" class="form-control" id="neededBy" placeholder="Enter neededBy"></div>
                         </div>

                          <?php    
                          }
                        }
                        else
                        {
                        ?>

                         <div class="form-group">
                            <label class="control-label col-sm-2" for="">Description:</label>
                            <div class="col-sm-10">
                            <input type="text" name="desc" class="form-control" id="decs" placeholder="Enter Description">
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Effort:</label>
                            <div class="col-sm-10">         
                             <input type="text" name="effort" class="form-control" id="effort" placeholder="Enter effort"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="startDate">Start Date</label>
                            <div class="col-sm-10">        
                              <input type="text" name="startdate" class="form-control" id="start" placeholder="Enter start date"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="endDate">End Date</label>
                            <div class="col-sm-10">        
                              <input type="text" name="enddate" class="form-control" id="end" placeholder="Enter effort"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="progress">Progress:</label>
                            <div class="col-sm-10">          
                            <input type="text" name="progress" class="form-control" id="prog" placeholder="Enter progress"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Time:</label>
                            <div class="col-sm-10">         
                             <input type="text" name="time" class="form-control" id="time" placeholder="Enter time"></div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="effort">Needed By:</label>
                            <div class="col-sm-10">         
                             <input type="text" name="neededby" class="form-control" id="neededBy" placeholder="Enter neededBy"></div>
                         </div>

                           <?php
                        }
                        ?>

                         <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button> </div>
                         </div>


                      </form>



                      </p>



                      <table cellspacing="0" cellpadding="4" border="0" class="table">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Description </th>
                                    <th> Start </th>
                                    <th> End </th>
                                    <th> Done </th>
                                    <th> Neededby </th>
                                    <th> Effort </th>
                                    <th> Deadline </th>
                                    <th> Progress </th>
                                    <th> Time </th>

                                </tr>
                            </thead>
                            <tbody>

                            <?php 

                        if($data_tasks != NULL) {
                          foreach ($data_tasks as $row) {
                          ?>
                     
                                    <tr>
                                        <td> <?php echo $row->key; ?></td>
                                        <td> <?php echo $row->description; ?> </td>
                                        <td> <?php echo $row->start; ?> </td>
                                        <td> <?php echo $row->end; ?> </td>
                                        <td> <?php echo $row->done; ?> </td>
                                        <td> <?php echo $row->neededby; ?> </td>
                                        <td> <?php echo $row->effort; ?> </td>
                                        <td> <?php echo $row->deadline; ?> </td>
                                        <td> <?php echo $row->progress; ?> </td>
                                        <td> <?php echo $row->time; ?> </td>                                              

                                    </tr>
                     
                           <?php
                        }
                      }
                        ?>
                            </tbody>
                        </table>  


                   </div>


                   <div id="burn" class="tab-pane fade">
                      <h3>BurnDown chart 2</h3>
                      <p></p>
                   </div>


                   <div id="gantt" class="tab-pane fade">
                      <h3>Gantt Chart</h3>
                      <p></p>
                   </div>


                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
        
