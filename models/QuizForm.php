<?php namespace Ukatz\Quiz\Models;

use Model;

class QuizForm extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'ukatz_quiz_requests';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'email' => 'email',
        'source' => [
            'url',
            'nullable',
        ]
    ];

}
