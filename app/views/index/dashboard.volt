{% extends 'templates/base.volt' %}

{% block title %}Dashboard{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <h1>Dashboard</h1>
    <p>{{ 'Hai '~session.get('AUTH_NAME') }}</p>
    {% if teams|length %}
        <p>Tim anda</p>
        <div style="overflow-x:auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Jumlah yang dibutuhkan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {% for team in teams %}
                <tr>
                    <th scope="row">{{ loop.index }}</th>
                    <td>{{ team.team_nama }}</td>
                    <td>{{ team.nama_lomba }}</td>
                    <td>{{ team.kategori }}</td>
                    <td>{{ team.kontak }}</td>
                    <td>{{ team.jumlahkurang }}</td>
                    <td>
                        <a class="btn btn-primary" href="/tim/view/{{ team.team_id }}">Detail</a>
                        <a class="btn btn-danger" href="/tim/delete/{{ team.team_id }}">Hapus</a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        </div>
    {% else %}
        <p>Tim anda Kosong</p>
    {% endif %}
    <a href="/tim/create" class="btn btn-primary"> Tambah Tim </a>
    {% if joins|length %}
        <p>Tim yang anda gabung</p>
        <div style="overflow-x:auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Nama Ketua</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {% for join in joins %}
                <tr>
                    <th scope="row">{{ loop.index }}</th>
                    <td>{{ join.teamku.team_nama }}</td>
                    <td>{{ join.teamku.nama_lomba }}</td>
                    <td>{{ join.userku.nama }}</td>
                    <td>{{ join.teamku.kategori }}</td>
                    <td>{{ join.teamku.kontak }}</td>
                    <td>{{ join.joinku.status }}</td>
                    {% if join.joinku.status === "Tunggu" %}
                    <td>
                        <a class="btn btn-danger" href="/join/cancel/{{ join.teamku.team_id }}">Batalkan bergabung</a>
                    </td>
                    {% endif %}
                </tr>
                {% endfor %}
            </tbody>
        </table>
        </div>
    {% else %}
        <p>Anda belum bergabung dengan tim</p>
    {% endif %}
{% endblock %}