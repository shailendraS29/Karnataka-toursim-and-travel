<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    // Function to validate Indian mobile numbers
    function validate_mobile($mobile)
    {
        return preg_match('/^[6-9]\d{9}$/', $mobile);
    }

    // Function to validate Gmail address
    function validate_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@gmail\.com$/', $email);
    }

    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Validate inputs
    if (!validate_mobile($mnumber)) {
        echo '<script>alert("Please enter a valid Indian mobile number.")</script>';
    } elseif (!validate_email($email)) {
        echo '<script>alert("Please enter a valid Gmail address.")</script>';
    } else {
        // Database insertion
        $sql = "INSERT INTO tblusers(FullName, MobileNumber, EmailId, Password) VALUES (:fname, :mnumber, :email, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo '<script>alert("You are successfully registered. Now you can login.")</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
    }
}
?>

<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'emailid=' + $("#email").val(),
            type: "POST",
            success: function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function(){}
        });
    }
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <section>
                <div class="modal-body modal-spa">
                    <div class="login-grids">
                        <div class="login">
                            <div class="login-right">
                                <form name="signup" method="post">
                                    <h3>Create your account</h3>
                                    <input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="" style="font-weight:bold;">
                                    <input type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="">
                                    <input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="">    
                                    <span id="user-availability-status" style="font-size:12px;"></span> 
                                    <input type="password" value="" placeholder="Password" name="password" required="">    
                                    <div class="modal-footer text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>                                
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<style>
    .bold-input {
        font-weight: bold;
    }
</style>