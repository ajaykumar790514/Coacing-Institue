<table class="table table-bordered">
    <tr>
        <th>Product Name</th>
        <td><?=$category->name?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?=$category->description?></td>
    </tr>
    <tr>
        <th>Parent Category</th>
        <td><?=$parent_cat?></td>
    </tr>
    <tr>
        <th>Meta Title</th>
        <td><?=$category->meta_title?></td>
    </tr>
    <tr>
        <th>Meta Description</th>
        <td><?=$category->meta_description?></td>
    </tr>
    <tr>
        <th>Meta Keywords</th>
        <td><?=$category->meta_keywords?></td>
    </tr>
</table>