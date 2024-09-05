  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.nav-tabs li a{font-size: 20px; font-weight: 500;}
  </style>
<div class="container" style="min-height: 60vh;">
  <h2>STUDY PACKAGE</h2>
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
					<th>BATCH</th>
					<th>SUBJECT</th>
					<th>CHAPTER NAME</th>
					<th>DOWNLOAD</th>
				</tr>
			</thead>
			<tbody>

				<?php $i=0;
				foreach ($study_package as $row) {

				$class=$row->class.'<sup>th</sup>';
				if ($row->class==13) {
					$class='12<sup>th</sup> Pass';
				}
				 $i++; ?>
					<tr>
						<td><?=$i?>. </td>
						<td><?=$class?></td>
						<td><?=$row->batch?></td>
						<td><?=$row->subject?></td>
						<td><?=$row->chapter_name?></td>
						<td>
							<a href="<?=base_url()?><?=$row->file?>" download>
								<i class="fa fa-download"></i>
							</a>
						</td>
					</tr>
				<?php }
				?>
				
				<!-- <tr>
					<td>1. </td>
					<td>9<sup>th</sup></td>
					<td>BUNIYAAD-2024 A01</td>
					<td>PHYSICS</td>
					<td>MOTION</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/PHYSICS_MOTION.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>2. </td>
					<td>9<sup>th</sup></td>
					<td>BUNIYAAD-2024 A01</td>
					<td>CHEMISTRY</td>
					<td>MATTER IN OUR SURROUNDINGS</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/CHEMISTERY_MATTER IN OUR SURROUNDINGS.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>3. </td>
					<td>9<sup>th</sup></td>
					<td>BUNIYAAD-2024 A01</td>
					<td>MATHS</td>
					<td>NUMBER SYSTEM</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/MATHS_NUMBER SYSTEM.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>4. </td>
					<td>9<sup>th</sup></td>
					<td>BUNIYAAD-2024 A01</td>
					<td>BIOLOGY</td>
					<td>FUNDAMENTAL UNIT OF LIFE</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/BIOLOGY_FUNDAMENTAL UNIT OF LIFE.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>

				<tr>
					<td>5. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>PHYSICS</td>
					<td>ELECTRICITY</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/PHYSICS _ ELECTRICITY.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>6. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>PHYSICS</td>
					<td>LIGHT</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/PHYSICS_LIGHT.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>7. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>CHEMISTERY</td>
					<td>CHEMICAL REACTAIONS AND EQUATIONS</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/CHEMISTERY_CHEMICAL REACTAIONS AND EQUATIONS.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>8. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>MATHS</td>
					<td>LINEAR EQUATION IN TWO VARIABLES</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/MATHS_LINEAR EQUATION IN TWO VARIABLES.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>9. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>MATHS</td>
					<td>REAL NUMBER</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/MATHS_REAL NUMBER.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>10. </td>
					<td>10<sup>th</sup></td>
					<td>STAMBH-2023 A01</td>
					<td>BIOLOGY</td>
					<td>NUITRITION</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/BIOLOGY_NUITRITION.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>

				<tr>
					<td>11. </td>
					<td>11<sup>th</sup></td>
					<td>ZENITH-2022 A01</td>
					<td>PHYSICS</td>
					<td>MATHEMATICAL TOOLS & VECTOR</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/Mathematical Tools & Vector.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>12. </td>
					<td>11<sup>th</sup></td>
					<td>ZENITH-2022 A01</td>
					<td>CHEMISTRY</td>
					<td>MOLE CONCEPT COMBINE</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/MOLE CONCEPT_Combine.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>13. </td>
					<td>11<sup>th</sup></td>
					<td>ZENITH-2022 A01</td>
					<td>MATHS</td>
					<td>SET & RELATIONS</td>
					<td>
						<a href="<?=base_url()?>uploads/Study_Package/SET & RELATIONS.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>

				<tr>
					<td>14. </td>
					<td>12<sup>th</sup></td>
					<td>ZENITH-1921 A01</td>
					<td>PHYSICS</td>
					<td>ELECTROSTATICS</td>
					<td>
						<a href="<?=base_url()?>uploads/ASSIGNMENTS/ELECTROSTATICS-1_Combine.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr>
				<tr>
					<td>15. </td>
					<td>12<sup>th</sup></td>
					<td>ZENITH-1921 A01</td>
					<td>CHEMISTRY</td>
					<td>CHEMICAL KINETICS</td>
					<td>
						<a href="<?=base_url()?>uploads/ASSIGNMENTS/CHEMICAL KINETICS-1_Combine.pdf" download>
							<i class="fa fa-download"></i>
						</a>
					</td>
				</tr> -->
				
			

			
			
		</tbody>
		</table>
		</div>
	</div>
  </div>

</div>

<br>
<br>





