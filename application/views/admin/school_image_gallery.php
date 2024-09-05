<link href="<?=base_url();?>assets/admin/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">
<link href="<?=base_url();?>assets/admin/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">



<div class="right_col" role="main">
                    <div class="">


                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?=$school_name->school_name?></h2>
                                        
                                        <!-- //****school image upload form -->
										<h3 style="float:right;">
                                       <form  method="post" action="<?=base_url()?>index.php/admin/upload_school_images/<?=$s_id?>" enctype="multipart/form-data">
                                    <label class="btn btn-warning" for="image" style="float:right"><i class="fa fa-plus"></i> Upload Image</label>
                                    <input type="file" id="image" name="image"   style="visibility:hidden;"  onchange="form.submit()">
                    
                                     </form>
                                   </h3>
                                    <!-- //****school image upload form -->
                                        <div class="clearfix"></div>
                                    </div>
                                     <div class="text-left">
                            <?php if($this->session->flashdata('message'))
                                    {
                                       $aa=$this->session->flashdata('message');
                                        echo $aa;
                                    }
                                    else{

                                     } ?>
                            </div>
                             <div class="x_content">
                                 <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                              <tr class="headings">
                                <th>S.No. </th>
                                <th>Images</th>
                                <th class=" no-link last"><span class="nobr">Action</span> </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i=1; foreach ($image->result() as $school_image){ ?>
                              <tr class="even pointer">
                                <td class=" "><?=$i?></td>
                              
                                <td class=" "> 
                                                <img src="<?=base_url('uploads/school_image/'.$school_image->image.'')?>" class="img-responsive" style="max-height: 150px; box-shadow:0 0 15px rgba(0,0,0,0.8); ">
                                </td>
                                <td class=" "> 
                                                <a href="<?=base_url()?>index.php/admin/delete_school_image/<?=$s_id?>/<?=$school_image->id?>" class="btn btn-warning" onclick="return confirm('Delete');"><i class="fa fa-trash-alt" ></i> delete</a>
                                </td>
                                
                              </tr>
                              <?php $i++; } ?>
                            </tbody>
                          </table>
                                        

                                    </div>
                                
                                  
                                        
                                    </div>
                                        

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                </div>
				
				
				<script src="<?=base_url();?>assets/admin/js/datatables/js/jquery.dataTables.js"></script>
<!-- <script src="<?=base_url();?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>-->
<script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>




<!-- school images model-->


<!-- add school image model -->


 
<!-- add school image model -->