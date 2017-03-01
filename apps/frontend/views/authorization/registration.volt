{{ form() }}

{{ form.label('email') }}
{{ form.render('email') }}
{{ form.messages('email') }}

{{ form.render('submit') }}

{{ end_form() }}