{% extends 'templates/base.volt' %}

{% block title %}Register{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}

<h2>Daftar</h2>
<hr>
<div class="w-50 mx-auto">
{{ form('user/registerSubmit', 'method': 'post') }}
    
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        {{ text_field('nama', "class":"form-control", "placeholder":"Masukkan Nama lengkap") }}
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        {{ email_field('email', "class":"form-control", "placeholder":"Masukkan Email") }}
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        {{ text_field('username', "class":"form-control", "placeholder":"Masukkan Username") }}
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        {{ password_field('password', "class":"form-control", "placeholder":"Masukkan Password") }}
    </div>

    <div class="form-group">
        <label for="kpassword">Konfirmasi Password</label>
        {{ password_field('kpassword', "class":"form-control", "placeholder":"Masukkan Konfirmasi Password") }}
    </div>

    <div class="form-group">
        {{ submit_button('Daftar', 'class':'btn btn-primary') }}
    </div>

{{ end_form() }}
</div>

{% endblock %}