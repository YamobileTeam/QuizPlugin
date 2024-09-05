<?php namespace Ukatz\Quiz\Models;

use Model;


/**
 * Model
 */
class Question extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $dates = ['deleted_at'];
    
    protected $jsonable = ['relation', 'repeater'];
    /**
     * @var string table in the database used by the model.
     */
    public $table = 'ukatz_quiz_questions';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'question' => 'required',
    ];
    
    public $belongsTo = [
        'relation' => \Ukatz\Quiz\Models\Category::class,
    'table' => 'ukatz_quiz_questions_to_category',
    ];
}
