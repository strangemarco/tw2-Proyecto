<?php
declare(strict_types=1);

namespace App\Middleware;

use Cake\Http\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LanguageMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $session = $request->getSession();
        $cookie = $request->getCookie('language');
        
        // Priority: session > cookie > browser > default
        $language = $session->read('Config.language');
        
        if (!$language && $cookie) {
            $language = $cookie;
            // Store in session for consistency
            $session->write('Config.language', $language);
        }
        
        if (!$language) {
            // Detect from browser only if no preference saved
            $acceptLanguage = $request->getHeaderLine('Accept-Language');
            if (strpos($acceptLanguage, 'es') === 0) {
                $language = 'es_ES';
            } else {
                $language = 'en_US';
            }
        }
        
        // Set locale for CakePHP I18n
        \Cake\I18n\I18n::setLocale($language);
        
        return $handler->handle($request);
    }
}
