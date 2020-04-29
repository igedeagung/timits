{% extends 'templates/base.volt' %}

{% block title %}Buat Tim{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}

<h2>Buat Tim</h2>
<hr>
<div class="container">
{{ form('tim/createSubmit', 'method': 'post') }}
    
    <div class="form-group">
        <label for="namatim">Nama Tim</label>
        {{ text_field('namatim', "class":"form-control", "placeholder":"Masukkan Nama Tim") }}
    </div>

    <div class="form-group">
        <label for="namalomba">Nama Lomba</label>
        {{ text_field('namalomba', "class":"form-control", "placeholder":"Masukkan Nama Lomba") }}
    </div>

    <div class="form-group">
        <label for="kategori">Kategori</label>
        {{ text_field('kategori', "class":"form-control", "placeholder":"Masukkan Kategori") }}
    </div>

    <div class="row">
    <div class="form-group col-md-6">
        <label for="kontak">Nomor Telepon</label>
        {{ tel_field('kontak', "class":"form-control", "placeholder":"Masukkan Nomor Telepon yang bisa dihubungi") }}
    </div>

    <div class="form-group col-md-6">
        <label for="jumlah">Jumlah anggota yang dibutuhkan</label>
        {{ numeric_field('jumlah', "class":"form-control", "placeholder":"Masukkan jumlah anggota yang dibutuhkan", "min":"1") }}
    </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        {{ text_area('deskripsi', "class":"form-control", "placeholder":"Masukkan deskripsi yang dibutuhkan") }}
    </div>

    <div class="form-group">
        {{ submit_button('Buat Tim', 'class':'btn btn-primary') }}
    </div>

{{ end_form() }}
</div>

{% endblock %}