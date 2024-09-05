<div class="row">
  <div class="container" style="height:400px; overflow-y: scroll;">
    <div class="col-md-12">
        <div class="col-md-3">
        <img height="160" width="130" src="<?=base_url()?>images/achievements/<?=$achievement->image?>">
        </div>
        <div class="col-md-8">
            <h2 class="h-color"><?=$achievement->title?></h2>
            <h4><?=$achievement->student_name?></h4>
            <p><?=$achievement->description?></p>
            <p><?=$achievement->testimonial?></p>
        </div>
    </div> 

    <div class="col-md-12" style="">
        <br>
    <br>
       <img class="img-responsive" src="<?=base_url()?>images/testimonial_file/<?=$achievement->testimonial_file?>"> 
    </div>
  </div>   
</div>


<!-- 
<table class="table table-bordered">
    <tr>
        <th>Student Name</th>
        <td><?=$achievement->student_name?></td>
    </tr>
    <tr>
        <th>Contact</th>
        <td><?=$achievement->contact?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?=$achievement->email?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?=$achievement->address?></td>
    </tr>
    <tr>
        <th>State</th>
        <td><?=$state?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?=$city?></td>
    </tr>
    <tr>
        <th>Achievement Type</th>
        <td><?=$type?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?=$achievement->description?></td>
    </tr>
    <tr>
        <th>Testimonial</th>
        <td><?=$achievement->testimonial?></td>
    </tr>
</table> -->