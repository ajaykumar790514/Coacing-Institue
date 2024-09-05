<h4 class="text-center">Attributes</h4><hr>
<?php $i=1; foreach($attributes->result() as $att){ ?>
    <div class="form-group">
        <label><?=$att->name?><input type="hidden" name="attribute_id[]" value="<?=$att->id?>"></label><br>
        <textarea name="att_description[]" id="text_ns<?=$i?>" class="form-control"></textarea>
    </div>
<?php $i++; } ?>

<script type="text/javascript">
	// A $( document ).ready() block.
$( document ).ready(function() {
	var i=1;
	for(i=1;i<=100;i++)
	{
		area1 = new nicEditor({fullPanel : true}).panelInstance('text_ns'+i,{hasPanel : true});
	}
    
});
</script>