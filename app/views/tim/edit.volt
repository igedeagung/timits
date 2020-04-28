{% extends 'templates/base.volt' %}

{% block title %}Edit Tim{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}

<h2>Edit Tim</h2>
<div class="container" width="10px">
{{ form('tim/editSubmit/'~tims.team_id, 'method': 'post') }}
    
    <div class="form-group">
        <label for="namatim">Nama Tim</label>
        {{ text_field('namatim', "class":"form-control", "placeholder":"Masukkan Nama Tim", "value": tims.team_nama) }}
    </div>

    <div class="form-group">
        <label for="namalomba">Nama Lomba</label>
        {{ text_field('namalomba', "class":"form-control", "placeholder":"Masukkan Nama Lomba", "value": tims.nama_lomba) }}
    </div>

    <div class="form-group">
        <label for="kategori">Kategori</label>
        {{ text_field('kategori', "class":"form-control", "placeholder":"Masukkan Kategori", "value": tims.kategori) }}
    </div>

    <div class="row">
    <div class="form-group col-md-8">
        <label for="kontak">Nomor Telepon</label>
        {{ tel_field('kontak', "class":"form-control", "placeholder":"Masukkan Nomor Telepon yang bisa dihubungi", "value": tims.kontak) }}
    </div>

    <div class="form-group col-md-4">
        <label for="jumlah">Jumlah anggota yang dibutuhkan</label>
        {{ numeric_field('jumlah', "class":"form-control", "placeholder":"Masukkan jumlah anggota yang dibutuhkan", "min":"1" , "value": tims.jumlahkurang) }}
    </div>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        {{ text_area('deskripsi', "class":"form-control", "placeholder":"Masukkan deskripsi yang dibutuhkan", "value": tims.deskripsi) }}
    </div>

    <div class="form-group">
        {{ submit_button('Edit Tim', 'class':'btn btn-primary') }}
    </div>

{{ end_form() }}
</div>

{% endblock %}