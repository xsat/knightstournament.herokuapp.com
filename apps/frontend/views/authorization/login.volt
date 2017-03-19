{{ form() }}
    <div class="form-group">
        {{ form.label('email') }}
        {{ form.render('email') }}
        {{ form.messages('email') }}
        {{ flashSession.output() }}
    </div>
    <div class="form-group">
        {{ form.label('password') }}
        {{ form.render('password') }}
        {{ form.messages('password') }}
    </div>
    {{ form.render('submit') }}
{{ end_form() }}