<?php

declare(strict_types=1);

namespace Sublime\Tests;

use PHPUnit\Framework\TestCase;
use Sublime\TagFactory;
use function Sublime\Sublime;

final class TagFactoryTest extends TestCase
{
    public function testFactoryInjectionProvidesDynamicTags(): void
    {
        $html = Sublime(function (TagFactory $tags): mixed {
            return $tags->body(
                data: [
                    $tags->div(
                        class: 'wrapper',
                        data: [
                            $tags->p('Hello from the factory'),
                        ],
                    ),
                ],
            );
        });

        self::assertSame('<body><div class="wrapper"><p>Hello from the factory</p></div></body>', $html);
    }

    public function testFactorySupportsMethodsWithoutTrailingUnderscore(): void
    {
        $factory = new TagFactory();

        $element = $factory->main(
            data: [
                $factory->p('Content'),
            ],
        );

        self::assertSame('<main><p>Content</p></main>', $element->render());
    }
}
