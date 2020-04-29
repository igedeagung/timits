{% extends 'templates/base.volt' %}

{% block title %}Login{% endblock %}

{% block head %}<style type='text/css'>.important { color: #336699; }</style>{% endblock %}

{% block content %}
    <h2>Masuk</h2>
    <hr>
    <div class="w-50 mx-auto">
    {{ form('user/loginSubmit', 'method': 'post') }}

    <div class="form-group">
        <label for="username">Username</label>
        {{ text_field('username', "class":"form-control", "placeholder":"Masukkan Username") }}
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        {{ password_field('password', "class":"form-control", "placeholder":"Masukkan Password") }}
    </div>

    <div class="form-group">
        {{ submit_button('Masuk', 'class':'btn btn-primary') }}
    </div>

    {{ end_form() }}
    <p>Belum punya akun ?
        {{ link_to('user/register', 'Daftar Sekarang') }}
    </p>
    </div>
    
{% endblock %}