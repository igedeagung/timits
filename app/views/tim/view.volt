{% extends 'templates/base.volt' %}

{% block title %}View{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <h1>Detail Tim</h1>
    <div style="overflow-x:auto">
    <div>
        <p>Nama Tim = {{ detailteam.team_nama }}</p>
        <p>Nama Lomba = {{ detailteam.nama_lomba }}</p>
        <p>Kategori = {{ detailteam.kategori }}</p>
        <p>Deskripsi = {{ detailteam.deskripsi }}</p>
        <p>Kontak = {{ detailteam.kontak }}</p>
        <p>Jumlah Anggota yang dibutuhkan = {{ detailteam.jumlahkurang }}</p>
        <a class="btn btn-primary" href="/tim/edit/{{ detailteam.team_id }}">Edit</a>
    </div>
    <h1>Kandidat Anggota</h1>
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