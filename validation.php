<?php

$validationRules = [
    'name'      => 'required|min:3|max:20',
    'email'     => 'required|email',
    'age'       => 'required|numeric|min:18|max:60',
    'birthdate' => 'optional|date',
    'datetime'  => 'optional|datetime',
    'password'  => 'required|min:6|max:20|password_strength'
];

list($data, $errors) = validate($_POST, $validationRules);
var_dump($data, $errors);

function validate($data, $rules) {
    foreach ($data as $field => $value) {
        if (is_numeric($value)) {
            $data[$field] = (int)$value;
        }
    }

    $errors = [];

    foreach ($rules as $field => $rule) {
        $ruleParts = explode('|', $rule);

        foreach ($ruleParts as $r) {
            $r = explode(':', $r);

            if ($r[0] === 'optional' && (empty($data[$field]) || is_null($data[$field]))) {
                continue;
            }

            if ($r[0] === 'required' && empty($data[$field])) {
                $errors[$field][] = 'This field is required.';
            }

            if ($r[0] === 'numeric' && !is_numeric($data[$field])) {
                $errors[$field][] = 'This field must be a number.';
            }

            if ($r[0] === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                $errors[$field][] = 'This field must be a valid email address.';
            }

            if ($r[0] === 'datetime') {
                $format = 'Y-m-d\TH:i:s';
                $d = DateTime::createFromFormat($format, $data[$field]);
                if ($d === false || $d->format($format) !== $data[$field]) {
                    $errors[$field][] = 'This field must be a valid datetime in the right format.';
                }
            }

            if ($r[0] === 'password_strength' && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $data[$field])) {
                $errors[$field][] = 'This field must be a strong password.';
            }
        }
    }

    return [$data, $errors];
}
