<?php namespace Ukatz\Quiz;

use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [ \Ukatz\Quiz\Components\Quiz::class => "Quiz",
                 \Ukatz\Quiz\Components\QuizCategory::class => "QuizCategory",
                 \Ukatz\Quiz\Components\QuizSubmitForm::class => "QuizForm",
        
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
        return [
            'quiz' => [
                'label' => 'Quiz',
                'description' => 'Плагин для квиза',
                'category' => 'Контент',
                'icon' => 'icon-question',
                'class' => \Ukatz\Quiz\Models\QuizSettings::class,
                'order' => 500,
                'keywords' => 'keyword'
            ]
        ];
    }
    
    public function registerMailTemplates()
    {
        return [
            'yamobile.leadtracker::mail.lead',
        ];
    }
}
