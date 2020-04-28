
<title>Buat Tim - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    

<h2>Buat Tim</h2>
<div class="container">
<?= $this->tag->form(['tim/createSubmit', 'method' => 'post']) ?>
    
    <div class="form-group">
        <label for="namatim">Nama Tim</label>
        <?= $this->tag->textField(['namatim', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama Tim']) ?>
    </div>

    <div class="form-group">
        <label for="namalomba">Nama Lomba</label>
        <?= $this->tag->textField(['namalomba', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama Lomba']) ?>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori</label>
        <?= $this->tag->textField(['kategori', 'class' => 'form-control', 'placeholder' => 'Masukkan Kategori']) ?>
    </div>

    <div class="row">
    <div class="form-group col-md-6">
        <label for="kontak">Nomor Telepon</label>
        <?= $this->tag->telField(['kontak', 'class' => 'form-control', 'placeholder' => 'Masukkan Nomor Telepon yang bisa dihubungi']) ?>
    </div>

    <div class="form-group col-md-6">
        <label for="jumlah">Jumlah anggota yang dibutuhkan</label>
        <?= $this->tag->numericField(['jumlah', 'class' => 'form-control', 'placeholder' => 'Masukkan jumlah anggota yang dibutuhkan', 'min' => '1']) ?>
    </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <?= $this->tag->textArea(['deskripsi', 'class' => 'form-control', 'placeholder' => 'Masukkan deskripsi yang dibutuhkan']) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Buat Tim', 'class' => 'btn btn-primary']) ?>
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