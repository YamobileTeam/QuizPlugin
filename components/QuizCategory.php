<?php namespace Ukatz\Quiz\Components;

use Cms\Classes\ComponentBase;
use Ukatz\Quiz\Models\Category;

/**
 * QuizCategory Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class QuizCategory extends ComponentBase
{
    public $QuizCategory;
    
    
    public function componentDetails()
    {
        return [
            'name' => 'Quiz Category Component',
            'description' => 'No description provided'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
    
     public function onRun()
    {
        $this->QuizCategory = $this->loadCategory();
    }

     private function loadCategory()
    {
       

        return Category::all();
    }
}
