<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\Http\Cookie\Cookie;

class LanguageController extends AppController
{
    public function switch(string $lang): Response
    {
        $validLanguages = ['en_US', 'es_ES'];
        
        if (in_array($lang, $validLanguages)) {
            $session = $this->request->getSession();
            
            // Clear any existing language preference
            $session->delete('Config.language');
            
            // Set new language preference
            $session->write('Config.language', $lang);
            
            // Set cookie for language persistence (30 days)
            $cookie = new Cookie('language', $lang, new \DateTime('+30 days'), '/', '', false, false);
            $this->response = $this->response->withCookie($cookie);
            
            // Set locale immediately for current request
            \Cake\I18n\I18n::setLocale($lang);
        }
        
        return $this->redirect($this->request->referer() ?: '/');
    }
}
