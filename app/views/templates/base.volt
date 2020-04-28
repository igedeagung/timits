{# layouts/base.volt #}
<title>{% block title %}{% endblock %} - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        {{ flashSession.output() }}
    </div>
    {% block content %}{% endblock %}
</div>
<footer class='footer' style="position:absolute;">
    <div class="container">
        <span>
            {% block footer %}
                &copy; Copyright 2020-present. 
                All rights reserved.
            {% endblock %}
        </span>
    </div>
</footer>