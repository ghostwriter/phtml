<?php

declare(strict_types=1);

namespace Ghostwriter\Phtml\Exception;

use Ghostwriter\Phtml\Interface\PhtmlExceptionInterface;
use InvalidArgumentException;

final class TemplateNotFoundException extends InvalidArgumentException implements PhtmlExceptionInterface
{
}
