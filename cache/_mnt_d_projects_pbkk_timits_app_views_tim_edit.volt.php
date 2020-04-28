
<title>Edit Tim - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    

<h2>Edit Tim</h2>
<div class="container" width="10px">
<?= $this->tag->form(['tim/editSubmit/' . $tims->team_id, 'method' => 'post']) ?>
    
    <div class="form-group">
        <label for="namatim">Nama Tim</label>
        <?= $this->tag->textField(['namatim', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama Tim', 'value' => $tims->team_nama]) ?>
    </div>

    <div class="form-group">
        <label for="namalomba">Nama Lomba</label>
        <?= $this->tag->textField(['namalomba', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama Lomba', 'value' => $tims->nama_lomba]) ?>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori</label>
        <?= $this->tag->textField(['kategori', 'class' => 'form-control', 'placeholder' => 'Masukkan Kategori', 'value' => $tims->kategori]) ?>
    </div>

    <div class="row">
    <div class="form-group col-md-8">
        <label for="kontak">Nomor Telepon</label>
        <?= $this->tag->telField(['kontak', 'class' => 'form-control', 'placeholder' => 'Masukkan Nomor Telepon yang bisa dihubungi', 'value' => $tims->kontak]) ?>
    </div>

    <div class="form-group col-md-4">
        <label for="jumlah">Jumlah anggota yang dibutuhkan</label>
        <?= $this->tag->numericField(['jumlah', 'class' => 'form-control', 'placeholder' => 'Masukkan jumlah anggota yang dibutuhkan', 'min' => '1', 'value' => $tims->jumlahkurang]) ?>
    </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <?= $this->tag->textArea(['deskripsi', 'class' => 'form-control', 'placeholder' => 'Masukkan deskripsi yang dibutuhkan', 'value' => $tims->deskripsi]) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Edit Tim', 'class' => 'btn btn-primary']) ?>
    </div>

<?= $this->tag->endForm() ?>
</div>


</div>
<footer class='footer' style="position:absolute;">
    <div class="container">
        <span>
            
                &copy; Copyright 2020-present. 
                All rights reserved.
            
        </span>
    </div>
</footer>