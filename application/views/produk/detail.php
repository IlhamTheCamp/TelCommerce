<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/template/css/product_view.css">


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
                	<li><a href = "<?php echo base_url('masuk/logout') ?>" placeholder = "Logout" style ="font-size: 20px;"><i class = "fas fa-sign-out"></i></a> Logout</li>
                <?php }else{ ?>
                	<li><a href = "<?php echo base_url('masuk') ?>" placeholder = "User"><i class = "fas fa-user"></i> Login</a></li>
                <?php } ?>
                </ul>
            </div>
    </div>
</div>

<!-- Header Ends -->

<div class = "banner">
    <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>">
</div>

<div class = "categories-main">
    
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

    <!-- Product Column 1 Start-->
        <div class = "col-3">
                <div class = "pricey">
                    <h3>Price</h3>
                <p>Rp.<?php echo number_format($produk->harga,'0',',','.') ?></p>
                <span>
                    <a href = "<?php echo base_url('belanja/cart') ?>">
                        <button>Add</button>
                    </a>
                </span>
                </div>   
        </div>


    <!-- Product Column 2 Start -->
    <div class = "col-3">
            <h4><?php echo $produk->nama_produk ?></h4>
            <div class = "caption">
                <h5>Details</h5>
                <p><?php echo $produk->keterangan ?></p>        
            </div>
    </div>
    <!-- Product Column 2 End-->

    <!-- Product Column 3 Start-->
        <div class = "col-3">
                <div class = "review">
                <h3>Reviews</h3>
                <button>Write a Review</button>
                <div class = "reviewInner">
                        <img src="<?php echo base_url('assets/template/images/product_view/person1.jpg')?>"  style="width: 10%;border-radius:50px;">
                        <span class="heading">Johnson Joe</span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <p>Wonderful Jacket! This would be nice for me to wear when I'm going on a vacation next Winter</p>
                </div>

                <div class = "reviewInner">
                        <img src="<?php echo base_url('assets/template/images/product_view/person2.jpg')?>" style="width: 10%;border-radius:100px;">
                        <span class="heading">Raging Redneck</span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star checked" style="color: yellow"></span>
                        <span class="fa fa-star"></span>
                        <p>this is going to be so fatastic once I wear this on my friend's huge & pretty rad parties. Thanks man ! !</p>
                </div>
                
            </div>
        </div>

    <?php 
	// Closing Form
	echo form_close();
	?>
</div>

    <!-- Products Arrival -->
    <div class = "product-area">

            <div class = "categories-mid">
                <ul>
                    <li><h3>New Arrivals</h3></li>
                    
                </ul>
                <?php foreach($produk_related as $produk_related) { ?>
                <div class = "col-3">
                    <a href = "<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>">
                        <img src = "<?php echo base_url('assets/upload/image/'.$produk_related->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>">
                        <div class = "caption">
                            <h2><?php echo $produk_related->nama_produk ?></h2>
                            <h4>Department Lorem.</h4>
                                 <button class = "price">Rp.<?php echo number_format($produk_related->harga,'0',',','.') ?></button>
                                 <h4>Details Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.</h4>
                        </div>
                        
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>

<script src = "js/jquery-3.4.1.min.js"></script>
<script src = "js/jquery.cycle.js"></script>
</body>
</html>