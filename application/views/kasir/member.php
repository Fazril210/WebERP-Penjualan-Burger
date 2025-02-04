<div class="container">
    <h2 class="mb-4">Daftar Member</h2>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Member</th>
                <th>Nama Member</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($customers)): ?>
                <?php foreach($customers as $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer->id_customers) ?></td>
                        <td><?= htmlspecialchars($customer->name_customers) ?></td>
                        <td><?= htmlspecialchars($customer->phone) ?></td>
                        <td><?= htmlspecialchars($customer->jenis_kelamin) ?></td>
                        <td>
                            <a href="<?= base_url('kasir/edit_member/'.$customer->id_customers) ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="<?= base_url('kasir/delete_member/'.$customer->id_customers) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?');">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data member.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="<?= base_url('kasir/add_member') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Member
    </a>
</div>
