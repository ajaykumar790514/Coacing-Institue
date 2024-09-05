  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.nav-tabs li a{font-size: 20px; font-weight: 500;}
  </style>
<div class="container" style="min-height: 60vh;">
  <h2>Practice Test</h2>
  <br>
  <p></p>
<br>
  <div class="col-md-10" style="">
	<!-- <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#Science">Science Sample Paper</a></li>
		<li><a data-toggle="tab" href="#Mental-Ability">Mental Ability Sample Paper</a></li>
	</ul> -->
	<div class="tab-content">
		<div id="Science" class="tab-pane fade in active">
		<!-- <h3>HOME</h3> -->
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>SR.</th>
					<th>CLASS</th>
					<th>PRACTICE TEST</th>
					<th>DOWNLOAD</th>
				</tr>
			</thead>
			<tbody>
			<?php  $id=0;
			foreach ($practice_test as $row) { 
				$class=$row->class.'<sup>th</sup>';
				if ($row->class==13) {
					$class='12<sup>th</sup> Pass';
				}
			$id++;
				?>
				<tr>
					<td><?=$id?>. </td>
					<td><?=$class?></td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" target="_blank">
							<?=$row->batch_name?>
						</a>
					</td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" download>
							<i class="fa fa-download"></i>
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
  </div>

</div>

<br>
<br>





