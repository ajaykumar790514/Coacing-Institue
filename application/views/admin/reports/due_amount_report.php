<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Due Amount Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Class:</label>
                        <select name="class" id="class" class="form-control class" >
                            <option value="">--select--</option>
                            <?php foreach($class as $c):?>
                             <option value="<?=$c->class;?>"><?=$c->class;?></option>
                            <?php endforeach;?>    
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Program:</label>
                        <select name="program" id="program" class="form-control program" >
                            <option value="">--select--</option>
                             
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Batch:</label>
                        <select name="batch" id="batch" class="form-control batch" >
                            <option value="">--select--</option>   
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Search:</label>
                        <input type="text" class="form-control" name="search" id="search">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Start Date:</label>
                        <input type="date" class="form-control"  value="<?=date('Y-m-d');?>" id="start_date">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">End Date:</label>
                        <input type="date" class="form-control"   value="<?=date('Y-m-d');?>" id="end_date">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Due Days:</label>
                        <select id="duedays" class="form-control">
                        <option value="">--- Select ---</option>
                        <option value="1">1 Day</option>
                        <option value="2">2 Days</option>
                        <option value="3">3 Days</option>
                        <option value="4">4 Days</option>
                        <option value="5">5 Days</option>
                        <option value="6">6 Days</option>
                        <option value="7">7 Days</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2" style="margin-top:25px">
                <button type="button" onclick="exportToCSV()" class="btn btn-warning btn-sm "><i class="fa fa-download"></i> Emport to Excel</button>
                
                </div>
            </div>
            <div class="row">
                <div id="batch2"></div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Due Amount Report here
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Program</th>
                                        <th>Batch</th>
                                        <th>Enroll. No.</th>
                                        <th>Student Name</th>
                                        <th>Mobile No</th>
                                        <th>Alternate Mobile No</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                                    <?php $total=0;$n=1; foreach($students as $row){
                                        $stu_program="";
                                        $stu_batch="";
                                        foreach ($programs as $pro) {
                                            if ($row->stu_program==$pro->id) {
                                                $stu_program=$pro->program;
                                            }
                                        }

                                        foreach ($batch as $bat) {
                                            if ($row->stu_batch==$bat->id) {
                                                $stu_batch=$bat->batch;
                                            }
                                        }
                                       
                                     ?>

                                    <tr class="">
                                        <td><?=$n?></td>
                                        <td>
                                            <?=$row->stu_class?>
                                        <input type="hidden" id="stu_class<?=$row->stu_id?>" value="<?=$row->stu_class?>">        
                                        </td>
                                        <td>
                                              <?=$stu_program?>
                                         </td>
                                         <td>
                                            <?php 
                                              echo $stu_batch;?>
                                        </td>
                                        <td><?=$row->enrollment_no?></td>
                                        <td><?=$row->name?>
                                        s\o  ( 
                                            <?php
                                        // Serialized string
                                        $serialized_string = $row->father;
                                        $data = unserialize($serialized_string);
                                        if (isset($data['name'])) {
                                            echo $data['name'];
                                        } else {
                                            echo "Name not found.";
                                        }
                                        ?>

                                        )</td>
                                        <td>
                                            <?=$row->mobile_no?>  
                                        </td>
                                        <td>
                                        <?=$row->mobile_no2?>
                                        </td>
                                        <td>
                                            <?php
                                            echo date('d F Y', strtotime($row->duedate));?>
                                            </td>
                                        <td>Rs.<?=$row->due?></td>
                                    </tr>
                                    <?php $total=$total+$row->due; $n++; } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b>Rs.<?=$total;?></b></td>
                                    </tr>
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
      
<script>

function exportToCSV() {
    let table = document.getElementById("dataTables-example");
    let rows = table.querySelectorAll("tr");
    let csv = [];
    for (let i = 0; i < rows.length; i++) {
        let row = [],
            cols = rows[i].querySelectorAll("td, th");
        for (let j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        csv.push(row.join(","));
    }
    let currentDate = new Date();
    let formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate();
    let currentTime = currentDate.getHours() + '-' + currentDate.getMinutes() + '-' + currentDate.getSeconds();
    let filename = formattedDate  + '-due-amount-report.csv'; // Generate filename based on current date and time
    let csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
    let encodedUri = encodeURI(csvContent);
    let link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", filename);
    link.click();
}

 
    $(document).ready(function(){
        
        $('#class').change(function(){
            var class_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url("Enrollment/get_programs"); ?>',
                type: 'post',
                data: {class_id: class_id},
                dataType: 'json',
                success: function(response){
                    $('#program').html(response);
                    loadTableData();
                }
            });
        });

        $('#program').change(function(){
            var program_id = $(this).val();
            var class_id = $('#class').val();
            $.ajax({
                url: '<?php echo base_url("Enrollment/get_batches"); ?>',
                type: 'post',
                data: {program_id: program_id,class_id:class_id},
                dataType: 'json',
                success: function(response){
                    $('#batch').html(response);
                    loadTableData();
                }
            });
        });

        $('#batch').change(function(){
            loadTableData();
        });
        $('#start_date').change(function(){
            loadTableData();
        });
        $('#end_date').change(function(){
            loadTableData();
        });
        $('#duedays').change(function(){
            loadTableData();
        });

        $('#search').keyup(function(){
            loadTableData();
        });

        function loadTableData() {
            var batch = $('#batch').val();
            var classs = $('#class').val();
            var program = $('#program').val();
            var search = $('#search').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var search = $('#search').val();
            var duedays = $('#duedays').val();
            $.ajax({
                url: '<?php echo base_url("Admin/load_dueamount_table_data"); ?>',
                type: 'post',
                data: {batch: batch, search: search,program:program,class:classs,start_date:start_date,end_date:end_date,duedays:duedays},
                success: function(response){
                    $('#table_data').html(response);
                }
            });
        }
    });
</script>

        <script type="text/javascript">
      
            

            function reload_table()
            {
                $('#table_data').load('<?=base_url()?>enrollment/reload_enrollment_table');
            }
        </script>


  