<section id="compare1" class="fadeInUp">
<div class="container">
  <div class="row well">
    <div class=" col-md-12" >
      
     

        <form id="filter_form" method="post">
          <input type="text" name="id" value="<?=$id?>" hidden>
        <?php $steps= $this->model->get_steps(); ?>
        <?php $j=1; foreach($steps->result() as $step){ ?>
          
          <div id="home<?=$j?>">
            <h2 class="text-center" style="color: #50d8af"><?=$step->step_name?></h2>
             
          
              <div class="" style="">

                <!--------------------------------HEAD DATA--------------------------------->
                    <?php $heads = $this->model->heads_by_step($step->id); ?>
                    <?php foreach($heads->result() as $head){ ?>
                      <div class="col-sm-4">
                      <h4 style="color: #0c2e8a"><?=$head->head_name?></h4>
                      <?php $this->db->where('head_id',$head->id);
                        $values = $this->db->get('head_values');
                        
                      ?>
                      <?php if($head->input_type==1){ ?>
                        <select class="form-control" style="min-width: 200px;height:50px" name="single[]">
                            <option value="">--Select--</option>
                          <?php foreach($values->result() as $value){ ?>
                            <option value="<?=$value->id?>"><?=$value->value?></option>
                          <?php } ?>
                        </select>

                      <?php } elseif($head->input_type==2){?>
                        <?php foreach($values->result() as $value){ ?>
                          <div class="checkbox">
                              <label style="font-size: 1.5em">
                                <input type="checkbox" name="multiple[]" value="<?=$value->id?>">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                <?=$value->value?>
                              </label>
                          </div>
                          <?php } ?>
                      <?php } ?>
                    </div>
                    <?php } ?>
                <!--------------------------------HEAD DATA--------------------------------->
                
                <!------------NEXT BUTTON------------------->
                <div class="text-center col-md-12"  ><hr>
                <?php if($step->is_final_step==0){ ?>
                    

                      <?php if($j!=1){ ?>
                      <a style="background-color: #50d8af;color:white" onclick="load_prev(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg " >PREVIOUS</a>&nbsp;
                     <?php } ?>

                      <a style="background-color: #0c2e8a;color:white" href="<?=base_url()?>" class="btn btn-lg ">SKIP</a>
                      <a style="background-color: #0c2e8a;color:white" onclick="load_next(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg ">NEXT</a>

                    
                <?php }elseif($step->is_final_step==1){ ?>
                    <a style="background-color: #50d8af;color:white" onclick="load_prev(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg " >PREVIOUS</a>&nbsp;

                      <input type="submit" class="btn btn-lg btn-success" name="SUBMIT">
                <?php } ?>
                </div>
                <!------------NEXT BUTTON------------------->
              </div>

               
        <script type="text/javascript">
          $( document ).ready(function() {
            var x = '<?=$j?>';
              if(x!=1)
              {

                $("#home"+x).hide();
              }
          });

            
        </script>
          

          </div>
        <?php $j++; } ?>


        
      </form>

      <div id="msg12" style="min-height: 500px">
      </div>

        
    <script type="text/javascript">
      function load_next(x)
          {
            var i = x+1;
            $("#home"+i).show();
            $("#home"+x).hide();
          }

          function load_prev(x)
          {
            var i = x-1;
            $("#home"+i).show();
            $("#home"+x).hide();
          }
    </script> 

    <script type="text/javascript">
          $( document ).ready(function() {
           
                $("#msg12").hide();
              
          });

          
        </script> 

    <script>
        $(document).ready(function (e){
        $("#filter_form").on('submit',(function(e){
           var count = '<?=$j-1?>';
        for(var i =1;i<=count;i++)
        {
          $("#home"+i).hide();
        }
        $("#msg12").html('<img src="<?=base_url()?>assets/school/img/preloader.gif">');
       
        e.preventDefault();
        $.ajax({
        url: "<?=base_url()?>index.php/welcome/enquiry_step_2",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          $("#msg12").show();
        $("#msg12").html(data);
        //$("#enquiry_form")[0].reset();
        },
        error: function(){}             
        });
        }));
        });
    </script>
     
      
    </div>

    
  </div>
</div>
</section>
