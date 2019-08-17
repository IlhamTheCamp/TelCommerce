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
                <?php }else{ ?>
                    <li><a href = "<?php echo base_url('masuk') ?>" placeholder = "User"><i class = "fas fa-user"></i> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class = "imageLeft">
    <img src = "<?php echo base_url() ?>assets/template/images/product_view/blackheadphone.JPG"/>        
</div>

<?php
// Error upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/produk/tambah'), ' class="form-horizontal"');
?>

<div class = "loginBox">
  <div class =""></div>
  <div class = "registerForm">
    <div class="form-group form-group-lg">
      <label class="col-md-2 control-label">Product Name</label>
      <div class="col-md-5">
        <input class="textField" type="text" name="nama_produk" class="form-control" placeholder="Product Name" value="<?php echo set_value('nama_produk') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Product Code</label>
      <div class="col-md-5">
        <input class="textField" type="text" name="kode_produk" class="form-control" placeholder="(choose any random number)" value="<?php echo set_value('kode_produk') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Categories</label>
      <div class="col-md-5">
        <select class="textField" name="id_kategori" class="form-control">
          <?php foreach($kategori as $kategori) { ?>
          <option value="<?php echo $kategori->id_kategori ?>">
           <?php echo $kategori->nama_kategori ?> 
          </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Price</label>
      <div class="col-md-5">
        <input class="textField" type="number" name="harga" class="form-control" placeholder="Price" value="<?php echo set_value('harga') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Stock</label>
      <div class="col-md-5">
        <input class="textField" type="number" name="stok" class="form-control" placeholder="Stock" value="<?php echo set_value('stok') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Description</label>
      <div class="col-md-10">
        <textarea class="textField" name="keterangan" class="form-control" placeholder="Description" id="editor"><?php echo set_value('keterangan') ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Keywords</label>
      <div class="col-md-10">
        <textarea class="textField" name="keywords" class="form-control" placeholder="Keywords"><?php echo set_value('keywords') ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Upload Product Image</label>
      <div class="col-md-5">
        <input class="textField" type="file" name="gambar" class="form-control" required="required">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Status</label>
      <div class="col-md-5">
        <select name="status_produk" class="form-control">
          <option value="Publish">Publish</option>
          <option value="Draft">Draft</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
        	<i class="fa fa-save"></i> Confirm
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
        	<i class="fa fa-times"></i> Reset
        </button>
      </div>
    </div>
  </div>
</div>

<?php echo form_close(); ?>

<!-- END -->

