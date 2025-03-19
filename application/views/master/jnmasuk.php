    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <?= form_error('kdmasuk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Kategori Pemasukan</a>

              <div class="table-responsive">
                <table class="table table-bordered"  id="dataTables-example"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th scope="col">No.</th>
                      <th scope="col">Kode Akun</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Jenis Pemasukan</th>
                      <th scope="col">Keterangan</th>
                      
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jnmasuk as $msk) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $msk['kdmasuk']; ?></td>
                      <td><?= $msk['nmmasuk']; ?></td>
                      <td><?= $msk['jnmasuk']; ?></td>
                      <td><?= $msk['ket']; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>master/editjnmasuk/<?= $msk['id'];?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url(); ?>master/hapusjnmasuk/<?= $msk['id'];?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Master Pemasukann</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?= base_url('master/jnmasuk'); ?>" method="post">
          <div class="modal-body">            
            <div class="form-group">
              <label>Kode Akun </label>
                <input type="text" class="form-control" id="kdmasuk" name="kdmasuk" placeholder="Kode Akun" value="<?= set_value('kdmasuk'); ?>">
                <?= form_error('kdmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Nama Akun</label>
                <input type="text" class="form-control" id="nmmasuk" name="nmmasuk" placeholder="Nama Akun" value="<?= set_value('nmmasuk'); ?>">
                <?= form_error('nmmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Jenis Pemasukan</label>
                <input type="text" class="form-control" id="jnmasuk" name="jnmasuk" placeholder="Biaya/Non Biaya" value="<?= set_value('jnmasuk'); ?>">
                <?= form_error('jnmasuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" value="<?= set_value('ket'); ?>">
                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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