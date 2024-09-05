<?php namespace Ukatz\Quiz\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ukatz_quiz_category';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    
}
