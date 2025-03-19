    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <?= form_error('kdumkm', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Data UMKM</a>

  <!-- <div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group ">
 				 <input type="text" class="form-control" placeholder="Cari Data UMKM..."  name="keyword" >
 				 <div class="input-group-append">
 				   <button class="btn btn-primary" type="submit" >Cari</button>
  				</div>
			</div>

			</form>
		</div>
	</div>
  -->

              <div class="table-responsive">
                <table class="table table-bordered"  id="dataTables-example"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode UMKM</th>
                      <th scope="col">Nama Usaha</th>
                      <th scope="col">Jenis Usaha</th>
                      <th scope="col">Nama Pemilik</th>
                      <th scope="col">No HP</th>
                      <th scope="col">Email</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Username</th>
                      <th scope="col">Password</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($umkm as $um) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $um['kdumkm']; ?></td>
                      <td><?= $um['nmusaha']; ?></td>
                      <td><?= $um['jnusaha']; ?></td>
                      <td><?= $um['pemilik']; ?></td>
                      <td><?= $um['no_hp']; ?></td>
                      <td><?= $um['email']; ?></td>
                      <td><?= $um['alamat']; ?></td>
                      <td><?= $um['username']; ?></td>
                      <td><?= $um['password']; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>master/editumkm/<?= $um['id'];?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url(); ?>master/hapusumkm/<?= $um['id'];?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach ; ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Master UMKM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?= base_url('master/umkm'); ?>" method="post">
          <div class="modal-body">            
          <div class="form-group">
              <label>Kode UMKM</label>
                <input type="text" class="form-control" id="kdumkm" name="kdumkm" placeholder="Kode UMKM.." value="<?= set_value('kdumkm'); ?>">
                <?= form_error('kdumkm', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> 
          <div class="form-group">
              <label>Nama Usaha</label>
                <input type="text" class="form-control" id="nmusaha" name="nmusaha" placeholder="Nama UMKM.." value="<?= set_value('nama'); ?>">
                <?= form_error('nmusaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
            <div class="form-group">
              <label>Jenis Usaha</label>
                <input type="text" class="form-control" id="jnusaha" name="jnusaha" placeholder="Jenis Usaha.." value="<?= set_value('jnusaha'); ?>">
                <?= form_error('jnusaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Pemilik</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Nama Pemilik.." value="<?= set_value('pemilik'); ?>">
                <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Hp" value="<?= set_value('no_hp'); ?>">
                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat.." value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="example@gmail.com" value="<?= set_value('username'); ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
      </form>
    </div>
  </div>
</div>