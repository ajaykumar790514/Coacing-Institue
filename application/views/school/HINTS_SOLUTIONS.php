<div class="container" style="min-height: 100vh;">

<div class="row">
	<div class="col-md-6" style="">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>SR.</th>
					<th>CLASS</th>
					<th>DATE</th>
					<th>BATCH NAME</th>
				</tr>
			</thead>
			<tbody>
				
			<?php  $id=0;
			foreach ($answer_key as $row) { 
			$id++;
				?>
				<tr>
					<td><?=$id?>. </td>
					<td><?=$row->class?><sup>th</sup></td>
					<td>
						<?php 
	                        if ($row->test_date!='') 
	                        {
	                           echo date('d-M-Y',strtotime($row->test_date));
	                        }
	                    ?>
					</td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" target="_blank">
							<?=$row->batch_name?>
						</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		

	</div>
</div>
 				




 <div class="col-md-12" id="res">
 	
 </div>





</div>