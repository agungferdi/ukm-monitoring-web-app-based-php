    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	<div class="col-lg-7">
        	<form action="" method="post">
        		<input type="hidden" name="id" id="id" value="<?= $jnmasuk['id']; ?>">
                <div class="modal-body">            
            <div class="form-group">
              <label>Kode Akun </label>
                <input type="text" class="form-control" id="kdmasuk" name="kdmasuk" placeholder="kdmasuk" value="<?= set_value('kdmasuk'); ?>">
                <?= form_error('kdmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Nama Akun</label>
                <input type="text" class="form-control" id="nmmasuk" name="nmmasuk" placeholder="nmmasuk" value="<?= set_value('nmmasuk'); ?>">
                <?= form_error('nmmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Jenis Pemasukan</label>
                <input type="text" class="form-control" id="jnmasuk" name="jnmasuk" placeholder="jnmasuk" value="<?= set_value('jnmasuk'); ?>">
                <?= form_error('jnmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="ket" value="<?= set_value('ket'); ?>">
                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
		             <div class="modal-footer">
			        <a href="<?= base_url(); ?>master/jnmasuk class="btn btn-secondary" data-dismiss="modal">Close</a>
			        <button type="submit" class="btn btn-primary">Edit</button>
		           
		      </form>
        	</div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

