<?php

declare(strict_types=1);

namespace Ghostwriter\Phtml\Interface;

interface PhtmlInterface
{
    public function render(string $template, array $context = []): string;
}
