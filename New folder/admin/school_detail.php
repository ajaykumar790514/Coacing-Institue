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
                                        <h2>View School Detail</h2>
										
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                 
                                        <div class="well">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>School Name</th>
                                                    <td colspan="3"><?=$school->school_name?></td>
                                                    
                                                    
                                                </tr>
                                                <tr>
                                                    <th>Mobile</th>
                                                    <td><?=$school->phone_no?></td>
                                                    <th>Email</th>
                                                    <td><?=$school->email?></td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td><?=$school->country?></td>
                                                    <th>State</th>
                                                    <td><?=$school->state?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td><?=$school->city?></td>
                                                    <th>Location</th>
                                                    <td><?=$school->location?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?=$school->address?></td>
                                                    <th>Pincode</th>
                                                    <td><?=$school->pincode?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Person</th>
                                                    <td><?=$school->contact_person?></td>
                                                    <th>Website</th>
                                                    <td><?=$school->website?></td>
                                                </tr>
                                                <tr>
                                                    <th>Established On</th>
                                                    <td><?=$school->established_on?></td>
                                                    <th>Classes</th>
                                                    <td><?=$school->classes?></td>
                                                </tr>
                                                <tr>
                                                    <th>Board</th>
                                                    <td><?=$school->board?></td>
                                                    <th>Stream</th>
                                                    <td><?=$school->stream?></td>
                                                </tr>
                                                <tr>
                                                    <th>Type Of School</th>
                                                    <td><?=$school->type_of_school?></td>
                                                    <th>Activities</th>
                                                    <td><?=$school->activities?></td>
                                                </tr>
                                                <tr>
                                                    <th>Available</th>
                                                    <td><?=$school->available?></td>
                                                    <th>Facilities</th>
                                                    <td><?=$school->facilities?></td>
                                                </tr>
                                                <tr>
                                                    <th>Admission Fees</th>
                                                    <td><?=$school->admission_fees?></td>
                                                    <th>Average Quarterly Fees</th>
                                                    <td><?=$school->average_qurterly_fees?></td>
                                                </tr>
                                                <tr>
                                                    <th>Classes wise Fees</th>
                                                    <td colspan="3"><?=$school->class_wise_fees?></td>
                                                    
                                                </tr>
                                            </table>
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