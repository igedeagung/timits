
<title>View - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    
    <h1>Detail Tim</h1>
    <div style="overflow-x:auto">
    <div>
        <p>Nama Tim = <?= $detailteam->team_nama ?></p>
        <p>Nama Lomba = <?= $detailteam->nama_lomba ?></p>
        <p>Kategori = <?= $detailteam->kategori ?></p>
        <p>Deskripsi = <?= $detailteam->deskripsi ?></p>
        <p>Kontak = <?= $detailteam->kontak ?></p>
        <p>Jumlah Anggota yang dibutuhkan = <?= $detailteam->jumlahkurang ?></p>
        <a class="btn btn-primary" href="/tim/edit/<?= $detailteam->team_id ?>">Edit</a>
    </div>
    <h1>Kandidat Anggota</h1>
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
<footer class='footer' style="position:absolute;">
    <div class="container">
        <span>
            
                &copy; Copyright 2020-present. 
                All rights reserved.
            
        </span>
    </div>
</footer>