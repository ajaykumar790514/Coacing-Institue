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
                                        <h2>View List</h2>
                                        
                                       
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
            <th>School Name </th>
            <th>Contact Number </th>
            <th>Email</th>
            <th>City</th>
            <th>Contact Person</th>
            <th>Images</th>
            <th class=" no-link last"><span class="nobr">Action</span> </th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($schools->result() as $row){ ?>
          <tr class="even pointer">
            <td class=" "><?=$i?></td>
            <td class=" "><?=$row->school_name?></td>
            <td class=" "><?=$row->phone_no?></td>
            <td class=" "><?=$row->email?></td>
            <td class=" "><?=$row->city?></td>
            <td class=" "><?=$row->contact_person?></td>
            <td><a href="<?=base_url()?>index.php/admin/school_image_gallery/<?=$row->id?>" class="btn btn-success btn-xs"><i class="fa fa-image"> Gallery</i></a></td>
            <td class=" last"><a class="btn btn-info btn-xs" href="<?=base_url()?>index.php/admin/edit_school/<?=$row->id?>"><i class="fa fa-pencil"> Edit</i></a>&nbsp; <a class="btn btn-warning btn-xs" href="<?=base_url()?>index.php/admin/head_master_school/<?=$row->id?>"><i class="fa fa-info"> Head Values</i></a>&nbsp;
                <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure, you want to delete')" href="<?=base_url()?>index.php/admin/delete_school/<?=$row->id?>"><i class="fa fa-ban"> Delete</i></a>
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


