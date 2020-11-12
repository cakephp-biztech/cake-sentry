<?php
namespace Biztech\CakeSentry\Error;

use Cake\Error\ErrorHandler as CakeErrorHandler;

class ErrorHandler extends CakeErrorHandler
{
    use SentryErrorHandlerTrait;
}
