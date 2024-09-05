<style type="text/css">
    .checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
</style>

<!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">

                                    <div class="well">
                                        <h2 class="text-center">SCHOOL DETAILS</h2><hr>
                                        <table class="table" style="font-size: 18px">
                                <tr>
                                    
                                    <td><?=$school->school_name?></td>
                                
                                    
                                    <td><?=$school->phone_no?></td>
                                
                                    
                                    <td><?=$school->email?></td>
                                </tr>
                               
                            </table>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div id="msg">
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
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- /page content -->

                <script>
                    $(document).ready(function (e){
                    $("#school_head").on('submit',(function(e){
                    $("#msg").html('<h2 class="text-center" style="color:red">LOADING......</h2>');
                    e.preventDefault();
                    $.ajax({
                    url: "<?=base_url()?>index.php/admin/apply_heads/<?=$school->id?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                    $("#msg").html(data);
                    //$("#enquiry_form")[0].reset();
                    },
                    error: function(){}             
                    });
                    }));
                    });
                </script>
				
				
		  
		   
 <script src="<?=base_url()?>assets/admin/js/niceedit/niceedit.js"></script>

        