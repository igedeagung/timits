
<title>Dashboard - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    
    <h2>Dashboard</h2>
    <hr>
    <h4><?= 'Hai ' . $this->session->get('AUTH_NAME') ?></h4>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <p>Tim anda: </p>
        </div>
        <div class="col-sm-6" align="right">
            <a href="/tim/create" class="btn btn-primary"> Tambah Tim </a>
        </div>
    </div>
    <?php if ($this->length($teams)) { ?>
        <div style="overflow-x:auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Jumlah yang dibutuhkan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $v98691789055782333251iterator = $teams; $v98691789055782333251incr = 0; $v98691789055782333251loop = new stdClass(); $v98691789055782333251loop->self = &$v98691789055782333251loop; $v98691789055782333251loop->length = count($v98691789055782333251iterator); $v98691789055782333251loop->index = 1; $v98691789055782333251loop->index0 = 1; $v98691789055782333251loop->revindex = $v98691789055782333251loop->length; $v98691789055782333251loop->revindex0 = $v98691789055782333251loop->length - 1; ?><?php foreach ($v98691789055782333251iterator as $team) { ?><?php $v98691789055782333251loop->first = ($v98691789055782333251incr == 0); $v98691789055782333251loop->index = $v98691789055782333251incr + 1; $v98691789055782333251loop->index0 = $v98691789055782333251incr; $v98691789055782333251loop->revindex = $v98691789055782333251loop->length - $v98691789055782333251incr; $v98691789055782333251loop->revindex0 = $v98691789055782333251loop->length - ($v98691789055782333251incr + 1); $v98691789055782333251loop->last = ($v98691789055782333251incr == ($v98691789055782333251loop->length - 1)); ?>
                <tr>
                    <th scope="row"><?= $v98691789055782333251loop->index ?></th>
                    <td><?= $team->team_nama ?></td>
                    <td><?= $team->nama_lomba ?></td>
                    <td><?= $team->kategori ?></td>
                    <td><?= $team->kontak ?></td>
                    <td><?= $team->jumlahkurang ?></td>
                    <td>
                        <a class="btn btn-primary" href="/tim/view/<?= $team->team_id ?>">Detail</a>
                        <a class="btn btn-danger" href="/tim/delete/<?= $team->team_id ?>">Hapus</a>
                    </td>
                </tr>
                <?php $v98691789055782333251incr++; } ?>
            </tbody>
        </table>
        </div>
    <?php } else { ?>
        <p>Tim anda Kosong</p>
    <?php } ?>
  <br>  
<div class="row">
    <div class="col-sm-6">
        <p>Tim bergabung anda: </p>
    </div>
</div>
    <?php if ($this->length($joins)) { ?>
        <div style="overflow-x:auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Nama Ketua</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $v98691789055782333251iterator = $joins; $v98691789055782333251incr = 0; $v98691789055782333251loop = new stdClass(); $v98691789055782333251loop->self = &$v98691789055782333251loop; $v98691789055782333251loop->length = count($v98691789055782333251iterator); $v98691789055782333251loop->index = 1; $v98691789055782333251loop->index0 = 1; $v98691789055782333251loop->revindex = $v98691789055782333251loop->length; $v98691789055782333251loop->revindex0 = $v98691789055782333251loop->length - 1; ?><?php foreach ($v98691789055782333251iterator as $join) { ?><?php $v98691789055782333251loop->first = ($v98691789055782333251incr == 0); $v98691789055782333251loop->index = $v98691789055782333251incr + 1; $v98691789055782333251loop->index0 = $v98691789055782333251incr; $v98691789055782333251loop->revindex = $v98691789055782333251loop->length - $v98691789055782333251incr; $v98691789055782333251loop->revindex0 = $v98691789055782333251loop->length - ($v98691789055782333251incr + 1); $v98691789055782333251loop->last = ($v98691789055782333251incr == ($v98691789055782333251loop->length - 1)); ?>
                <tr>
                    <th scope="row"><?= $v98691789055782333251loop->index ?></th>
                    <td><?= $join->teamku->team_nama ?></td>
                    <td><?= $join->teamku->nama_lomba ?></td>
                    <td><?= $join->userku->nama ?></td>
                    <td><?= $join->teamku->kategori ?></td>
                    <td><?= $join->teamku->kontak ?></td>
                    <td><?= $join->joinku->status ?></td>
                    <?php if ($join->joinku->status === 'Tunggu') { ?>
                    <td>
                        <a class="btn btn-danger" href="/join/cancel/<?= $join->teamku->team_id ?>">Batalkan bergabung</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php $v98691789055782333251incr++; } ?>
            </tbody>
        </table>
        </div>
    <?php } else { ?>
        <p>Anda belum bergabung dengan tim</p>
    <?php } ?>

</div>
