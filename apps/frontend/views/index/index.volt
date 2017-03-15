<ul>
    <li>
        <a href="{{ url.get(['for': 'login']) }}">
            Login
        </a>
    </li>
    <li>
        <a href="{{ url.get(['for': 'registration']) }}">
            Registration
        </a>
    </li>
    <li>
        <a href="{{ url.get(['for': 'forgot-password']) }}">
            Forgot
        </a>
    </li>
    {% if user %}
        <li>
            <a href="{{ url.get(['for': 'logout']) }}">
                Logout
            </a>
        </li>
    {% endif %}
</ul>