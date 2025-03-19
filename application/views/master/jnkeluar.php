    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>
            <?= form_error('kdkeluar', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Kategori Pengeluaran</a>

              <div class="table-responsive">
                <table class="table table-bordered"  id="dataTables-example"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Akun</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Jenis Pengeluaran</th>
                      <th scope="col">Keterangan</th>
                      
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jnkeluar as $klr) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $klr['kdkeluar']; ?></td>
                      <td><?= $klr['nmkeluar']; ?></td>
                      <td><?= $klr['jnkeluar']; ?></td>
                      <td><?= $klr['ket']; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>master/editjnkeluar/<?= $klr['id'];?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url(); ?>master/hapusjnkeluar/<?= $klr['id'];?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Master Jenis Pengeluaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="<?= base_url('master/jnkeluar'); ?>" method="post">
          <div class="modal-body">            
            <div class="form-group">
              <label>Kode Akun </label>
                <input type="text" class="form-control" id="kdkeluar" name="kdkeluar" placeholder="Kode Akun" value="<?= set_value('kdkeluar'); ?>">
                <?= form_error('kdkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Nama Akun</label>
                <input type="text" class="form-control" id="nmkeluar" name="nmkeluar" placeholder="Nama Akun" value="<?= set_value('nmkeluar'); ?>">
                <?= form_error('nmkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Jenis Pengeluaran</label>
                <input type="text" class="form-control" id="jnkeluar" name="jnkeluar" placeholder="Biaya/Non Biaya" value="<?= set_value('jnkeluar'); ?>">
                <?= form_error('jnkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
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