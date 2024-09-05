<table class="table table-bordered">
    <tr>
        <th>Product Name</th>
        <td><?=$product->name?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?=$product->description?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?=$product->price?></td>
    </tr>
    <tr>
        <th>Mrp</th>
        <td><?=$product->mrp?></td>
    </tr>
    <tr>
        <th>Category</th>
        <td><?=$product->cat_name?></td>
    </tr>
    <tr>
        <th>Meta Title</th>
        <td><?=$product->meta_title?></td>
    </tr>
    <tr>
        <th>Meta Description</th>
        <td><?=$product->meta_description?></td>
    </tr>
    <tr>
        <th>Meta Keywords</th>
        <td><?=$product->meta_keywords?></td>
    </tr>

    <tr>
        <th>Attributes</th>
        <td>
            <?php $group_name=""; foreach($attributes->result() as $att){
                $group_name = $att->group_name;
            } ?>
            
            <h4><?=$group_name?></h4><hr>
            <table class="table table-bordered">
            <?php foreach($attributes->result() as $att){
                echo '<tr><th>'.$att->name.'</th><td>'.$att->description.'</td></tr>';
            } ?>
            </div>
            </table>
        </td>
    </tr>
    
</table>