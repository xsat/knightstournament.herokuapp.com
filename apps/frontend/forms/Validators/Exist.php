<?php

namespace Frontend\Forms\Validators;

use Phalcon\Validation;
use Phalcon\Validation\Validator;

class Exist extends Validator
{
    /**
     * @param Validation $validation
     * @param string $attribute
     * @return bool
     */
    public function validate(Validation $validation, $attribute)
    {
        $value = $validation->getValue($attribute);

        $convert = $this->getOption('convert');
        if ($convert && is_callable($convert)) {
            $value = $convert($value);
        }

        $entity = $validation->getEntity();
        if (!$entity) {
            return false;
        }

        $params = [
            'conditions' => ':field: = :value:',
            'bind' => [
                'field' => $attribute,
                'value' => $value,
            ],
        ];
		return $entity->count($params) != 0;
    }
}
