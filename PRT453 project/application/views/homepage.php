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
                <input type="hidden" name="newp" value="1" >
                <input type="text" class="" id="pname" name="pname">
                <input type="submit" name="pnamesubmit" class=" frmsubmit btn btn-default" value="Create Project">
                <!--<button type="button" class="btn btn-default" id="create">Create Project</button>-->
                <button type="button" class="btn btn-default" id="closeButton">Cancel</button>
              </form>               
            </div>   

            <div class="overlay-content2"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
        
