<div class="container" style="min-height: 100vh;">

<div class="row">
	<div class="col-md-12" style="padding:2% 20% 5% 35%;">
		
		<div class="col-md-6 form-group text-center" >
			<input type="text" id="search" class="form-control" style="" name="search" placeholder="Enter Your Registration No. Here" oninput="$(this).val($(this).val().toUpperCase());">
			<br>
            <button class="btn-success  "  onclick="result_all()" >Veiw Result</button>

		</div>

	</div>
</div>
<script type="text/javascript">
function result_all() {
  var search= $("#search").val();

window.open("<?=base_url()?>Results/"+search,);


}
 </script>


 <div class="col-md-12" id="res"></div>






</div>