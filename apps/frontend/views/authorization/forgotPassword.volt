{{ form() }}
    {{ flashSession.output() }}
    <div class="form-group">
        {{ form.label('email') }}
        {{ form.render('email') }}
        {{ form.messages('email') }}
    </div>
    {{ form.render('submit') }}
{{ end_form() }}