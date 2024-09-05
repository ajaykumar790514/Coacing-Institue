<div>
    <label>Attribute Groups</label><br>
    <?php $i=1; foreach($attribute_groups->result() as $ag){ ?>
        
        <input type="checkbox" id="ag<?=$i?>" name="" value="<?=$ag->id?>" onclick="load_attributes()">&nbsp;<strong><?=$ag->name?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
        
    <?php $count = ++$i;
    } ?>
</div>

<div id="att_id">
    
</div>

<script type="text/javascript">
    function load_attributes()
    {
        var product_id = '<?=$product_id?>';
        var count = '<?=$count-1?>';
        var aa = [];
        var j=0;
        for(var i=1;i<=count;i++)
        {
            if($("#ag"+i).prop("checked"))
            {
                aa[j] = $("#ag"+i).val();
                ++j;
            }
        }
        if(j>0)
        {
        $("#att_id").html('<h3 class="text-center" style="color:red">LOADING....</h3>');
        var dataString = 'product_id='+product_id+'&groups='+aa;
        //alert(dataString); return false;
        $.ajax({
        url: "<?=base_url()?>index.php/admin/load_attributes",
        type: "GET",
        data:  dataString,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
        
    },
    error: function(){}             
    });
    }
    }
</script>