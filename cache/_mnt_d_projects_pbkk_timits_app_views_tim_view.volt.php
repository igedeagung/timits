
<title>View - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    
    <h2>Detail Tim</h2>
    <hr>
    <div style="overflow-x:auto">
    <div class="card" style="width: 50rem;">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <p>Nama Tim</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->team_nama ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Nama Lomba</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->nama_lomba ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Kategori</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->kategori ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Deskripsi</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->deskripsi ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Nomor Telepon</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->kontak ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Jumlah anggota yang dibutuhkan</p>
            </div>
            <div class="col-sm-6">
                <p><?= $detailteam->jumlahkurang ?></p>
            </div>
        </div>
        </div>
        <a class="btn btn-primary" href="/tim/edit/<?= $detailteam->team_id ?>">Edit</a>
    </div>
    <br>
    <h2>Kandidat Anggota</h2>
    <hr>
    <?php if ($this->length($candidates)) { ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $v170698377174977927221iterator = $candidates; $v170698377174977927221incr = 0; $v170698377174977927221loop = new stdClass(); $v170698377174977927221loop->self = &$v170698377174977927221loop; $v170698377174977927221loop->length = count($v170698377174977927221iterator); $v170698377174977927221loop->index = 1; $v170698377174977927221loop->index0 = 1; $v170698377174977927221loop->revindex = $v170698377174977927221loop->length; $v170698377174977927221loop->revindex0 = $v170698377174977927221loop->length - 1; ?><?php foreach ($v170698377174977927221iterator as $candidate) { ?><?php $v170698377174977927221loop->first = ($v170698377174977927221incr == 0); $v170698377174977927221loop->index = $v170698377174977927221incr + 1; $v170698377174977927221loop->index0 = $v170698377174977927221incr; $v170698377174977927221loop->revindex = $v170698377174977927221loop->length - $v170698377174977927221incr; $v170698377174977927221loop->revindex0 = $v170698377174977927221loop->length - ($v170698377174977927221incr + 1); $v170698377174977927221loop->last = ($v170698377174977927221incr == ($v170698377174977927221loop->length - 1)); ?>
                <tr>
                    <th scope="row"><?= $v170698377174977927221loop->index ?></th>
                    <td><?= $candidate->userku->nama ?></td>
                    <td><?= $candidate->userku->email ?></td>
                    <td><?= $candidate->joinku->status ?></td>
                    <td>
                        <?php if ($candidate->joinku->status === 'Tunggu') { ?>
                        <a class="btn btn-primary" href="/join/acc/<?= $candidate->teamku->team_id ?>/<?= $candidate->userku->id ?>">Terima</a>
                        <?php } ?>
                        <a class="btn btn-danger" href="/join/dec/<?= $candidate->teamku->team_id ?>/<?= $candidate->userku->id ?>">Tolak</a>
                    </td>
                </tr>
                <?php $v170698377174977927221incr++; } ?>
            </tbody>
        </table>
        </div>
    <?php } else { ?>
        <p>Belum ada permintaan bergabung</p>
    <?php } ?>

</div>
