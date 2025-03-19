    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	<div class="col-lg-7">
        	<form action="" method="post">
        		<input type="hidden" name="id" id="id" value="<?= $jnkeluar['id']; ?>">
                <div class="modal-body">            
            <div class="form-group">
              <label>Kode Akun </label>
                <input type="text" class="form-control" id="kdkeluar" name="kdkeluar" placeholder="kdkeluar" value="<?= set_value('kdkeluar'); ?>">
                <?= form_error('kdkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Nama Akun</label>
                <input type="text" class="form-control" id="nmkeluar" name="nmkeluar" placeholder="nmkeluar" value="<?= set_value('nmkeluar'); ?>">
                <?= form_error('nmkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Jenis Pengeluaran</label>
                <input type="text" class="form-control" id="jnkeluar" name="jnkeluar" placeholder="jnkeluar" value="<?= set_value('jnkeluar'); ?>">
                <?= form_error('jnkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="ket" value="<?= set_value('ket'); ?>">
                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
		             <div class="modal-footer">
			        <a href="<?= base_url(); ?>master/jnkeluar class="btn btn-secondary" data-dismiss="modal">Close</a>
			        <button type="submit" class="btn btn-primary">Edit</button>
		           
		      </form>
        	</div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

