<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style type="text/css">
		
.panel.with-nav-tabs .panel-heading{
    padding: 5px 5px 0 5px;
}
.panel.with-nav-tabs .nav-tabs{
	border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
	margin-bottom: -1px;
}
/********************************************************************/
/********************************************************************/
/********************************************************************/
/*** PANEL INFO ***/
.nav-tabs  li  a
{
    color: white!important;
}


.nav-tabs  li  a:hover,
.nav-tabs  li  a:focus
{
    color: #31708f!important;
}
.nav-tabs  li.active a
{
    color: #31708f!important;
}

.nav-tabs  li.active a:hover,
.nav-tabs  li.active a:focus
{
    color: #31708f!important;
}
.nav-tabs  li.open a
{
    color: #31708f!important;
}

.nav-tabs  li.open a:hover,
.nav-tabs  li.open a:focus
{
    color: #31708f!important;
}

.with-nav-tabs.panel-info .nav-tabs > li > a,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
	color: #31708f;
}
.with-nav-tabs.panel-info .nav-tabs > .open > a,
.with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
	color: #31708f;
	background-color: #bce8f1;
	border-color: transparent;
}

.with-nav-tabs.panel-info .nav-tabs > li.active > a,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
	color: #31708f;
	background-color: #fff;
	border-color: #bce8f1;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #31708f;   
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #31708f;
}

.btn-year{
    background: #0093dd;
    color: #fff;
    transition: .3s;
    border-radius: 2px;
    margin:5px;
}

.btn-year:hover{
    color: #0093dd;
    background: #fff;
    transform: scale(1.04);
    box-shadow: 0px 0px 6px 1px;
}
.btn-year.active,
.btn-year:active{
    background: #0093dd!important;
    color: #fff!important;
}
.btn-year:focus,
.btn-year:active,
.btn-year:focus-visible{
    outline: none!important;
}
/********************************************************************/

	</style>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
   <!--  <div class="page-header">
        <h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-success">
                <div class="panel-heading" style="background: #0093dd; ">
                        <ul class="nav nav-tabs">
                        	<?php $i=1; foreach ($achievement_type->result() as $type) { 
                        		if($i=='1'){ $class='active'; }
                        		else {  $class=''; }
                        			?>
                        		 <li class="<?=$class?>"><a href="#tab<?=$i?>info" data-toggle="tab"><?=$type->title?></a></li>
                        	<?php  $i++;	} ?>
                                 <!-- <li class=""><a href="#tabinfo" data-toggle="tab">Success Trail</a></li> -->
                         
                            <!-- <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4info" data-toggle="tab">Info 4</a></li>
                                    <li><a href="#tab5info" data-toggle="tab">Info 5</a></li>
                                </ul>
                            </li> -->
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                    	<?php $i=1; foreach ($achievement_type->result() as $type) { 
                        		if($i=='1'){ $class='in active'; }
                        		else {  $class=''; }
                        			?>
                        <div class="tab-pane fade <?=$class?>" id="tab<?=$i?>info">

                        	<?php 
                            $achievement=$this->model->get_data_by_column_name_status($table_name='achievements',$column_name='type',$type->id);

                            $years = [];
                            foreach ($achievement->result() as $row) {
                                $years[] = $row->year;
                            }
                            $years = array_unique($years);
                            echo "<div class='row'>";
                                echo "<div class='col-12' style='text-align: left;'>";
                            echo "<button class='btn btn-primary btn-year' year='all' type='".$type->id."' >All</button>";
                            foreach ($years as $yrow) {
                                echo "<button class='btn btn-primary btn-year' year='".$yrow."' type='".$type->id."'>".$yrow."</button>";
                            }
                                echo "</div>";
                            echo "</div>";

                        	 ?>





                             <?php foreach ($achievement->result() as $row) { ?>
                             	<a data-toggle="modal" data-target="<?php
                              if($type->id==4)
                              {
                                echo '#ddd';
                              }
                              ?>"
                                            onclick="achieve_detail(<?=$row->id?>)">
                             <div class="col-sm-2 text-center type-<?=$type->id?> y-<?=$row->year?>-<?=$type->id?> y-all-<?=$type->id?>" style="color: black">
                              <?php if($type->id==4)
                              {?>
                                <img height="130" width="100" src="<?=base_url()?>images/testimonial_file/<?=$row->testimonial_file?>">
                             <?php }
                             else{
                              ?>
                                 <img height="130" width="100" src="<?=base_url()?>images/achievements/<?=$row->image?>">
                                <?php } ?>
                                 <br>
                                     <b class="h-color"><?=$row->title?></b>
                                <br>
                                 <?=$row->student_name?><br>
                                <?=$row->description?>
                             </div></a>
                             <?php } ?>
                        	 <!-- <table class="table table-striped table-bordered text-center">
								<tbody>
								<?php foreach ($achievement->result() as $row) { ?>
								<tr>
									<td><?=$row->year?></td>
									<td><?=$row->student_name?></td>
									<td>
										<img height="130" width="100" src="<?=base_url()?>images/achievements/<?=$row->image?>">	
									</td>
									<td><?=$row->contact?></td>
									<td><?=$row->address?></td>
									<td><?=$row->description?></td>
								</tr>
							    <?php } ?>
							    </tbody>
							</table> -->
                        </div>
                        <?php  $i++;	} ?>
                        
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
$('.btn-year').on('click',function(event) {
    var type = $(this).attr('type');
    var year = $(this).attr('year');

    $('.type-'+type).hide();
    $('.y-'+year+'-'+type).show();
})

	 function achieve_detail(id)
            {

                $("#detail").html('<h3 style="color:red">Loading....</h3>');
                $("#detail").load('<?=base_url()?>welcome/achiev_detail/'+id);
            }
</script>
<style type="text/css">
	  .mmmm { 
 
            }
</style>
        <!-- Modal -->
  <div class="modal fade mmmm" id="ddd" role="dialog" style="margin-top: 0px;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" id="detail">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
           <!--  <a href="<?=base_url()?>index.php/admin/edit_achievement/<?=$row->id?>" class="btn btn-warning" title="EDIT">
                                                <i class="fa fa-edit"></i>
                                            </a> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<br/>
</body>
</html>