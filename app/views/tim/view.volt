{% extends 'templates/base.volt' %}

{% block title %}View{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <h2>Detail Tim</h2>
    <hr>
    <div style="overflow-x:auto">
    <div class="card" style="width: 50rem;">
        <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <p>Nama Tim</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.team_nama }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Nama Lomba</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.nama_lomba }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Kategori</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.kategori }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Deskripsi</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.deskripsi }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Nomor Telepon</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.kontak }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Jumlah anggota yang dibutuhkan</p>
            </div>
            <div class="col-sm-6">
                <p>{{ detailteam.jumlahkurang }}</p>
            </div>
        </div>
        </div>
        <a class="btn btn-primary" href="/tim/edit/{{ detailteam.team_id }}">Edit</a>
    </div>
    <br>
    <h2>Kandidat Anggota</h2>
    <hr>
    {% if candidates|length %}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {% for candidate in candidates %}
                <tr>
                    <th scope="row">{{ loop.index }}</th>
                    <td>{{ candidate.userku.nama }}</td>
                    <td>{{ candidate.userku.email }}</td>
                    <td>{{ candidate.joinku.status }}</td>
                    <td>
                        {% if candidate.joinku.status === "Tunggu" %}
                        <a class="btn btn-primary" href="/join/acc/{{ candidate.teamku.team_id }}/{{ candidate.userku.id }}">Terima</a>
                        {% endif %}
                        <a class="btn btn-danger" href="/join/dec/{{ candidate.teamku.team_id }}/{{ candidate.userku.id }}">Tolak</a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        </div>
    {% else %}
        <p>Belum ada permintaan bergabung</p>
    {% endif %}
{% endblock %}