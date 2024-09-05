<?php namespace Ukatz\Quiz\Models;

use Model;

/*
 * Model
 */
class QuizSettings extends Model
{
    
     public $implement = [
            \System\Behaviors\SettingsModel::class,
    ];

    public $settingsCode = 'ukatz_quiz_quizssettings';

    public $settingsFields = 'fields.yaml';
    
    
    public $table = 'ukatz_quiz_requests';


}
