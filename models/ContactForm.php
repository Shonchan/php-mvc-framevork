<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2020
 * Time: 16:13
 */

namespace App\models;


use shonchan\phpmvc\Model;

class ContactForm extends Model
{
    public $subject = '';
    public $email = '';
    public $body = '';

    public function rules(): array
    {
        return [
          'subject' => [self::RULE_REQUIRED],
          'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
          'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Your email',
            'body' => 'Body',
        ];
    }

    public function send()
    {
        return true;
    }


}