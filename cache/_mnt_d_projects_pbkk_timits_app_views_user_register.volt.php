
<title>Register - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    

<h2>Daftar</h2>
<hr>
<div class="w-50 mx-auto">
<?= $this->tag->form(['user/registerSubmit', 'method' => 'post']) ?>
    
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <?= $this->tag->textField(['nama', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama lengkap']) ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <?= $this->tag->emailField(['email', 'class' => 'form-control', 'placeholder' => 'Masukkan Email']) ?>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <?= $this->tag->textField(['username', 'class' => 'form-control', 'placeholder' => 'Masukkan Username']) ?>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <?= $this->tag->passwordField(['password', 'class' => 'form-control', 'placeholder' => 'Masukkan Password']) ?>
    </div>

    <div class="form-group">
        <label for="kpassword">Konfirmasi Password</label>
        <?= $this->tag->passwordField(['kpassword', 'class' => 'form-control', 'placeholder' => 'Masukkan Konfirmasi Password']) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Daftar', 'class' => 'btn btn-primary']) ?>
    </div>

<?= $this->tag->endForm() ?>
</div>


</div>
