<script>
				  function find_city_place_res()  
				  {//alert('123');
				     var state = $("#state").val();
				     $("#cities").html("<div align='center'><img id='checkmark' src='<?php echo base_url()?>assets/img/loading.gif' /></div>");
					 $("#cities").load("<?=base_url()?>index.php/admin/load_city_place_res/"+state);
				  }
				  
				  function find_place_res()
				  {
				     var city = $("#city").val();
				     $("#place").html("<div align='center'><img id='checkmark' src='<?php echo base_url()?>assets/img/loading.gif' /></div>");
					 $("#place").load("<?=base_url()?>index.php/admin/load_place_res/"+city);
				  }
				  
				  
				  
				  function find_city_place()
				  {
				      var state = $("#state").val();
				     $("#cities").html("<div align='center'><img id='checkmark' src='<?php echo base_url()?>assets/img/loading.gif' /></div>");
					 $("#cities").load("<?=base_url()?>index.php/admin/load_city_place/"+state);
				  }
				  
				  function find_place()
				  {
				     var city = $("#city").val();
				     $("#place").html("<div align='center'><img id='checkmark' src='<?php echo base_url()?>assets/img/loading.gif' /></div>");
					 $("#place").load("<?=base_url()?>index.php/admin/load_place/"+city);
				  }
				  
				  
				  function find_res()
				  {
				     var place = $("#place_res").val();
					 //alert(place);
				     $("#restaurent").html("<div align='center'><img id='checkmark' src='<?php echo base_url()?>assets/img/loading.gif' /></div>");
					 $("#restaurent").load("<?=base_url()?>index.php/admin/load_res/"+place);
				  }
				</script>

<!-- footer content -->
                <footer>
                    <div class="">
                        
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>

        </div>
    </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="<?=base_url()?>assets/admin/js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="<?=base_url()?>assets/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?=base_url()?>assets/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="<?=base_url()?>assets/admin/js/icheck/icheck.min.js"></script>
        <!-- tags -->
        <script src="<?=base_url()?>assets/admin/js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="<?=base_url()?>assets/admin/js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="<?=base_url()?>assets/admin/js/moment.min2.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/admin/js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
        <script src="<?=base_url()?>assets/admin/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="<?=base_url()?>assets/admin/js/editor/external/jquery.hotkeys.js"></script>
        <script src="<?=base_url()?>assets/admin/js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
        <script src="<?=base_url()?>assets/admin/js/select/select2.full.js"></script>
        <!-- form validation -->
        <script type="text/javascript" src="<?=base_url()?>assets/admin/js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="<?=base_url()?>assets/admin/js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="<?=base_url()?>assets/admin/js/autocomplete/countries.js"></script>
        <script src="<?=base_url()?>assets/admin/js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <script src="<?=base_url()?>assets/admin/js/custom.js"></script>


        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /select2 -->
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->
        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                            return false;
                        })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                            target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                };

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                };
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!-- /editor -->
</body>

</html>