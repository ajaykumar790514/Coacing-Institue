<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Test</h1>
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
                                    <br />

<?php
$windows1=$test->windows1;

$windows2=explode(",",$test->windows2);
$windows2_1=$windows2[0];
$windows2_2=$windows2[1];

$windows3=explode(",",$test->windows3);
$windows3_1=$windows3[0];
$windows3_2=$windows3[1];

$windows4=$test->windows4;
?>
            <div class="row well">
                <a href="<?php echo base_url('index.php/test_master/list_test'); ?>" style="float:right;" class="btn btn-warning">
                            <i class="fa fa-list"></i> List </a>
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>

                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/test_master/Update_test/<?=$test->id?>" enctype="multipart/form-data" method="post">
                                        

                                        <div class="form-group">
                                            <label>Test Name<span style="color:red;">*</span></label>
                                            <input type="text" id="test_name" class="form-control" name="test_name" required value="<?=$test->test_name?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Registration Date Till<span style="color:red;">*</span> </label>
                                            <input type="date" id="reg_date" class="form-control" name="reg_date" value="<?=$test->reg_date?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Test Date<span style="color:red;">*</span>
                                            <p id="aa"></p> </label>
                                            <input type="date" id="test_date" class="form-control" name="test_date" required onchange="check_test()" value="<?=$test->test_date?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Session<span style="color:red;">*</span></label>
                                            <input type="text" id="session" class="form-control" name="session" required value="<?=$test->session?>" >
                                            <p class="help-block"></p>
                                        </div>
                                        <?php
                                         // $time=  explode("-",$test->test_time);
                                         // $time1=explode(" ",$time[0]);
                                         // $time2=explode(" ",$time[1]);
                                      
                                         ?>
                                        <!-- <div class="form-group">
                                            <label>Test Time<span style="color:red;">*</span></label>
                                            <input type="time" id="" class="form-control" name="test_time1" value="<?=$time1[0]?>" required  >
                                            to
                                             <input type="time" id="" class="form-control" name="test_time2" required value="<?=$time2[1]?>">
                                            
                                            <p class="help-block"></p>
                                        </div> -->
                                        <?php
                                         $peper1time=  explode("-",$test->paper_1_time);
                                         $peper1time1=explode(" ",$peper1time[0]);
                                         $peper1time2=explode(" ",$peper1time[1]);


                                         $peper2time=  explode("-",$test->paper_2_time);
                                         $peper2time1=explode(" ",$peper2time[0]);
                                         $peper2time2=explode(" ",$peper2time[1]);
                                      
                                         ?>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Paper I Time<span style="color:red;">*</span></label>
                                                <input type="time" id="" class="form-control" name="test_time1" value="<?=$peper1time1[0]?>" required  style="width:70%;" >
                                                to
                                                 <input type="time" id="" value="<?=$peper1time2[1]?>" class="form-control" name="test_time2" required style="width:70%;" >
                                                
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Paper II Time<span style="color:red;">*</span></label>
                                                <input type="time" id="" value="<?=$peper2time1[0]?>" class="form-control" name="time1" required  style="width: 70%;" >
                                                to
                                                 <input type="time" id="" value="<?=$peper2time2[1]?>" class="form-control" name="time2" required style="width:70%;" >
                                                
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Total Marks of Mat<span style="color:red;">*</span>
                                            <p id="aa"></p> </label>
                                            <input type="text" id="total_marks_mat" class="form-control" name="total_marks_mat" value="<?=$test->total_marks_mat?>" required>
                                            <p class="help-block"></p>
                                        </div> -->

 <h4>
    Marks<span style="color:red;">*</span>
    <span id="errmsg" style="color: red;font-weight: bold"></span>
</h4>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Class</th>
                <th>MAT</th>
                <th>Physics</th>
                <th>Chemistry</th>
                <th>Math</th>
                <th>Total Marks of Science</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>9</td>
                <td>
                    <input type="text" id="mat9" class="form-control" name="mat9" required value="<?=$class_9->MAT?>">
                </td>
                <td>
                    <input type="text" id="phy9" class="form-control" name="phy9" required onkeyup="count_total('9')" value="<?=$class_9->physics?>">
                </td>
                <td>
                    <input type="text" id="che9" class="form-control" name="che9" required onkeyup="count_total('9')" value="<?=$class_9->chemistry?>">
                </td>
                <td>
                    <input type="text" id="math9" class="form-control" name="math9" required onkeyup="count_total('9')" value="<?=$class_9->math?>">
                </td>
                <td>
                    <input readonly type="text" id="total9" class="form-control" name="total9" value="<?=$class_9->total?>" >
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>
                    <input type="text" id="mat10" class="form-control" name="mat10" required value="<?=$class_10->MAT?>">
                </td>
                <td>
                    <input type="text" id="phy10" class="form-control" name="phy10" required onkeyup="count_total('10')" value="<?=$class_10->physics?>">
                </td>
                <td>
                    <input type="text" id="che10" class="form-control" name="che10" required onkeyup="count_total('10')" value="<?=$class_10->chemistry?>">
                </td>
                <td>
                    <input type="text" id="math10" class="form-control" name="math10" required onkeyup="count_total('10')" value="<?=$class_10->math?>">
                </td>
                <td>
                    <input readonly type="text" id="total10" class="form-control" name="total10" value="<?=$class_10->total?>" >
                </td>
            </tr>
            <tr>
                <td>11</td>
                <td>
                    <input type="text" id="mat11" class="form-control" name="mat11" required value="<?=$class_11->MAT?>">
                </td>
                <td>
                    <input type="text" id="phy11" class="form-control" name="phy11" required onkeyup="count_total('11')" value="<?=$class_11->physics?>">
                </td>
                <td>
                    <input type="text" id="che11" class="form-control" name="che11" required onkeyup="count_total('11')" value="<?=$class_11->chemistry?>">
                </td>
                <td>
                    <input type="text" id="math11" class="form-control" name="math11" required onkeyup="count_total('11')" value="<?=$class_11->math?>">
                </td>
                <td>
                    <input readonly type="text" id="total11" class="form-control" name="total11" value="<?=$class_11->total?>">
                </td>
            </tr>
            <tr>
                <td>12</td>
                <td>
                    <input type="text" id="mat12" class="form-control" name="mat12" required value="<?=$class_12->MAT?>">
                </td>
                <td>
                    <input type="text" id="phy12" class="form-control" name="phy12" required onkeyup="count_total('12')" value="<?=$class_12->physics?>">
                </td>
                <td>
                    <input type="text" id="che12" class="form-control" name="che12" required onkeyup="count_total('12')" value="<?=$class_12->chemistry?>">
                </td>
                <td>
                    <input type="text" id="math12" class="form-control" name="math12" required onkeyup="count_total('12')" value="<?=$class_12->math?>">
                </td>
                <td>
                    <input readonly type="text" id="total12" class="form-control" name="total12" value="<?=$class_12->total?>">
                </td>
            </tr>
            <tr>
                <td>13</td>
                <td>
                    <input type="text" id="mat13" class="form-control" name="mat13" required value="<?=$class_13->MAT?>">
                </td>
                <td>
                    <input type="text" id="phy13" class="form-control" name="phy13" required onkeyup="count_total('13')" value="<?=$class_13->physics?>">
                </td>
                <td>
                    <input type="text" id="che13" class="form-control" name="che13" required onkeyup="count_total('13')" value="<?=$class_13->chemistry?>">
                </td>
                <td>
                    <input type="text" id="math13" class="form-control" name="math13" required onkeyup="count_total('13')" value="<?=$class_13->math?>">
                </td>
                <td>
                    <input readonly type="text" id="total13" class="form-control" name="total13" value="<?=$class_13->total?>">
                </td>
            </tr>
        </tbody>
    </table>
              
    <h4>
    Windows Test Date<span style="color:red;">*</span>
    <span id="errmsg" style="color: red;font-weight: bold"></span>
    </h4>

    <table class="table table-bordered windod_date">
      <tbody>
        <tr>
          <th>Window - 1 Date</th>
          <th>Window - 2 Date</th>
          <th>Window - 3 Date</th>
          <th>Window - 4 Date</th>
        </tr>
        <tr>
          <td>
            <input type="date" name="window_date1" id="window_date1" value="<?=$windows1?>" required >
          </td>
          <td>
            <input type="date" name="window_date2_1" id="window_date2_1" value="<?=$windows2_1?>" required>
            <input type="date" name="window_date2_2" id="window_date2_2" value="<?=$windows2_2?>" required>
          </td>
          <td>
            <input type="date" name="window_date3_1" id="window_date3_1" value="<?=$windows3_1?>" required>
            <input type="date" name="window_date3_2" id="window_date3_2" value="<?=$windows3_2?>" required>
          </td>
          <td>
            <input type="date" name="window_date4" id="window_date4" value="<?=$windows4?>" required>
          </td>
        </tr>
      </tbody>
      </table>  

       <h4>
        Fees <span style="color:red;">*</span>
    <span id="errmsg" style="color: red;font-weight: bold"></span>
    </h4>

    <table class="table table-bordered windod_date">
      <tbody>
        <tr>
          <td>
            From 
          </td>
          <td>
            <input type="date" name="from1"  class="form-control input-sm"  required value="<?=$fees_9[0]->from_date?>" >
           
          </td>
          <td>
            <input type="date" name="from2"  class="form-control input-sm"  required value="<?=$fees_9[1]->from_date?>">
           
          </td>
          <td>
            <input type="date" name="from3"  class="form-control input-sm" required value="<?=$fees_9[2]->from_date?>">
          </td>
          <td>
            <input type="date" name="from4"  class="form-control input-sm" required value="<?=$fees_9[3]->from_date?>">
          </td>
        </tr>
        <tr>
          <td>
            To 
          </td>
          <td>
            <input type="date" name="to1" class="form-control input-sm" required value="<?=$fees_9[0]->to_date?>" >
          </td>
          <td>
            <input type="date" name="to2" class="form-control input-sm" required value="<?=$fees_9[1]->to_date?>">
           
          </td>
          <td>
            <input type="date" name="to3" class="form-control input-sm" required value="<?=$fees_9[2]->to_date?>">
          </td>
          <td>
            <input type="date" name="to4" class="form-control input-sm" required value="<?=$fees_9[3]->to_date?>">
          </td>
        </tr>
        <tr>
          <td>
            Fee Class 9
          </td>
          <td>
            <input type="number" name="fee1_9" class="form-control input-sm" required  value="<?=$fees_9[0]->fee?>" >
           
          </td>
          <td>
            <input type="number" name="fee2_9" class="form-control input-sm" required value="<?=$fees_9[1]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee3_9" class="form-control input-sm" required value="<?=$fees_9[2]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee4_9" class="form-control input-sm" required value="<?=$fees_9[3]->fee?>" >
          </td>
        </tr>

        <tr>
          <td>
            Fee Class 10
          </td>
          <td>
            <input type="number" name="fee1_10" class="form-control input-sm" required value="<?=$fees_10[0]->fee?>">
           
          </td>
          <td>
            <input type="number" name="fee2_10" class="form-control input-sm" required value="<?=$fees_10[1]->fee?>">
          </td>
          <td>
            <input type="number" name="fee3_10" class="form-control input-sm" required value="<?=$fees_10[2]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee4_10" class="form-control input-sm" required value="<?=$fees_10[3]->fee?>">
          </td>
        </tr>

        <tr>
          <td>
            Fee Class 11
          </td>
          <td>
            <input type="number" name="fee1_11" class="form-control input-sm" required value="<?=$fees_11[0]->fee?>" >
           
          </td>
          <td>
            <input type="number" name="fee2_11" class="form-control input-sm" required value="<?=$fees_11[1]->fee?>">
          </td>
          <td>
            <input type="number" name="fee3_11" class="form-control input-sm" required value="<?=$fees_11[2]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee4_11" class="form-control input-sm" required value="<?=$fees_11[3]->fee?>">
          </td>
        </tr>

        <tr>
          <td>
            Fee Class 12
          </td>
          <td>
            <input type="number" name="fee1_12" class="form-control input-sm" required value="<?=$fees_12[0]->fee?>">
           
          </td>
          <td>
            <input type="number" name="fee2_12" class="form-control input-sm" required value="<?=$fees_12[1]->fee?>">
          </td>
          <td>
            <input type="number" name="fee3_12" class="form-control input-sm" required value="<?=$fees_12[2]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee4_12" class="form-control input-sm" required value="<?=$fees_12[3]->fee?>">
          </td>
        </tr>
        <tr>
          <td>
            Fee Class 13
          </td>
          <td>
            <input type="number" name="fee1_13" class="form-control input-sm" required value="<?=$fees_13[0]->fee?>" >
           
          </td>
          <td>
            <input type="number" name="fee2_13" class="form-control input-sm" required value="<?=$fees_13[1]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee3_13" class="form-control input-sm" required value="<?=$fees_13[2]->fee?>" >
          </td>
          <td>
            <input type="number" name="fee4_13" class="form-control input-sm" required value="<?=$fees_13[3]->fee?>" >
          </td>
        </tr>
      </tbody>
      </table>                      


                                  <!--  <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="desc">
                                            <p class="help-block"></p>
                                        </div> -->
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" id="submitbtn" class="btn btn-default" >Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    <div style="clear: both;"></div>



<script type="text/javascript">
function check_test(){ 
           var test_date = $("#test_date").val(); 
            $.ajax({ 

                     url:"<?php echo base_url(); ?>index.php/admin/check_test",  
                     method:"POST",  
                     data:{test_date:test_date}, 
                    success:function(data)  
                     { 
                      // alert(data);
                       
                        if(data.trim()=='1')
                        {
                          $("#aa").html('<span style="color:red;"> Test Already Added. </span>');
                          // $("#submitbtn").addClass("disabled");
                        }
                        else
                        {
                           $("#aa").html('<span style="color:;"></span>');
                            // $("#submitbtn").removeClass("disabled");
                        }
                        
                     }  
                });
      };    
 

  $(document).ready(function () {

  $("#phy9,#phy10,#phy11,#phy12,#phy13,#che9,#che10,#che11,#che12,#che13,#math9,#math10,#math11,#math12,#math13,mat9,#mat10,#mat11,#mat12,#mat13").keypress(function (e) {
    
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      
        $("#errmsg").html(" <i class='fa fa-times' aria-hidden='true'></i> Digits Only").show().fadeOut(1500);
               return false;
    }
   });
});


  function count_total(clas) 
    {
        // alert(clas);
        let phy = $("#phy"+clas).val();
        let che = $("#che"+clas).val();
        let math = $("#math"+clas).val();
        var total = Number(phy)+Number(che)+Number(math);
        // alert(total);
        $("#total"+clas).val(total);
    }    

</script>