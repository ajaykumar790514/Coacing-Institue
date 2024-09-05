  <!--==========================
    Intro Section
  ============================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .slider{
      width: 100%;
      height: 484px!important;
    }
    @media(max-width: 560px)
    {
      .slider{
        width:100%;
        height: 250px!important;
      }
    }
    .find_btn
    {
       border: 3px  #50d8af solid;
      background-color: #50d8af;
      color:white;
      font-weight: 100;
    }
    .find_btn:hover 
    {
      border: 3px  #50d8af solid;
      background-color: rgba(0, 0, 0, 0.1);
      color: #50d8af!important;
    }

  </style>
  <section id="">

   
<div class="">
  <div id="myCarousel" class="carousel slide  carousel-fade" data-ride="carousel"  >
    <!-- Indicators -->
    <ol class="carousel-indicators">
    
     
    
      <?php $i=0;
       foreach ($slides->result() as $slide) { ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" 
        <?php if($i==0){ echo 'class="active"';} else{  } ?>
      >
      </li>
      <?php $i++; } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" data-interval="2500">
      <?php
         $n=0;
        foreach ($slides->result() as $slide) { ?>
        <div <?php if($n==0){ echo 'class="item active"';} else{ echo'class="item"'; } ?>>
          <img src="<?=base_url()?>images/slider/<?=$slide->img?>" alt="Chicago" style="" class="slider">
          <div class="carousel-caption">
            <h2 style="color: #a2e6d2;font-weight: 700"><!-- <?=$slide->name?> --></h2>
            <p><!-- <?=$slide->description?> --></p>
           <!--  <div style="">
              <a href="javascript:void(0)" class="btn-get-started" data-toggle="modal" data-target="#myModal" onclick="school_form()"><font style="font-size: 20px">LIST</font> your Requirement</a>
            </div> -->
            <!--  <a href="#compare1" class="btn find_btn" style=""><font style="font-size: 20px">Find PRODUCTS and SERVICES</font> </a> -->

          </div>
        </div>
      <?php
    $n++; } ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


  </section><!-- #intro -->

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body" id="compare_form">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modal-->

  <script type="text/javascript">
    function school_form()
    {
      $("#compare_form").html('<h2 class="text-center" style="color:red">LOADING.....</h2>');
      $("#compare_form").load('<?=base_url()?>index.php/welcome/school_form');
    }
  </script>

  