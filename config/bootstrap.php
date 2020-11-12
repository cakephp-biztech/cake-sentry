<?php
namespace Biztech\CakeSentry;

use Cake\Core\Configure;
use Cake\Log\Log;
use Biztech\CakeSentry\Error\ConsoleErrorHandler;
use Biztech\CakeSentry\Error\ErrorHandler;
use Biztech\CakeSentry\Log\Engine\SentryLog;

$isCli = PHP_SAPI === 'cli';
if (!$isCli && strpos((env('argv')[0] ?? ''), '/phpunit') !== false) {
    $isCli = true;
}
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

$errorLogConfig = Log::getConfig('error');
$errorLogConfig['className'] = SentryLog::class;
Log::drop('error');
Log::setConfig('error', $errorLogConfig);
