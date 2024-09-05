  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.nav-tabs li a{font-size: 20px; font-weight: 500;}
  </style>
<div class="container">
  <h2>Sample Papers</h2>
  <br>
  <p></p>
<br>
  <div class="col-md-10" style="">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#Science">Science Sample Paper</a></li>
		<li><a data-toggle="tab" href="#Mental-Ability">Mental Ability Sample Paper</a></li>
	</ul>
	<div class="tab-content">
		<div id="Science" class="tab-pane fade in active">
		<!-- <h3>HOME</h3> -->
		<p>Sample Paper For Admission Test (Science)</p>
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th>SR.</th>
					<th>CLASS</th>
					<th>SAMPLE PAPER</th>
					<th>DOWNLOAD</th>
				</tr>
			</thead>
			<tbody>
			<?php  $id=0;
			foreach ($sample_paper as $row) {  
			if ($row->type==1) {	
			$id++;
			?>
				<tr>
					<td><?=$id?>. </td>
					<td><?=$row->class?><sup>th</sup></td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" target="_blank">
							<?=$row->title?>
						</a>
					</td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" download><i class="fa fa-download"></i></a>
					</td>
				</tr>
			<?php
				}
			}
			?>
		</tbody>
		</table>
		</div>

		<div id="Mental-Ability" class="tab-pane fade">
		<!-- <h3>Menu 1</h3> -->
		<p>Sample Paper For Admission Test (Mental Ability)</p>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>SR.</th>
					<th>CLASS</th>
					<th>SAMPLE PAPER</th>
					<th>DOWNLOAD</th>
				</tr>
			</thead>
			<tbody>
			<?php  $id=0;
			foreach ($sample_paper as $row) {  
			if ($row->type==2) {
			$id++;
			?>
				<tr>
					<td><?=$id?>. </td>
					<td><?=$row->class?><sup>th</sup></td>
					<td>
						<a href="<?=base_url()?><?=$row->link?>" target="_blank">
							<?=$row->title?>
						</a>
					</td>
					<td>
						<a href=""><i class="fa fa-download"></i></a>
					</td>
				</tr>
			<?php
				}
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





