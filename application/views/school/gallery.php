
<link href="<?=base_url()?>assets/school/css/event-gallery.css" rel="stylesheet">

<div class="full"></div>
<main id="main" style="min-height: 80vh;">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-success btn-gallery" data-toggle="image" data-target=".gallery">All</button>
                    <?php foreach ($gallery as $key => $value) { ?>
                       <button class="btn btn-success btn-gallery" data-toggle="image" data-target=".gallery-<?=$value->id?>"><?=$value->name?></button>
                       
                    <?php } ?>
                </div>
            </div>

            <div class="row">
            <?php foreach ($gallery as $key => $value) {
                    foreach ($value->images as $imgValue) { ?>
                <div class="col-sm-3 gallery gallery-<?=$value->id?>">
                    <figure>
                        <img src="<?=base_url()?>images/event/<?=$imgValue->name?>">
                        <p><?=$imgValue->title?></p>
                    </figure>
                </div> 
            <?php } } ?>
            </div>
        </div>

    </section>
</main>


<script src="<?=base_url()?>assets/school/js/event-gallery.js"></script>