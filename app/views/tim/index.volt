{% extends 'templates/base.volt' %}

{% block title %}List Tim{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <h1>List Tim</h1>
    <div style="overflow-x:auto">
    {% if teams|length %}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Ketua</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nomor Telepon</th>
                    {% if session.has('AUTH_ID') %}
                        <th scope="col">Aksi</th>
                    {% endif %}
                </tr>
            </thead>
            <tbody>
                {% for team in teams %}
                <tr>
                    <th scope="row">{{ loop.index }}</th>
                    <td>{{ team.teamku.team_nama }}</td>
                    <td>{{ team.teamku.nama_lomba }}</td>
                    <td>{{ team.teamku.kategori }}</td>
                    <td>{{ team.userku.nama }}</td>
                    <td>{{ team.teamku.deskripsi }}</td>
                    <td>{{ team.teamku.kontak }}</td>
                    {% if session.has('AUTH_ID') %}
                    <td>
                        <a class="btn btn-primary" href="/tim/join/{{ team.teamku.team_id }}">Ikut Tim</a>
                    </td>
                    {% endif %}
                </tr>
                {% endfor %}
            </tbody>
        </table>
        </div>
    {% else %}
        <p>Tim Kosong</p>
    {% endif %}
{% endblock %}