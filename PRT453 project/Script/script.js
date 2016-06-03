var projects= new Array();
$(document).ready(function(){

  $(".overlay-content1").hide(); 
  //$(".overlay-content2").hide(); 
  var m="c";


    $("#createProject").click(function(){
      //alert("ddd");
      $("#pname").val("");
      $(".overlay-content2").hide();
      $(".overlay-content1").show(); 

    });
   $("#closeButton").click(function(){
       closeNav();
    }); 

   $(".editinfo").click(function()
   {
      $(".inforead").attr("readonly", false); 
   });  


$( ".frmsubmit" ).click(function( event ) {
  event.preventDefault();

  if($('#pname').val() == '')
  {
    alert("Please enter a project name");
    return;
  }
  else
  {
    $('.myform').submit();
  }
  
});

   /*
    $("#create").click(function(){
           
       createProj(); 
    }); 
    */
    /*
    $(".list-group").click(function() {
       $.each(projects, function (index, value) { 
           var l = '<ul class="nav nav-tabs"><li><a data-toggle="tab" href="#info">Information</a></li><li><a data-toggle="tab" href="#tasks">Tasks</a></li><li><a data-toggle="tab" href="#burn">Burndown Chart</a></li><li><a data-toggle="tab" href="#gantt">Gantt Chart</a></li></ul><div class="tab-content"><div id="info" class="tab-pane fade in active"><h3>Information</h3> <p><form class="form-horizontal" role="form"><div class="form-group"><label class="control-label col-sm-2" for="Members">Enter Group members</label><div class="col-sm-10"><input type="text" class="form-control" id="member" placeholder="Enter memberNames"></div></div><div class="form-group"><label class="control-label col-sm-2" for="startDate">Start date</label><div class="col-sm-10"><input type="text" class="form-control" id="startDate" placeholder="start Date"></div></div><div class="form-group"><label class="control-label col-sm-2" for="endDate">Expected End Date</label><div class="col-sm-10"> <input type="text" class="form-control" id="endDate" placeholder="end Date"></div></div> <div class="form-group">        <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default">Submit</button></div></div> </form></p> </div><div id="tasks" class="tab-pane fade"><h3>Tasks</h3><p><form class="form-horizontal" role="form"><div class="form-group"><label class="control-label col-sm-2" for="">Description:</label><div class="col-sm-10"><input type="text" class="form-control" id="decs" placeholder="Enter Description"></div></div><div class="form-group"><label class="control-label col-sm-2" for="effort">Effort:</label><div class="col-sm-10">          <input type="text" class="form-control" id="effort" placeholder="Enter effort"></div></div><div class="form-group"><label class="control-label col-sm-2" for="startDate">Start Date</label><div class="col-sm-10">          <input type="text" class="form-control" id="start" placeholder="Enter start date"></div></div><div class="form-group"><label class="control-label col-sm-2" for="endDate">End Date</label><div class="col-sm-10">          <input type="text" class="form-control" id="end" placeholder="Enter effort"></div> </div><div class="form-group"><label class="control-label col-sm-2" for="progress">Progress:</label><div class="col-sm-10">          <input type="text" class="form-control" id="prog" placeholder="Enter progress"></div></div><div class="form-group"><label class="control-label col-sm-2" for="effort">Time:</label><div class="col-sm-10">          <input type="text" class="form-control" id="time" placeholder="Enter time"></div></div><div class="form-group"><label class="control-label col-sm-2" for="effort">Needed By:</label><div class="col-sm-10">          <input type="text" class="form-control" id="neededBy" placeholder="Enter neededBy"></div></div><div class="form-group">        <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default">Submit</button> </div></div></form></p></div><div id="burn" class="tab-pane fade"><h3>BurnDown chart 2</h3><p></p </div><div id="gantt" class="tab-pane fade"><h3>Gantt Chart</h3><p></p></div></div></div>';
            $(".overlay-content1").hide();
            $(".overlay-content2 ").append(l);
            $(".overlay-content2").show();
       });
    });
    */
    
    
    
    



function closeNav() {
    $(".overlay-content1").hide();
}

function createProj()
{
  var a= document.getElementById("name").value;
  var b="<button id='"+a+"' class='list-group-item'>"+a+"</button>";
  $(".list-group ").append(b);
  $(".overlay-content1").hide(); 
  projects.push(a);
  for(var i=0;i<projects.length;i++)
  {
    alert(projects[i]);}
  }
});