<br>
<br>
<div class="row">
<!-- <div class="img-responsiv col-sm-12">
					<center><img src="<?=base_url()?>images/about/<?=$about_page->image?>" style="width:100%;height: 320px"></center>
</div> -->
	<div class="container">
	
		<div class="row">
			
			<!-- <div class="container">
				
			</div> -->
			<div class="section-header">
				<br>
				<h2>Key Achievements</h2>
			</div>
			<div class="col-sm-12 col-xs-12">
				<!-- <p class="paragraph" style="text-align: justify;text-justify: inter-word;">
				<?=$about_page->description?>
				</p> -->
				<table class="table table-striped table-bordered text-center">
					<tbody>
					<?php foreach ($achievement->result() as $row) { ?>
					<tr>
						<td><?=$row->year?></td>
						<td><?=$row->student_name?></td>
						<td>
							<img height="130" width="100" src="<?=base_url()?>images/achievements/<?=$row->image?>">	
						</td>
						<td><?=$row->contact?></td>
						<td><?=$row->address?></td>
						<td><?=$row->description?></td>
					</tr>
				    <?php } ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
		
</div>



