    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	<div class="col-lg-7">
        	<form action="" method="post">
        		<input type="hidden" name="id" id="id" value="<?= $mahasiswa['id']; ?>">
		             <div class="modal-body">       
			            <div class="form-group">
			              <label>Nama</label>
			                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $mahasiswa['nama']; ?>">
			                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
			            </div>
			            <div class="form-group">
			              <label>NIM</label>
			                <input type="text" class="form-control" id="nim" name="nim" placeholder="nim" value="<?= $mahasiswa['nim']; ?>" readonly>
			                <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
			            </div>
			            <div class="form-group">
			              <label>Email</label>
			                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $mahasiswa['email']; ?>">
			                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
			            </div>
			            <div class="form-group">
			              <label>Jurusan</label>
			                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan" value="<?= $mahasiswa['jurusan']; ?>">
			                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
			            </div>
			          </div>
		             <div class="modal-footer">
			        <a href="<?= base_url(); ?>master/mahasiswa" class="btn btn-secondary" data-dismiss="modal">Close</a>
			        <button type="submit" class="btn btn-primary">Edit</button>
		           
		      </form>
        	</div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

