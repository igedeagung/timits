
<title>List Tim - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    
    <h2>List Tim</h2>
    <hr>
    <div style="overflow-x:auto">
    <?php if ($this->length($teams)) { ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Ketua</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nomor Telepon</th>
                    <?php if ($this->session->has('AUTH_ID')) { ?>
                        <th scope="col">Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php $v98826419159728772311iterator = $teams; $v98826419159728772311incr = 0; $v98826419159728772311loop = new stdClass(); $v98826419159728772311loop->self = &$v98826419159728772311loop; $v98826419159728772311loop->length = count($v98826419159728772311iterator); $v98826419159728772311loop->index = 1; $v98826419159728772311loop->index0 = 1; $v98826419159728772311loop->revindex = $v98826419159728772311loop->length; $v98826419159728772311loop->revindex0 = $v98826419159728772311loop->length - 1; ?><?php foreach ($v98826419159728772311iterator as $team) { ?><?php $v98826419159728772311loop->first = ($v98826419159728772311incr == 0); $v98826419159728772311loop->index = $v98826419159728772311incr + 1; $v98826419159728772311loop->index0 = $v98826419159728772311incr; $v98826419159728772311loop->revindex = $v98826419159728772311loop->length - $v98826419159728772311incr; $v98826419159728772311loop->revindex0 = $v98826419159728772311loop->length - ($v98826419159728772311incr + 1); $v98826419159728772311loop->last = ($v98826419159728772311incr == ($v98826419159728772311loop->length - 1)); ?>
                <tr>
                    <th scope="row"><?= $v98826419159728772311loop->index ?></th>
                    <td><?= $team->teamku->team_nama ?></td>
                    <td><?= $team->teamku->nama_lomba ?></td>
                    <td><?= $team->teamku->kategori ?></td>
                    <td><?= $team->userku->nama ?></td>
                    <td><?= $team->teamku->deskripsi ?></td>
                    <td><?= $team->teamku->kontak ?></td>
                    <?php if ($this->session->has('AUTH_ID')) { ?>
                    <td>
                        <a class="btn btn-primary" href="/tim/join/<?= $team->teamku->team_id ?>">Ikut Tim</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php $v98826419159728772311incr++; } ?>
            </tbody>
        </table>
        </div>
    <?php } else { ?>
        <p>Tim Kosong</p>
    <?php } ?>

</div>
