<?php namespace Ukatz\Quiz\Components;

use Cms\Classes\ComponentBase;
use Ukatz\Quiz\Models\Question;

/**
 * Quiz Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Quiz extends ComponentBase
{
    public $Quizdetail;
    
    
    public function componentDetails()
    {
        return [
            'name' => 'Quiz Component',
            'description' => 'No description'
        ];
    }
    
    
    public function onRun()
    {
        $this->Quizdetail = $this->loadQuestions();
    }

     private function loadQuestions()
    {
       

        return Question::all();
    }
}
