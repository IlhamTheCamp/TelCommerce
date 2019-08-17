<div class = "header">
    <div class = "container">
        <div class = "searchbar">
            <form>
                <input type="search" class = "searchField" placeholder="Search items or owners">
            </form>
        </div>

        <div class = "headerright">
            <ul>
                <?php if($this->session->userdata('email')) { ?>
                    <li><a href = "<?php echo base_url('belanja/cart') ?>" placeholder = "Cart" style ="font-size: 20px;"><i class ="fas fa-cart-plus"></i></a></li>
                    <li><a href = "#" placeholder = "Notifications" style ="font-size: 20px;"><i class = "fas fa-bell"></i></a></li>
                    <li><a href = "#" placeholder = "Messages" style ="font-size: 20px;"><i class = "fas fa-envelope-square"></i></a></li>
                    <li><a href = "<?php echo base_url('dasbor') ?>" placeholder = "User"><i class = "fas fa-user"></i> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    } ?>

<div class = "checkout" style="background-color: #E6FFEA;width: 98%;margin-left: 18px;">
    <div class = "container">
                                
        <!-- Checkout Inner -->
        <div class = "checkout-inner">
                <div class = "checkout-upper">
                        <label class = "container-check"> 
                            <h2 style="margin-left: 35px">Checkout</h2>
                            <h2 style="margin-left: 35px">Renter's Address</h2>
                        </label>

                        <label class = "container-check" style = "border-top: 4px solid gainsboro; border-bottom: 4px solid gainsboro; padding: 30px 0 20px;width: 92%;margin-left: 70px;">
                            <h4><?php echo $this->session->userdata('nama_pelanggan'); ?> (<?php echo $this->session->userdata('alamat'); ?>)</h3>
                            <h4><?php echo $this->session->userdata('telepon'); ?></h3>
                            <h4><?php echo $this->session->userdata('alamat'); ?> <br> Bojongsoang, Kab.Bandung, 40287</h3>
                    </div>
            <form>
                <div class = "checkout-form-steps">
                    <div class = "checkout-inner">
                <div class = "checkout-upper">
                <?php 
                // Looping data keranjang belanja
                foreach($keranjang as $keranjang) { 
                    // Ambil data produk
                    $id_produk  = $keranjang['id'];
                    $produk     = $this->produk_model->detail($id_produk);

                    // Form Update
                    echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
                ?>
                        <label class = "container-check">
                        <input type ="checkbox">
                        <span class="checkmark"></span>
                        <img src = "<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>" style="width: 15%;margin: 10px 5px 5px 15px; float: left;padding-right: 150px;">
                        <h3 style="font-size: 20px;margin: 50px 0 10px 0;"><?php echo $keranjang['name'] ?></h3>
                        <p style="font-size: 20px;margin-bottom: 40px;">
                            Rp<?php 
                            $sub_total = $keranjang['price'] * $keranjang['qty'];
                            echo number_format($sub_total,'0',',','.');
                            ?></p>
                        <p style="font-size: 20px;margin-bottom: 40px;">
                            Quantity : <?php echo $keranjang['qty'];
                            ?></p>
                        <select class = "textfield" style="width: 100px;height: 45px;text-align: center;">
                                <option>Quantity</option>
                                <option>Single</option>
                                <option>Multiple</option>
                        </select>
                    </label>
                    </div>
        </div>

         <?php  
        // Echo form close
        echo form_close();
        // End looping keranjang
        }
        ?>
                </div>                          
                
            </form>
        </div>
        <!-- Checkout Inner End -->

        <!-- Order Summary Start -->
        
            <label class = "orderSummary">
                <h4>Renting Summary</h4>
                <p> Grand Total <span>Rp.<?php echo number_format($this->cart->total(),'0',',','.') ?></span></p>
                <input type = "submit" class = "RentButton" value = "Choose Payment" id = "rentBtn">
                <input type = "submit" class = "PromoButton" value = "Use Promo from Telkom Rent">
                <textarea class = "rentMsg" placeholder="Let the person you rented know something important they need to know! (Optional)" style="margin-top: 20px;"></textarea>
            </label>

        <br>
        <?php 
        echo form_open(base_url('belanja/checkout')); 
        $kode_transaksi     = date('dmY').strtoupper(random_string('alnum', 8));
        ?>
        <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
        <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
        <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d') ?>">
            
                
        <!-- Order Summary Ends -->
        
        <!-- Modal Popup - 1 Start -->
            <div id = "rentModal" class = "modal">
                <form>
                    <div class = "modal-content">
                        <h3>Payment Methods</h3>
                        <label class = "modal-inner">
                            <h4>MeetUp</h4>
                            <p>Half payment can be done and complete when returning item.
                            NOTE : Choose Meetup Location
                            </p>
                            <input type="radio" name = "radio1">
                        </label>
                        <label class = "modal-inner">
                            <h4>Bank Transfer</h4>
                            <p>Full or Half payment can be transferred latest 2 hours from now
                            and complete when rental completes
                            </p>
                            <input type="radio" name = "radio1">
                        </label>

                        <h4>Transaction Code</h4>
                        <p><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></p>

                        <h4>Name</h4>
                        <p><input type="text" name="nama_pelanggan" class="textField" placeholder="Name" value="<?php echo  $pelanggan->nama_pelanggan ?>" required></p>

                        <h4>Phone Number</h4>
                        <p><input class = "textField" type="text" name = "telepon" placeholder = "Telephone Number" value = "<?php echo $pelanggan->telepon ?>" required ></p>

                        <h4>Address</h4>
                        <p><input class = "textField" type="text" name = "alamat" placeholder = "Address" value = "<?php echo $pelanggan->alamat ?>" required ></p>

                        <h4>Email</h4>
                        <p><input class = "textField" type="email" name = "email"placeholder = "Email" value = "<?php echo $pelanggan->email ?>" required ></p>

                        <div class = "submitGroup" style = "text-align: center;">
                            <input type = "submit" value = "Back" id = "backBtn" style = "margin: 80px 40px 20px 0;">
                            <input type = "submit" value = "Confirm" id = "nextBtn">                              
                        </div>                               
                    </div>               
                </form>
            </div>

            <?php echo form_close(); ?>
            <!-- Modal Popup - 1 Ends -->

            <!-- Modal Summary End -->

        </div>
    </div>

    

<script src = "<?php echo base_url() ?>assets/template/js/jquery-3.4.1.min.js"></script>

<script>

    var modal1 = document.getElementById("rentModal");
    var btn = document.getElementById("rentBtn");
    // var back = document.getElementById("backBtn");
    // var next = document.getElementById("nextBtn");


    btn.onclick = function(){
        modal1.style.display = "block";
    }

    window.onclick = function(event){
        if (event.target == modal){
            modal.style.display = "none";
        }
    }
   
    

</script>
</body>
</html>