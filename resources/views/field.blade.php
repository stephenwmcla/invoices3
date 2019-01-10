<div class="dataWrapper">
    <div class="fieldLabel"><?php echo Form::label($fieldName, $fieldDesc); ?></div>
    <div class="fieldData"><?php echo Form::text($fieldName); ?></div>
    @if ($errors->has($fieldName)) <span class='red'>  {{
            $errors->first($fieldName) }} </span>
    @endif
</div>

