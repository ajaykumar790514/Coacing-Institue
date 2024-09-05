<!-- <?php
			//echo "<pre>";
			//print_r($update);
			?> -->
<style type="text/css">
	.update-img
	{
		height: 320px;
		width:;
	}
	@media(max-width:600px)
	{
		.update-img
		{
			height:200px;
			width:!important;
		}
	}

</style>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-8" style="height: ;background-color: ;">
			<div class="section-header">
          <h2><?=$update->title?></h2>
        </div>
			<div class="pic "><img 
                onerror="this.src='<?=base_url()?>images/updates/default.jpg'"
                src="<?=base_url()?>images/updates/<?=$update->img?>" alt="" class="update-img" ></div>
             <div class="">
            <h2><?=$update->meta_description?></h2>
            <p style="text-align: justify;text-justify: inter-word;">
               <?=$update->description?>
            </p>
       		 </div>
		</div>
		<div class="col-md-4 " style="height:;background-color: ;">
			<h3>Recent Updates</h3>
					<ul style="overflow-y:scroll; height:400px;">
					<?php foreach($recent_updates->result() as $ru){ ?>
						<li style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%; margin-bottom: 5px">
							
							<a href="<?=base_url()?>index.php/welcome/update_details/<?=$ru->id?>"><span class="fa fa-angle-right" aria-hidden="true"></span>
							
							<img width="50px" height="50px" 
							 onerror="this.src='<?=base_url()?>images/updates/default.jpg'"
							src="<?=base_url()?>images/updates/<?=$ru->img?>">&nbsp;
							<?=$ru->title?>
							<br>
							</a>
						</li>
					<?php } ?>


					</ul>
		</div>
	</div>
</div>



