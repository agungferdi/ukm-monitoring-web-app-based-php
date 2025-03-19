    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	<div class="col-lg-7">
        	<form action="" method="post">
        		<input type="hidden" name="id" id="id" value="<?= $umkm['id']; ?>">
		             <div class="modal-body">       
			                    
          <div class="form-group">
              <label>Kode UMKM</label>
                <input type="text" class="form-control" id="kdumkm" name="kdumkm" placeholder="kdumkm" value="<?= $umkm['kdumkm']; ?>">
                <?= form_error('kdumkm', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> 
          <div class="form-group">
              <label>Nama Usaha</label>
                <input type="text" class="form-control" id="nmusaha" name="nmusaha" placeholder="nmusaha" value="<?= $umkm['nmusaha']; ?>">
                <?= form_error('nmusaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label>Jenis Usaha</label>
                <input type="text" class="form-control" id="jnusaha" name="jnusaha" placeholder="jnusaha" value="<?= $umkm['jnusaha']; ?>">
                <?= form_error('jnusaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Pemilik</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="pemilik" value="<?= $umkm['pemilik']; ?>">
                <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="no_hp" value="<?= $umkm['no_hp']; ?>">
                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $umkm['email']; ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= $umkm['alamat']; ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $umkm['username']; ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?= $umkm['password']; ?>">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
		             <div class="modal-footer">
			        <a href="<?= base_url(); ?>master/umkm class="btn btn-secondary" data-dismiss="modal">Close</a>
			        <button type="submit" class="btn btn-primary">Edit</button>
		           
		      </form>
        	</div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

