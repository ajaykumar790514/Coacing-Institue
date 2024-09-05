<div class="container" style="min-height: 100vh;">

<div class="row">
	<div class="col-md-12" style="padding:2% 20% 5% 35%;">
		
		<div class="col-md-6 form-group text-center" >
			<input type="text" id="search" class="form-control" style="" name="search" placeholder="Enter Your Registration No. Here">
			<br>
            <button class="btn-success  "  onclick="result()"  value="Sumit"> submit</button>

		</div>

	</div>
</div>
 				


<script type="text/javascript">
function result() {
  var search= $("#search").val();

  $.ajax({
url: "<?=base_url()?>index.php/results/result",
type: "POST",
data:  {search:search},
success: function(data){
  $("#res").html(data);
},
error: function(){}           
});
}
 </script>

 <div class="col-md-12" id="res">
 	
 </div>





</div>