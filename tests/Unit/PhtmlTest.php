<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Phtml\Interface\PhtmlExceptionInterface;
use Ghostwriter\Phtml\Interface\PhtmlInterface;
use Ghostwriter\Phtml\Phtml;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Throwable;

use function is_a;

#[CoversClass(Phtml::class)]
final class PhtmlTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function testImplementsInterface(): void
    {
        self::assertTrue(is_a(Phtml::class, PhtmlInterface::class, true));
        self::assertTrue(is_a(PhtmlExceptionInterface::class, Throwable::class, true));
    }
}
