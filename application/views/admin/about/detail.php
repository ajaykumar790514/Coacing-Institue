<table class="table table-bordered">
    <tr>
        <th>Product Name</th>
        <td><?=$about->title?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?=$about->description?></td>
    </tr>
    <tr>
        <th>Url</th>
        <td><?=$about->url?></td>
    </tr>
    <tr>
        <th>Target tab</th>
        <td><?php if($about->target_tab=='_blank'){echo "Open in mew tab";}
                  else{ echo 'Open in current tab';}
                    ?></td>
    </tr>
    <tr>
        <th>Image Alt</th>
        <td><?=$about->image_alt?></td>
    </tr>
    <tr>
        <th>Image Title</th>
        <td><?=$about->image_title?></td>
    </tr>
    <tr>
        <th>Meta Title</th>
        <td><?=$about->meta_title?></td>
    </tr>
    <tr>
        <th>Meta Description</th>
        <td><?=$about->meta_description?></td>
    </tr>
     <tr>
        <th>Meta Keywords</th>
        <td><?=$about->meta_keywords?></td>
    </tr>
    
</table>
