{% extends 'templates/base.volt' %}

{% block title %}Index{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <div class="jumbotron">
        <h1 align="center">Selamat Datang di TIMITS</h1>
        <p align="center">TIMITS adalah situs untuk mencari tim bila anda kekurangan anggota atau sedang mencari tim</p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>Mencari Tim dengan mudah</h2>
            <p>Cari tim sesuai dengan kemampuan anda. </p>
        </div>
        <div class="col-md-4">
            <h2>Mendapatkan anggota yang diinginkan</h2>
            <p>Dapatka anggota sesuai kriteria tim anda.</p>
        </div>
        <div class="col-md-4">
            <h2>Raih juara dengan mudah</h2>
            <p>Dapatkan hasil yang diinginkan dengan tim yang berkelas. </p>
        </div>
    </div>

{% endblock %}