{{ form() }}
    <div class="form-group">
        {{ form.label('email') }}
        {{ form.render('email') }}
        {{ form.messages('email') }}
        {{ flashSession.output() }}
    </div>
    {{ form.render('submit') }}
{{ end_form() }}