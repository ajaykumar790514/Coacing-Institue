<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Change Password</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                <div id="message"></div>
                <form id="changePasswordForm">
                <div class="form-group">
                    <label for="old_pass">Old Password</label>
                    <input type="password" class="form-control" id="old_pass" name="old_pass">
                </div>
                <div class="form-group">
                    <label for="pass">New Password</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <div class="form-group">
                    <label for="con_pass">Confirm Password</label>
                    <input type="password" class="form-control" id="con_pass" name="con_pass">
                </div>
                <button type="submit" id="submitButton" class="btn btn-primary" disabled>Submit</button>
            </form>
          

                    </div>
                <div class="col-md-3"></div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->
<script>
  $(document).ready(function() {
    $('#pass, #con_pass').on('input', function() {
        var pass = $('#pass').val();
        var conPass = $('#con_pass').val();

        if (pass.length !== 8 || conPass.length !== 8) {
            $('#message').html('<div class="alert alert-danger">Password must be exactly 8 characters.</div>');
            $('#submitButton').prop('disabled', true);
        } else {
            $('#message').html('');
            $('#submitButton').prop('disabled', false);
        }
    });
});


$(document).ready(function() {
    
    $('#changePasswordForm').submit(function(e) {
        e.preventDefault();
        
        // Retrieve form data
        var oldPass = $('#old_pass').val();
        var newPass = $('#pass').val();
        var confirmPass = $('#con_pass').val();
        
        // Validate fields
        if (oldPass === '' || newPass === '' || confirmPass === '') {
            $('#message').html('<div class="alert alert-danger">All fields are required.</div>');
            return;
        }
        
        if (newPass.length > 8 && confirmPass.length > 8) {
            $('#message').html('<div class="alert alert-danger">Password must be maximum 8 characters.</div>');
            return;
        }
        
        if (newPass !== confirmPass) {
            $('#message').html('<div class="alert alert-danger">Passwords do not match.</div>');
            return;
        }
        
        // Form data to be submitted
        var formData = {
            old_pass: oldPass,
            pass: newPass,
            con_pass: confirmPass
        };

        // AJAX request
        $.ajax({
            url: '<?php echo base_url("Admin/change_password"); ?>',
            type: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                    setTimeout(function() {
                        location.reload();
                    }, 2000); // Reload the page after 2 seconds
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#message').html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
                console.log(xhr.responseText);
            }
        });
    });
});

</script>
