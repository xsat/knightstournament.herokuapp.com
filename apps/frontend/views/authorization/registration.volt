{{ form() }}
    <div class="form-group">
        {{ form.label('name') }}
        {{ form.render('name') }}
        {{ form.messages('name') }}
        {{ flashSession.output() }}
    </div>
    <div class="form-group">
        {{ form.label('email') }}
        {{ form.render('email') }}
        {{ form.messages('email') }}
    </div>
    <div class="form-group">
        {{ form.label('password') }}
        {{ form.render('password') }}
        {{ form.messages('password') }}
    </div>
    <div class="form-group">
        {{ form.label('confirm_password') }}
        {{ form.render('confirm_password') }}
        {{ form.messages('confirm_password') }}
    </div>
    {{ form.render('submit') }}
{{ end_form() }}