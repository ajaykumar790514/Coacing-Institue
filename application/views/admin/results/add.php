<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Results</h1>
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


            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/result_master/add_result" method="post"  enctype='multipart/form-data'>
                                        <div class="form-group">
                                             <label>Test</label><span style="color:red">*</span>
                                           <select class="form-control" name="test_id" required >
                                               <option value="">---Select Test---</option>
                                               <?php 
                                               foreach ($test->result() as $test) { ?>
                                                  <option value="<?=$test->id?>"
                                                    <?php if ($test->status==1): echo "selected"; ?>
                                                      
                                                    <?php endif ?>
                                                    ><?=$test->test_name?></option>
                                             <?php  }  ?>
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <p id="check_r" style="color:red"></p>
                                            <label>Student Reg. No.</label><span style="color:red">*</span>
                                            <input   type="text" class="form-control" name="stu_reg_number" id="stu_reg_number" onkeyup="check_r(this.value)">
                                            <p class="help-block"></p>
                                        </div>
<script type="text/javascript">
function check_r(reg_number){
  
     $.ajax({
            type: "POST",
            url: "<?=base_url()?>/admin/check_reg",
            data:{reg_number:reg_number},
            cache: false,
            success: function(result)
            {
                if (result=='0') 
                {
                    $("#check_r").html('Result Already Exists');
                    // alert("Result Already Exists");
                }
                else
                {
                    $("#check_r").html('');
                }
            }

        });
}


</script>
                                        <div class="form-group">
                                             <label>Class</label><span style="color:red">*</span>
                                           <select class="form-control" name="stu_class" required >
                                               <option value="">---Select Class---</option>
                                                <option value="9">9<sup>th</sup></option>
                                                <option value="10">10<sup>th</sup></option>
                                                <option value="11">11<sup>th</sup></option>
                                                <option value="12">12<sup>th</sup></option>
                                           </select>
                                        </div>

 <script type="text/javascript">
        function cr_url(title) 
        {
        var t1 = title.replace(/[^a-zA-Z ]/g, "");
        var t2 = t1.replace(/\s\s+/g, ' ');
        var t3 = t2.trim();
        var t4 = t3.replace(/ /gi, "-");
       
       //alert(t4);
        $('#url').val(t4).text();
        }
</script>
                                         <div class="form-group">
                                            <label>Marks of Mat</label><span style="color:red">*</span>
                                            <input  type="text"  class="form-control" name="marks_mat" required="" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Marks of Physics</label><span style="color:red">*</span>
                                            <input  type="text" id="marks_sat_physics"  class="form-control" name="marks_sat_physics" onkeyup="count_total()" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Marks of Chemistry</label><span style="color:red">*</span>
                                            <input  type="text"  id="marks_sat_chemistry" class="form-control" name="marks_sat_chemistry" onkeyup="count_total()">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Marks of Math</label><span style="color:red">*</span>
                                            <input type="text" id="marks_sat_math" class="form-control" name="marks_sat_math" onkeyup="count_total()" >
                                            <p class="help-block"></p>
                                        </div>
<script type="text/javascript">
    function count_total() 
    {
        let phy = $("#marks_sat_physics").val();
        let che = $("#marks_sat_chemistry").val();
        let math = $("#marks_sat_math").val();
        var total = Number(phy)+Number(che)+Number(math);
        // alert(total);
        $("#total_marks_sat").val(total);
    }
</script>
                                        <div class="form-group">
                                            <label>Marks of Science</label><span style="color:red">*</span>
                                            <input class="form-control" id="total_marks_sat" type="text" name="marks_sat" required readonly >
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Waiver Offered</label><span style="color:red">*</span>
                                            <input type="text"  class="form-control" name="waiver_offered" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Valid Upto</label>
                                            <input type="date"  class="form-control" name="valid_upto" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                             <label>Program Offered</label><span style="color:red">*</span>
                                           <select class="form-control" name="program_offered" required >
                                               <option value="">---Select---</option>

                                                <option value="9th - (Four Year Classroom Program/Four Year Integrated School Program)">9<sup>th</sup> - (Four Year Classroom Program/Four Year Integrated School Program)
                                                </option>

                                                <option value="10th - (Three Year Classroom Program)">10<sup>th</sup> - (Three Year Classroom Program)
                                                </option>

                                                <option value="11th - (Two Year Classroom Program/Two Year  Integrated School Program)">11<sup>th</sup> - (Two Year Classroom Program/Two Year  Integrated School Program)
                                                </option>

                                                <option value="12th - (One Year Classroom Program)">12<sup>th</sup> - (One Year Classroom Program)</option>
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Disclaimer</label>
                                            <textarea rows="3"  class="form-control" name="disclaimer" > The fee Waiver is Applicable only when the child is admitted under any classroom program of JEE EXPERT</textarea>
                                            <p class="help-block"></p>
                                        </div>
                                       




                                        <!-- <div class="form-group">
                                            <label>Wallpost Url<span style="color:red">*</span></label>
                                            <input  id="url" required="" class="form-control"  name="url"  value="<?=$update->url?>" readonly>
                                            <p class="help-block"></p>
                                        </div> -->
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
  var area1, area2;
 
  function toggleArea1() {
        if(!area1) {
                area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
                for(i=1;i<=100;i++)
    {
        area2 = new nicEditor({fullPanel : true}).panelInstance('text_ns'+i,{hasPanel : true});
    }
                //$("#ext").hide();
        } else {
                area1.removeInstance('myArea1');
                area1 = null;
        }
  }
 
  function addArea2() {
        area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');
  }
  function removeArea2() {
        //area2.removeInstance('myArea2');
        area1.removeInstance('markItUp');
        $("#ext").show();
  }

  function enableEditor()
  {
    area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
  }
 
  bkLib.onDomLoaded(function() { toggleArea1(); });
  //]]>
  </script>

 <script type="text/javascript">
    function extract_keywords()
    {
        var d1 = new nicEditors.findEditor('markItUp').getContent();
        var description = $(d1).text();
        if(description=="")
        {
            description = d1;
        }
        var description1 = description.replace(/[^a-zA-Z ]/g, "");
        
        var dataString = "paragraph="+description1;
        $.ajax({
        url: "<?=base_url()?>keyphrase_extraction/product_keywords.php",
        type: "GET",
        data:  dataString,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
        document.getElementById('meta_keywords').value = data;
        document.getElementById('meta_description').value = description;
    },
    error: function(){}             
    });
        
    }
</script>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 