<?php 
// echo "<pre>";
// print_r($test_marks->result()); ?>

<table class="table table-striped table-bordered table-hover" >
	<thead>
	    <tr>
	        <th>Class</th>
	        <th>MAT</th>
	        <th>Physics</th>
	        <th>Chemistry</th>
	        <th>Maths</th>
	        <th>Total Science</th>
	    </tr>
	</thead> 
	<tbody>
	    <tr id="<?=$stu->id?>">
	        <td >
	        	<?=$stu->program_code?>
	        </td>
	        <td><?=$result->marks_mat?> / <?=$test->total_marks_mat?></td>
	        <td>
	        	<span class="fname" id="editSpan" ><?=$result->marks_sat_physics?></span>
                 <input class="editInput fname form-control input-sm" type="text" name="first_name" value="<?=$result->marks_sat_physics?>" style="display: none;">
	        </td>
	        <td>
	        	<span class="editSpan fname"><?=$result->marks_sat_chemistry?></span>
                 <input class="editInput fname form-control input-sm" type="text" name="first_name" value="<?=$result->marks_sat_chemistry?>" style="display: none;">
	        </td>
	        <td>
	        	<span class="editSpan fname"><?=$result->marks_sat_math?></span>
                 <input class="editInput fname form-control input-sm" type="text" name="first_name" value="<?=$result->marks_sat_math?>" style="display: none;">
	        </td>
	        <td><?=$result->marks_sat?> / <?=$test_marks->total?></td>
	        <td>
	        	<button class="editBtn" ondblclick="edit()">Edit</button>
	        	<button class="saveBtn" style="display: none;">save</button>
	        </td>
	    </tr>
	</tbody>
</table>
	    
<script type="text/javascript">
	$(document).ready(function(){
    $('#clas').on('mouseover',function(){
    	alart('s');
    });
    });

    function edit() {

    	 $("#editSpan").hide();
        
        //show edit input
        // $(this).closest("tr").find(".editInput").show();
        
        // //hide edit button
        // $(this).closest("tr").find(".editBtn").hide();
        
        // //show edit button
        // $(this).closest("tr").find(".saveBtn").show();
    }
</script>