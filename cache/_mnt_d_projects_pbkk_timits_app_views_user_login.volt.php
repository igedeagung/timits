
<title>Login - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <?= $this->flashSession->output() ?>
    </div>
    
    <h2>Masuk</h2>
    <hr>
    <div class="w-50 mx-auto">
    <?= $this->tag->form(['user/loginSubmit', 'method' => 'post']) ?>

    <div class="form-group">
        <label for="username">Username</label>
        <?= $this->tag->textField(['username', 'class' => 'form-control', 'placeholder' => 'Masukkan Username']) ?>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <?= $this->tag->passwordField(['password', 'class' => 'form-control', 'placeholder' => 'Masukkan Password']) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Masuk', 'class' => 'btn btn-primary']) ?>
    </div>

    <?= $this->tag->endForm() ?>
    <p>Belum punya akun ?
        <?= $this->tag->linkTo(['user/register', 'Daftar Sekarang']) ?>
    </p>
    </div>
    

</div>
