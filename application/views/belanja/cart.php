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
        <div>
            <label class = "container-check"> 
                <input type="checkbox">
                <span class = "checkmark" style="margin: 0 0 0 30px;"></span>
                <h2 style="margin-left: 35px">Choose All Items</h2>
            </label>
        </div>

        <?php 
        // Looping data keranjang belanja
        foreach($keranjang as $keranjang) { 
            // Ambil data produk
            $id_produk  = $keranjang['id'];
            $produk     = $this->produk_model->detail($id_produk);

            // Form Update
            echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
        ?>
        
        <!-- Checkout Inner -->
        <div class = "checkout-inner">
            <form>
                <div class = "checkout-form-steps">
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
                        <select class = "textfield" style="width: 105px; margin-left: 20px;height: 45px;">
                                <option>Duration</option>
                                <option>1 Day</option>
                                <option>Manual</option>
                        </select>
                    </label>
                </div>

        <?php  
        // Echo form close
        echo form_close();
        // End looping keranjang
        }
        ?>

                <div class = "banner" style = "margin-left: 30px;">
                    <div class = "container">
                        <h3>Last Seen</h3>
                        <img src = "<?php echo base_url() ?>assets/upload/profile/iphone_banner.jpg">
                    </div>
                </div>

                <div class = "popularProducts">
                        <div class = "container">
                            <h3>Popular Products</h3>
                            <div class = "owl-carousel">
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_18.jpg"></div>
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_13.jpg"></div>
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_14.jpg"></div>
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_15.jpg"></div>
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_16.jpg"></div>
                                <div class = "item"><img src = "<?php echo base_url() ?>assets/upload/rent_main/f23510_141_905_17.jpg"></div>
                            </div>
                        </div>
                    </div>
                
                
            </form>
        </div>
        <!-- Checkout Inner End -->

        <!-- Order Summary Start -->
        <?php 
        echo form_open(base_url('belanja/checkout')); 
        $kode_transaksi     = date('dmY').strtoupper(random_string('alnum', 8));
        ?>
            <label class = "orderSummary">
                <h4>Renting Summary</h4>
                <p> Total <span>Rp <?php echo number_format($this->cart->total(),'0',',','.') ?></span></p>
                <p style="font-size: 20px;margin-bottom: 40px;">
                    <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-lg">
                        <i class="fa fa-trash-o"></i> Delete All Items in Cart
                    </a>
                </p>
                <input type = "submit" class = "RentButton" value = "Rent Items">
                <input type = "submit" class = "PromoButton" value = "Use Promo from Telkom Rent">
            </label>
        <?php echo form_close(); ?>       
        <!-- Order Summary Ends -->

    </div>
    </div>



    <script src = "js/jquery-3.4.1.min.js"></script>
    <script src = "js/owl.carousel.min.js"></script>
    <script>
    $('.owl-carousel').owlCarousel({
    items:4,
    loop:true,
    margin:15,
    autoplay:true,
    autoplayTimeout:3000, //3 Second
    nav:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:4,
            nav:true
        }
    }

    });
    </script>
    </body>
    </html>