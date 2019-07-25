<div class = "imageLeft">
            <img src = "<?php echo base_url() ?>assets/upload/index&signup/pic1.PNG"/>        
    </div>

    <?php if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    } ?>

    <p class="alert alert-success">Already have an account? Please <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login here</a></p>
   
    <!-- Login Form -->
    <div class = "loginBox">
        <div class =""></div>
        <div class = "registerForm">
            <?php 
            // Display Error
            echo validation_errors('<div class="alert alert-warning">','</div>');

            // Form Open
            echo form_open(base_url('registrasi'), 'class="leave-comment"'); ?>
            <h3>Sign Up</h3>
            <form>
                <input class = "textField" type="text" name = "nama_pelanggan" placeholder = "Name" value = "<?php echo set_value('nama_pelanggan') ?>" required >
                <input class = "textField" type="email" name = "email"placeholder = "Email" value = "<?php echo set_value('email') ?>" required >
                <input class = "textField" type="text" name = "nim" placeholder = "NIM" value = "<?php echo set_value('nim') ?>" required >
                <input class = "textField" type="password" name = "password" placeholder = "Password" value = "<?php echo set_value('password') ?>" required >
                <input class = "submitBtn" type="submit" name = "submit" value = "SIGN UP">
                </form>
                
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- Login Form End -->


    <script src = "<?php echo base_url() ?>assets/template/js/jquery-3.4.1.min.js"></script>
    <script src = "<?php echo base_url() ?>assets/template/js/jquery.cycle.js"></script>
    <script>
        $("sliderShuffle").cycle({
            next:'#next',
            prev:'#prev'
        });
    </script>
</body>
</html>