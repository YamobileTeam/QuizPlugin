<?php namespace Ukatz\Quiz\Components;

use Cms\Classes\ComponentBase;
use Ukatz\Quiz\Models\QuizForm;
use hisorange\BrowserDetect\Parser as Browser;
use Mail;
/**
 * QuizForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class QuizSubmitForm extends ComponentBase
{
    const INFO_FIELDS_KEY = 'info:';
    
    public function componentDetails()
    {
        return [
            'name' => 'Quiz Submit Form',
            'description' => 'No'
        ];
    }


 public function onSubmit()
    {  $recaptchaToken = post("grecaptcha");
            
        
            // Ваш секретный ключ reCAPTCHA
            $recaptchaSecret = '6Le0uSsqAAAAAPb7sJ1wdOT8z6AVDiepRJ1ZdclS';
        
            // Формируем URL для проверки reCAPTCHA
            $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptchaSecret . '&response=' . $recaptchaToken;
        
            // Выполняем запрос и получаем ответ
            $recaptchaResponse = file_get_contents($recaptchaURL);
            
        
            if ($recaptchaResponse === FALSE) {
            // Обрабатываем ошибку запроса
                throw new \Exception('Не удалось проверить reCAPTCHA.');
            }
        
            // Декодируем ответ
            $recaptchaResponseKeys = json_decode($recaptchaResponse, true);
        
            if (!$recaptchaResponseKeys['success'] && $recaptchaResponseKeys['score'] < 0.5) {
                // Проверка не пройдена
                throw new \ValidationException(['grecaptcha'=> 'Проверка reCAPTCHA не пройдена.']);
            }
            
            
            $lead = new QuizForm;

        if (array_key_exists('phone', $_POST)) {
        $lead->phone = $_POST['phone'];
        }
        if (array_key_exists('info:Категория', $_POST)) {
        $lead->category = $_POST['info:Категория'];
        }
        if (array_key_exists("info:Ответ_1", $_POST)) {
        $lead->answer1 = $_POST["info:Ответ_1"];
        }
        if (array_key_exists("info:Ответ_2", $_POST)) {
        $lead->answer2 = $_POST["info:Ответ_2"];
        }
        
        if(isset($_SERVER['HTTP_USER_AGENT'])){

        $lead->user_agent = Browser::userAgent();

        if(Browser::deviceType() !== null){
        $lead->device_type = Browser::deviceType();
        }

        if(Browser::browserName() !== null){
        $lead->browser_name = Browser::browserName();
        }

        if(Browser::deviceType() !== null){
        $lead->platform_name = Browser::platformName();
        }
        }
        
         $userIp = self::getUserIp();
        if ($userIp) {
        $lead->ip = $userIp;
        }

        $infoFields = self::getInfoFileds();
        if ($infoFields) {
        $lead->info = $infoFields;
        }
        
         if(!empty($_GET['utm_source'])) {
        $lead->utm_source = htmlspecialchars($_GET['utm_source'], ENT_QUOTES, 'UTF-8');
        }

        if(!empty($_GET['utm_medium'])) {
        $lead->utm_medium = htmlspecialchars($_GET['utm_medium'], ENT_QUOTES, 'UTF-8');
        }

        if(!empty($_GET['utm_campaign'])) {
        $lead->utm_campaign = htmlspecialchars($_GET['utm_campaign'], ENT_QUOTES, 'UTF-8');
        }

        if(!empty($_GET['utm_term'])) {
        $lead->utm_term = htmlspecialchars($_GET['utm_term'], ENT_QUOTES, 'UTF-8');
        }

        if(!empty($_GET['utm_content'])) {
        $lead->utm_content = htmlspecialchars($_GET['utm_content'], ENT_QUOTES, 'UTF-8');
        }

        $lead->source = self::getURL();
        if ($lead->save()) {
        self::sendNotifications($lead);
        }


    }
    
    
    static private function getURL()
    {
        $url = "";

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url .= "https://";
        } else {
            $url .= "http://";
        }
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];

        return $url;
    }

     static private function getUserIp()
    {

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    static private function getInfoFileds()
    {
        $infoFields = array();

        $postArrayKeys = array_keys($_POST);
        $infoArrayKeys = array_filter($postArrayKeys, function ($key) {
            $substring = substr($key, 0, 5);
            if ($substring === self::INFO_FIELDS_KEY) {
                return $key;
            }
        });
        foreach ($infoArrayKeys as $key) {
            $infoFields = array_merge($infoFields, array($key => $_POST[$key]));
        }

        if ($infoFields) {
            return json_encode($infoFields);
        }
        return null;
    }
    
     private static function sendNotifications($lead)
    {
          $settingsEmails = \Ukatz\Quiz\Models\QuizSettings::get('repeater_emails');
        $notificationLead = [
            'name' => $lead->name,
            'phone' => $lead->phone,
            'answer1' => $lead->answer1,
            'answer2' => $lead->answer2,
            'category' => $lead->catgory,
            'info' => json_decode($lead->info,true),
            'source' => $lead->source,
            'ip' => $lead->ip,
            'device_type' => $lead->device_type,
            'browser_name' => $lead->browser_name,
            'platform_name' => $lead->platform_name,
            'utm_source' => $lead->utm_source,
            'utm_medium' => $lead->utm_medium,
            'utm_campaign' => $lead->utm_campaign,
            'utm_term' => $lead->utm_term,
            'utm_content' => $lead->utm_content,
        ];
        
      Mail::sendTo($settingsEmails, 'yamobile.leadtracker::mail.lead', $notificationLead); 
    }
}
