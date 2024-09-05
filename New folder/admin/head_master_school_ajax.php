                                    <form id="school_head" role="form" class="form-horizontal form-label-left">

                                        <h1 class="text-center"><u>Manage School Head Value Below</u></h1>
                                        
                                        <?php foreach($steps->result() as $step){ ?>
                                            <div class="col-md-12 col-sm-12 col-xs-12 well" style="margin-bottom: 20px">
                                                <h3><?=$step->step_name?></h3><hr>
                                                <?php $heads = $this->admin_model->heads_by_step($step->id); ?>
                                                <?php foreach($heads->result() as $head){ ?>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 well" style="background-color: white">
                                                        <h4><?=$head->head_name?></h4><hr>
                                                        <?php $head_values = $this->admin_model->head_values_by_head($head->id); ?>
                                                            <?php foreach($head_values->result() as $hv){ ?>
                                                                
                                                                <div class="checkbox">
                                                                <label style="font-size: 1.5em">
                                                                <?php if(in_array($hv->id, $school_head_values)){ ?>
                                                                    <input type="checkbox" name="head_value[]" value="<?=$hv->id?>" checked>
                                                                 <?php }else{ ?>
                                                                    <input type="checkbox" name="head_value[]" value="<?=$hv->id?>">
                                                                 <?php } ?>
                                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                    <?=$hv->value?>
                                                                </label>
                                                            </div>
                                                            <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        

                                        
                                
                            <div class="clearfix"></div>
                            
										
										
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                
                                                <input type="submit" class="btn btn-warning btn-lg" value="APPLY" />
                                                
                                            </div>
                                        </div>
										
										

                                    </form>
                                

        