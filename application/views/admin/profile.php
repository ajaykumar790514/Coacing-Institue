<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">User / Profile</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                <form id="updateform" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="<?=IMGS_URL.$row->image;?>" alt="" height="100px">
                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input type="file" class="form-control"  id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?=$row->name;?>" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="pass">Email</label>
                    <input type="text" class="form-control" value="<?=$row->email;?>" id="email" name="email">
                </div>
                <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
            </form>
            <div id="message"></div>

                    </div>
                <div class="col-md-3"></div>
            </div>

</div>
<script>
$(document).ready(function() {
    // Function to validate email
    function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Update button state on input in email field
    $('#email').on('input', function() {
        var email = $(this).val();
        var isValidEmail = validateEmail(email);

        // Enable/disable the submit button based on email validity
        $('#submitButton').prop('disabled', !isValidEmail);

        // Show/hide error message based on email validity
        if (!isValidEmail) {
            $('#message').html('Please enter a valid email address.').removeClass('text-success').addClass('text-danger').css('font-size', '2rem');
        } else {
            $('#message').html('').removeClass('text-danger').addClass('text-success').css('font-size', '2rem');
        }
    });

    // Form submission
    $('#updateform').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '<?= base_url("Admin/update_profile"); ?>',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#message').html(response.message).removeClass('text-danger').addClass('text-success').css('font-size', '2rem');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $('#message').html(response.message).removeClass('text-success').addClass('text-danger').css('font-size', '2rem');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#message').html('An error occurred').removeClass('text-success').addClass('text-danger').css('font-size', '1.2rem');
            }
        });
    });
});

</script>