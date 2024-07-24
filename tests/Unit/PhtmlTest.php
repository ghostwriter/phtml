<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Phtml\Interface\PhtmlExceptionInterface;
use Ghostwriter\Phtml\Interface\PhtmlInterface;
use Ghostwriter\Phtml\Path\CachePath;
use Ghostwriter\Phtml\Path\TemplatePath;
use Ghostwriter\Phtml\Phtml;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;
use function sys_get_temp_dir;

#[CoversClass(Phtml::class)]
#[UsesClass(TemplatePath::class)]
#[UsesClass(CachePath::class)]
final class PhtmlTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testCachePathToString(): void
    {
        $phtmlDirectory = sys_get_temp_dir();

        self::assertSame($phtmlDirectory, Phtml::new($phtmlDirectory, $phtmlDirectory)->cachePath()->toString());
    }

    /**
     * @throws Throwable
     */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Phtml::class, PhtmlInterface::class, true));
        self::assertTrue(is_a(PhtmlExceptionInterface::class, Throwable::class, true));
    }

    /**
     * @throws Throwable
     */
    public function testTemplatePathToString(): void
    {
        $phtmlDirectory = sys_get_temp_dir();

        self::assertSame($phtmlDirectory, Phtml::new($phtmlDirectory, $phtmlDirectory)->templatePath()->toString());
    }
}
