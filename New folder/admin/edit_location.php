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
                                    <h2>Edit Location<small>add here..</small></h2>
                                    <a style="float:right" href="<?=base_url()?>index.php/admin/list_locations" class="btn btn-info">LIST</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/edit_location/<?=$location->id?>" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="location" value="<?=$location->location?>">
                                            </div>
                                        </div>

                                        

                                        <!-- <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control col-md-7 col-xs-12" id="country" name="country" required="" onchange="load_states()">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($countries->result() as $c){?>
                                                         <option value="<?=$c->id?>"><?=$c->name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            function load_states()
                                            {
                                                var country = $("#country").val();
                                                $("#state_list").html('LOADING.....');
                                                $("#state_list").load('<?=base_url()?>index.php/admin/load_states/'+country);
                                            }
                                        </script>

                                        <script type="text/javascript">
                                            function load_cities()
                                            {
                                                var state = $("#state").val();
                                                $("#city_list").html('LOADING.....');
                                                $("#city_list").load('<?=base_url()?>index.php/admin/load_cities/'+state);
                                            }
                                        </script>

                                        

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="state_list"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="city_list"></span>
                                            </div>
                                        </div> -->

                                        
                                        
									
                                        
									
                                
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

        