<?php

declare(strict_types=1);

namespace Ghostwriter\Phtml;

use Ghostwriter\Phtml\Interface\Path\CachePathInterface;
use Ghostwriter\Phtml\Interface\Path\TemplatePathInterface;
use Ghostwriter\Phtml\Interface\PhtmlInterface;
use Ghostwriter\Phtml\Path\CachePath;
use Ghostwriter\Phtml\Path\TemplatePath;
use Override;

use const ENT_QUOTES;
use const ENT_SUBSTITUTE;

use function extract;
use function htmlspecialchars;
use function ob_end_clean;
use function ob_get_clean;
use function ob_get_level;
use function ob_start;

/** @see FooTest */
final readonly class Phtml implements PhtmlInterface
{
    public function __construct(
        private TemplatePathInterface $templatePath,
        private CachePathInterface $cachePath,
    ) {
    }

    public function cachePath(): CachePathInterface
    {
        return $this->cachePath;
    }

    public function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    #[Override]
    public function render(string $template, array $context = []): string
    {
        return (static function (string $template, array $context): string {
            $obLevel = ob_get_level();

            try {
                ob_start();

                extract($context);

                include $template;

                return ob_get_clean();
            } finally {
                while (ob_get_level() > $obLevel) {
                    ob_end_clean();
                }
            }
        })($template, $context);
    }

    public function templatePath(): TemplatePathInterface
    {
        return $this->templatePath;
    }

    public static function new(string $template, string $cache): self
    {
        return new self(TemplatePath::new($template), CachePath::new($cache));
    }
}
