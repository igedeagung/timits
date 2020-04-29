{# layouts/base.volt #}
<title>{% block title %}{% endblock %} - TIMITS</title>

<div class='content'>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        {{ flashSession.output() }}
    </div>
    {% block content %}{% endblock %}
</div>
