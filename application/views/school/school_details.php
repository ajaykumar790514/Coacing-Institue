<h2 class="text-center">SCHOOLS LIST</h2><hr>
<a style="float:right" class="btn btn-info" href="<?=base_url()?>">Search Again</a>

<br><br><br><br>

<?php foreach($schools->result() as $sc){ ?>
<?php $school = $this->model->school_detail($sc->school_id); ?>
<div class="col-md-6">
	<div class="well" style="background-color: white">
			<div style="height: 200px">
				<?php 
				if($school->image)
				{ ?>
					<img src="<?=base_url()?>uploads/school_image/<?=$school->image?>" width="100px" height="">';
					<?php 
					echo '<h3>'.$school->school_name.'</h3>';

				}
				else
				{
					echo '<h3>'.$school->school_name.'</h3>';
				}
				?>
			</div>
		<table class="table " style="margin-top: 25px">
			
			
			<tr>
				<th>Phone</th>
				<td><?=$school->phone_no?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$school->email?></td>
			</tr>
			<tr>
				<th>Website</th>
				<td><a target="_blank" href="<?=$school->website?>"><?=$school->website?></a></td>
			</tr>
			<tr>
				<th>City</th>

				<td><?php $this->load->model('model');
					$city=$this->model->get_city($school->city); 
					echo $city->name;?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?=$school->address?></td>
			</tr>
		</table>
		<a target="_blank" href="<?=base_url()?>index.php/welcome/school_profile/<?=$school->id?>"  class="btn btn-info btn-lg">SEE FULL PROFILE</a>
	</div>
</div>

<?php } ?>