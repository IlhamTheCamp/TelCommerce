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
	                <li><a href = "#" placeholder = "Cart" style ="font-size: 20px;"><i class ="fas fa-cart-plus"></i></a></li>
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

<!-- Main Categories -->
<div class = "product-area">
    <div  class = "container">
            <!-- Main categories of the products with catalogs -->
        <h3>Categories</h3>
            <div class = "categories-main">
                <div class = "col-3">
                    <a href = "#">
                        <div class = "categories-caption">
                            <img src = "<?php echo base_url() ?>assets/upload/catalog/shoe_men.png">
                            <h5>Men</h5>
                        </div>
                    </a>
                </div>
                <div class = "col-3">
                        <a href = "#">
                            <div class = "categories-caption">
                                <img src = "<?php echo base_url() ?>assets/upload/catalog/heels_women.png">
                                <h5>Women</h5>
                            </div>
                        </a>
                </div>
                <div class = "col-3">
                        <a href = "#">
                            <div class = "categories-caption">
                                <img src = "<?php echo base_url() ?>assets/upload/catalog/electronic.png">
                                <h5>Electronics</h5>
                            </div>
                        </a>
                </div>
                <div class = "col-3">
                        <a href = "#">
                            <div class = "categories-caption">
                                <img src = "<?php echo base_url() ?>assets/upload/catalog/gadget.png">
                                <h5>Gadgets</h5>
                            </div>
                        </a>
                </div>
                <div class = "col-3">
                        <a href = "#">
                            <div class = "categories-caption">
                                <img src = "<?php echo base_url() ?>assets/upload/catalog/gaming.png">
                                <h5>Gaming</h5>
                            </div>
                        </a>
                </div>
            </div>
            <!-- End of Main categories of the products with catalogs -->

            <!-- Middle categories of the products -->
            
            <div class = "categories-mid">
                <ul>
                    <li><h3>Best Rent</h3></li>
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
            <!-- End of Middle categories of the products -->
         
			</div>
    </div>
</div>
<!-- End of Main Categories -->
<!-- Popular brands -->
<div class = "popularBrands">
    <div class = "container">
        <h3>Popular Brands</h3>
        <div class = "popularBrands-inner">
            <a href = "#">Vapid</a>
            <a href = "#">Redwood</a>
            <a href = "#">GoldCoast</a>
            <a href = "#">Bronco</a>
            <a href = "#">Apple</a>
            <a href = "#">Samsung</a>
            <a href = "#">Panasonic</a>
            <a href = "#">ASUS</a>
            <a href = "#">Microsoft</a>
        </div>
    </div>
</div>
<!-- Popular brands End -->

<div class = "popularProducts">
    <div class = "container">
        <h3>Popular Brand's Products</h3>
        <div class = "owl-carousel">
            <div class = "item"><img src = "https://picsum.photos/410/410?random=1"></div>
            <div class = "item"><img src = "https://picsum.photos/410/410?random=2"></div>
            <div class = "item"><img src = "https://picsum.photos/410/410?random=3"></div>
            <div class = "item"><img src = "https://picsum.photos/410/410?random=4"></div>
            <div class = "item"><img src = "https://picsum.photos/410/410?random=5"></div>
            <div class = "item"><img src = "https://picsum.photos/410/410?random=6"></div>
        </div>
    </div>
</div>
</div>

<script src = "<?php echo base_url() ?>assets/template/js/jquery-3.4.1.min.js"></script>
<script src = "<?php echo base_url() ?>assets/template/js/jquery.cycle.js"></script>
<script src = "<?php echo base_url() ?>assets/template/js/owl.carousel.min.js"></script>
<script>
    $("#sliderShuffle").cycle({
        next: '#next',
        prev: '#prev'
    });
    
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

    $(function(){
        $(".topbar ul li").click(function(){
            $(".topbar ul li").not(this).find("ul").slideUp();
            $(this).find("ul").slideToggle();
        });
        $(".topbar ul li ul li, productCategories ul li .megamenu").click(function(e){
            e.stopPropagation();	
        });
        $(".productCategories ul li").click(function(){
            $(".productCategories ul li").not(this).find(".megamenu").hide();
            $(this).find(".megamenu").toggle();
        });
        $(".otherInfoBody").hide();
        $(".otherInfoHandle").click(function(){
            $(".otherInfoBody").slideToggle();
        });
        $(".signBtn").click(function(){
            $("body").css("overflow", "hidden");
            $(".loginBox").slideDown();
        });
        $(".closeBtn").click(function(){
            $("body").css("overflow", "visible");
            $(".loginBox").slideUp();
        });
        $(".productViewBtn").click(function(e){
            e.preventDefault();
            $("body").css("overflow", "hidden");
            $(".productViewBox").slideDown();
        });
        $(".productViewBox-closeBtn").click(function(){
            $("body").css("overflow", "visible");
            $(".productViewBox").slideUp();
        });
    });
</script>
</body>
</html>