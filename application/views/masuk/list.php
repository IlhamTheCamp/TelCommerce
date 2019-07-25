<div class = "imageLeft">
        <img src = "<?php echo base_url() ?>assets/upload/index&signup/pic2.PNG"/>        
</div>

    <?php if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    } ?>

<!-- Login Form -->
<div class = "loginBox">
    <div class =""></div>
    <div class = "registerForm">
        <?php 
        // Display Error
        echo validation_errors('<div class="alert alert-warning">','</div>');

        // Display Notif Error Login
        if($this->session->flashdata('warning')) {
            echo '<div class="alert alert-warning">';
            echo $this->session->flashdata('warning');
            echo '</div>';
        }

        // Display Notif Sukses Logout
        if($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }

        // Form Open
        echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>
        <ul>
            <li><h3>Welcome,</h3></li>
            <li><a href = "<?php echo base_url('registrasi') ?>" class = "signUp">SignUp</a></li>
        </ul>
        <h5 style = "font-size: 20px;color:grey;opacity: 20%;">Sign in to Continue</h5>
        <form style ="margin-top: 10px;">
            <input class = "textField" type="email" name = "email" placeholder = "Email" value = "<?php echo set_value('email') ?>">
            <input class = "textField" type="password" name = "password" placeholder = "Password" value = "<?php echo set_value('password') ?>">
            <a href = "#" class = "forgotPass">Forgot Password?</a>
            <input class = "submitBtn" type="submit" value = "Sign In">
        </form>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- Login Form End -->


<script src = "<?php echo base_url() ?>assets/template/js/jquery-3.4.1.min.js"></script>
<script src = "<?php echo base_url() ?>assets/template/js/jquery.cycle.js"></script>
</body>
</html>