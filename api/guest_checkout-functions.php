<?php
function checkInput($value){
    return !empty($value);
}
function postcodeCheck($postcode){
    $pattern = "/^\d{4}[A-Za-z]{2}$/i";
    return preg_match($pattern,$postcode);
}

function emailCheck($email){
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    return preg_match($pattern,$email);
}
function errorHandler($inputName) {
    $hashtag = '#';
    echo '<style>
           .' . $inputName . '{
                display: block;
            }
          </style>';
}
function checkAllinputs() {
    if ($_POST) {
        $inputFields = [
            'first_name',
            'last_name',
            'email',
            'street_name',
            'apartment_nr',
            'postal_code',
            'city'
        ];

        foreach ($inputFields as $field) {
            $inputValue = $_POST[$field];
            if (!checkInput($inputValue)) {
                errorHandler($field);
            } elseif ($field === 'email' && !emailCheck($inputValue)) {
                errorHandler("email-error");
            } elseif ($field === 'postal_code' && !postcodeCheck($inputValue)) {
                errorHandler("postcode-error");
            }
        }
    }

}

