 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  table
  {
    border:1px white solid;
  }
  table th
  {
    border:1px white solid;
    color: #FFFFFF; 
    background-color: #50D8AF;
  }
  table td
  {
    border:1px white solid;
    color: #0A2A1B; 
     background-color:#E6E6E6;
  }
</style>
    <!--==========================
      school profile
    ============================-->
    <?php foreach ($profile->result() as $school) {
      
    } ?>
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2><?=$school->school_name?></h2>
          <p><?=$school->description?></p>
        </div>
        <div>
          <?php if ($school->image==null) {  } 
                else  { ?>
                    <img src="<?=base_url()?>uploads/school_image/<?=$school->image?>" width="200px">
          <?php } ?>
        </div>
        <br>
        <div class="row contact-info">
          <table class="table">
             <tr><th ">School Founded</th>  <td  class=""><?=$school->established_on?></td></tr>
             <tr><th ">Contact Person</th>  <td  "><?=$school->contact_person?></td></tr>
             <tr><th ">Website</th>         <td><?=$school->website?></td></tr>
             <tr><th >Phone No.</th>       <td><?=$school->phone_no?></td></tr>
             <tr><th >Email</th>           <td><?=$school->email?></td></tr>
             <tr><th >Address</th>         <td><?=$school->address?>, 
											<?php $this->load->model('model');
												$city=$this->model->get_city($school->city); 
												echo $city->name;?>,
											<?php $this->load->model('model');
												$state=$this->model->get_state($school->state); 
												echo $state->name;?>,
                                                <?=$school->pincode?>.
                                                                </td></tr>
          </table>

        </div>
      </div>

      
      <div class="container">

          <ul class="nav nav-tabs">
            <li class=""><a data-toggle="tab" href="#curriculam">Curriculam</a></li>
            <li><a data-toggle="tab" href="#facility">Facility</a></li>
            <li><a data-toggle="tab" href="#open_days">Open Days</a></li>
            <li><a data-toggle="tab" href="#special_programs">Special Programs</a></li>
            <li><a data-toggle="tab" href="#fee_structure">Fee Structure</a></li>
          </ul>

          <div class="tab-content">
            <div id="curriculam" class="tab-pane fade in active">
              <h3>Curriculam</h3>
              <p><?=$school->curriculam?></p>
            </div>
            <div id="facility" class="tab-pane fade">
              <h3>Facility</h3>
              <p><?=$school->facility?></p>
            </div>
            <div id="open_days" class="tab-pane fade">
              <h3>Open Days</h3>
              <p><?=$school->open_days?></p>
            </div>
            <div id="special_programs" class="tab-pane fade">
              <h3>Special Programs</h3>
              <p><?=$school->special_programs?></p>
            </div>
			<div id="fee_structure" class="tab-pane fade">
              <h3>Fee Structure</h3>
              <p><?php if($school->admission_fees)
						{
							echo "Admission Fees - " . $school->admission_fees."<br>";
						}
						else{}
						
						if($school->average_qurterly_fees)
						{
							echo"Average Qurterly Fees - " . $school->average_qurterly_fees."<br>";
						}
						else{}
						
						
						if($school->class_wise_fees)
						{
							echo"Class Wise Fees - " . $school->class_wise_fees."<br>";
						}
						else{}
						?>
						
						
			</p>
            </div>
          </div>
        </div>
        </div>

      </div>
<br>
      <div class="container">
        <hr>
        <h3>Gallery</h3>
   <?php foreach ($image->result() as $s_image) { ?>
            <div class="col-md-2 col-sm-3 col-xs-4" style="margin:10px; box-shadow:0 0 15px rgba(0,0,0,0.8);">
              <a href="<?=base_url()?>uploads/school_image/<?=$s_image->image?>" target="_blank">
            <img src="<?=base_url()?>uploads/school_image/<?=$s_image->image?>" class="img-responsive" width="100%" ></a>
            </div>
          <?php  } ?>
</div>

    </section><!-- #contact -->