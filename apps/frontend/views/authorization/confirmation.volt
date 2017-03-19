{{ form() }}
<div class="form-group">
    {{ form.label('confirm_code') }}
    {{ form.render('confirm_code') }}
    {{ form.messages('confirm_code') }}
    {{ flashSession.output() }}
</div>
{{ form.render('submit') }}
{{ end_form() }}