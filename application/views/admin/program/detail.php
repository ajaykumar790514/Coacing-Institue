<table class="table table-bordered">
    <tr>
        <th>Product Name</th>
        <td><?=$program->title?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?=$program->description?></td>
    </tr>
    <tr>
        <th>Url</th>
        <td><?=$program->url?></td>
    </tr>
    <tr>
        <th>Target tab</th>
        <td><?php if($program->target_tab=='_blank'){echo "Open in mew tab";}
                  else{ echo 'Open in current tab';}
                    ?></td>
    </tr>
    <tr>
        <th>Image Alt</th>
        <td><?=$program->image_alt?></td>
    </tr>
    <tr>
        <th>Image Title</th>
        <td><?=$program->image_title?></td>
    </tr>
    <tr>
        <th>Meta Title</th>
        <td><?=$program->meta_title?></td>
    </tr>
    <tr>
        <th>Meta Description</th>
        <td><?=$program->meta_description?></td>
    </tr>
     <tr>
        <th>Meta Keywords</th>
        <td><?=$program->meta_keywords?></td>
    </tr>
    
</table>
