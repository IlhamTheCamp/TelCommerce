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
                    <li><a href = "<?php echo base_url('belanja/checkout') ?>" placeholder = "Cart" style ="font-size: 20px;"><i class ="fas fa-cart-plus"></i></a></li>
                    <li><a href = "#" placeholder = "Notifications" style ="font-size: 20px;"><i class = "fas fa-bell"></i></a></li>
                    <li><a href = "#" placeholder = "Messages" style ="font-size: 20px;"><i class = "fas fa-envelope-square"></i></a></li>
                    <li><a href = "<?php echo base_url('dasbor') ?>" placeholder = "User"><i class = "fas fa-user"></i> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;</a></li>
                <?php }else{ ?>
                    <li><a href = "<?php echo base_url('masuk') ?>" placeholder = "User"><i class = "fas fa-user"></i> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<!-- Left Profile Section -->
<div class = "profileview">
    <div class = "container">
        <div class = "profileUp">
                <ul>
                    <h4>Never Registered an Item Before?</h4>
                    <li></li><button class = "registBtn">Register Now</button>
                </ul>
        </div>

        <div class = "profileSub">
            <ul>
                <h3>INBOX</h3>
                <li><a href = "#">Chat</a></li>
                <li><a href = "#">Product Discussion</a></li>
                <li><a href = "#">Rental Assistance</a></li>
                <li><a href = "#">Updates</a></li>
            </ul>
        </div>

        <div class = "profileSub">
            <ul>
                <h3>RENT'S</h3>
                <li><a href = "#">Chat</a></li>
                <li><a href = "#">Product Discussion</a></li>
            </ul>
        </div>

        <div class = "profileSub">
            <ul>
                <h3>MY PROFILE</h3>
                <li><a href = "#">Edit Profile</a></li>
                <li><a href = "#">Address</a></li>
                <li><a href = "#">Wishlist</a></li>
            </ul>
        </div>

        <div class = "logout">
            <h3><i class = "fas fa-sign-out-alt"></i><a href = "<?php echo base_url('masuk/logout') ?>" >Logout</a></h3>
        </div>
    </div>

</div>

    <!-- End of Left Profile Section -->

    <!-- Banner -->
    <div class = "banner">
        <div class = "container">
            <img src = "<?php echo base_url() ?>/assets/upload/profile/iphone_banner.jpg">
        </div>
        
        <div class = "caption">
            <p>iPhone X is a smartphone designed, and marketed by Apple Inc.
                It was the eleventh smartphone iPhone have ever created. Greg Joswiak, Apple's Vice President of Product Marketing, told Tom's Guide that OLED panels Apple used in iPhone X had tremendous upgrades and would benefit some third-party app developers.
                "Apple will share face mapping data from the iPhone X with third-party app developers."
            </p>
        </div>
    </div>
    <!-- End of Banner -->
<div class = "product-area">

    <div class = "categories-mid">
        <ul>
            <li><h3>New Arrivals</h3></li>
            <li><a href = "#" class = "See">See all</a></li>
        </ul>
        <?php foreach($produk as $produk) { ?>

        <?php 
        // Form untuk memproses belanjaan
        echo form_open(base_url('belanja/add')); 
        // Elemen yang dibawa
        echo form_hidden('id', $produk->id_produk);
        echo form_hidden('qty', 1);
        echo form_hidden('price', $produk->harga);
        echo form_hidden('name', $produk->nama_produk);
        // Elemen redirect
        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
        ?>
        <div class = "col-3">
            <a href = "<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
                <img src = "<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
                <div class = "caption">
                    <h2><?php echo $produk->nama_produk ?></h2>
                    <h4>Ini Contoh Deskripsi Singkat</h4>
                         <button class = "price">Rp.<?php echo number_format($produk->harga,'0',',','.') ?></button>
                         <h4>Details Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit.</h4>
                </div>
                <button class = "productViewBtn">Rent Now</button>
            </a>
            <?php 
            // Closing Form
            echo form_close();
            ?>
        </div>
            <?php } ?>

    </div>
</div>
</body>
</html>