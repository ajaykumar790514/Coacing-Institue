<div class="form-group">
                                            <label>Attributes Group</label><br>
                                            <select class="form-control" id="att_group" name="att_group" onchange="load_attributes()">
                                                <option value="">--Select an attribute group--</option>
                                            <?php foreach($attribute_groups->result() as $att){ ?>
                                                <option value="<?=$att->id?>"><?=$att->name?></option>
                                            <?php } ?>  
                                            </select>
                                        </div>

                                        <div id="eg" class="well" style="background-color: white;border:1px solid brown">
                                              
                                        </div>

                                        <script type="text/javascript">
            function load_attributes()
            {
                var att_group = $("#att_group").val();
                $("#eg").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                $("#eg").load('<?=base_url()?>index.php/admin/load_attributes/'+att_group);
            }
        </script>