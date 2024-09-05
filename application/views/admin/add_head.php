<!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <!-- <h3>Add City</h3> -->
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add head<small>add here..</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/add_head" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="head_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select a Step <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select required="" class="form-control col-md-7 col-xs-12" name="step_id">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($steps->result() as $step){ ?>
                                                        <option value="<?=$step->id?>"><?=$step->step_name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Input Type <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select required="" class="form-control col-md-7 col-xs-12" name="input_type">
                                                    <option value="1">Optional</option>
                                                    <option value="3">Multi Select</option>
                                                </select>
                                            </div>
                                        </div>
										
                                        
									
                                
                            <div class="clearfix"></div>
                            
										
										
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </div>
										
										

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    



                    


                    


                    
                </div>
                <!-- /page content -->
				
				
		  
		   
 <script src="<?=base_url()?>assets/admin/js/niceedit/niceedit.js"></script>

        