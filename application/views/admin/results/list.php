 <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
  <script type="text/javascript">
      function enblimpfrm() 
      {
         // alert('dfj');
         $('#importFrm').attr('action','<?php echo site_url("result_master/upload_file");?>');
      }

      $('#importFrm').removeAttr('action');
      $('#importFrm')[0].reset();
  </script>
<style type="text/css">
.windod_date tbody>tr>th
{
  text-align: center;
}
.windod_date tbody>tr>td
{
  text-align: center;
}

</style>

<div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Results </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
           
             
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('success');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-danger fade in">
                    <?php echo $this->session->flashdata('error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php endif;?>
            <!-- Import form -->
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Result</a>
              <form  method="post" enctype="multipart/form-data"  id="importFrm" >
                <input type="file" name="file" accept=".csv"  required onchange="enblimpfrm()"  />
                <input type="submit" class="btn btn-primary"  name="importSubmit" value="IMPORT" id="csvsubmit">
            </form>
            <!-- Import form -->
                                    <br />

                                    <!-- <a class="btn btn-warning" style="float:right" href="<?=base_url()?>index.php/result_master/add_result">Add <i class="fa fa-plus"></i></a>
 -->            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage results here

                            <input type="text" id="search" onkeyup="filter_by_name()" placeholder="Search for names.." title="Type in a name">

                            <div class="form-group" style="float: right; width: 20%;margin-bottom: 30px">
                                <div style="float: left;">
                                <p >Select Test</p>
                                    
                                </div>
                                 <div style="float: right; ">
                                    <select id="test" class="form-control" style="height: 30px;float: right; " onchange="filter_by_test(this.value)">
                                      <option value="0"> ALL Test</option>
                                    <?php foreach ($all_test->result() as $test) { ?>
                                     
                                      <option value="<?=$test->id?>"
                                        <?php
                                        if ($test_id==$test->id) {
                                           echo "selected";
                                        }
                                        ?>><?=$test->test_date?></option>
                                   <?php  } ?>
                                </select>
                                </div> 
                                
                            </div> 
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th style="width: 20%;">Test Date</th>
                                        <!-- <th>Test Date</th> -->
                                        <th>Student Reg No.</th>
                                        <th>Student Name</th>
                                       <!--  <th>MAT Marks</th>
                                        <th>SAT Marks</th> -->
                                        <th>Performance</th>
                                        <th>Enrollment</th>
                                        <th>View Marks</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody id="tbody" >
                                    <?php $i=1; foreach($result->result() as $row){ 
                                
                                  $test=$this->main_model->get_data_id('test',$row->test_id);
                                  $t = array('registration_no' => $row->stu_reg_number );
                                  $enroll=$this->admin_model->get_data_multi_column('stu_info',$t)->row();
                                        ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$test->test_date?></td>
                                        <!-- <td><?=$row->test_date?></td> -->
                                        <td><?=$row->stu_reg_number?></td>
                                        <td><?=$row->student_name?></td>
                                       <!--  <td>
                                            <?=$row->marks_mat?> / <?=$active_test->total_marks_mat?>
                                        </td> -->
                                       <!--  <td>
                                           <?=$row->marks_sat?> / <?=$test_marks->total?>
                                        </td> -->
                                          
                                        <td title=""> 
                                              <?php 
                                            $pr= $row->waiver_offered;
                                           if ($pr=='') {
                                              
                                           }
                                          elseif($pr >= 90) { 
                                                echo "Very Excellent";
                                            }
                                            elseif ($pr >= 80) {
                                                echo "Excellent";
                                            } 
                                            elseif ($pr >= 70) {
                                                echo "Extremely Good";
                                            }
                                            elseif ($pr >= 60) {
                                                echo "Very Good";
                                            }
                                            elseif ($pr >= 50) {
                                                echo "Good";
                                            }
                                            elseif ($pr >= 40) {
                                                echo "Very Satisfactory";
                                            }
                                            else {
                                                echo "Satisfactory";
                                            }
                                              ?>
                                        </td>
                                        <td>
                                          <?php
                                          if (!$enroll) {
                                              echo'<a href="'.base_url().'enrollment/new_enrollment/'.$row->stu_reg_number.'" target="_blank" class="btn btn-primary" title="Enrollment">Enrollment</a>';
                                          }
                                          else{
                                             echo'<a href="3" target="_blank" class="btn btn-primary disabled" title=" Enrolled " >&nbsp; Enrolled &nbsp; </a>';
                                          }
                                          ?>
                                           
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#mark_model" class="btn btn-warning" title="VIEW DETAILS"
                                            onclick="stu_marks(<?=$row->id?>)">
                                                Marks
                                            </a>
                                        </td>
                                        <td>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
                                       
                                        <td>
<!--                                             <a href="<?=base_url()?>index.php/result_master/update_result/<?=$row->id?>" class="btn btn-warning" title="EDIT">
                                                <i class="fa fa-edit"></i>
                                            </a> -->
                                             <!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-warning" title="VIEW DETAILS"
                                            onclick="result_detail(<?=$row->r_id?>)">
                                                <i class="fa fa-info"></i>
                                            </a>  -->
                                            <!-- <a href="<?=base_url()?>index.php/result_master/delete/results/<?=$row->r_id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

        <script type="text/javascript">
            function result_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/result_master/result_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive/results/'+id+'/'+status);
            }
        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Result Details..</h4>
        </div>
        <div class="modal-body" id="p_d">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script>
function filter_by_name() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTables-example");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filter_by_test(id) 
{
    window.open('<?=base_url()?>result_master/list_results/'+id,"_self");
}  


 function stu_marks(id)
            {
                // alert(reg_no);
                $("#mark").html('<h3 style="color:red">Loading....</h3>');
                $("#mark").load('<?=base_url()?>index.php/result_master/marks/'+id);
            }

</script>


 <!-- Modal -->
  <div class="modal fade" id="mark_model" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Marks</h4>
        </div>
        <div class="modal-body" id="mark">
          <p>Some text in the moasddal.</p>
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>