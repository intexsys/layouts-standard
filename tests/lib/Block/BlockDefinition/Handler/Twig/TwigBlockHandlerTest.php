<?php

declare(strict_types=1);

namespace Netgen\Layouts\Standard\Tests\Block\BlockDefinition\Handler\Twig;

use Netgen\BlockManager\API\Values\Block\Block;
use Netgen\BlockManager\Parameters\Parameter;
use Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler;
use PHPUnit\Framework\TestCase;

final class TwigBlockHandlerTest extends TestCase
{
    /**
     * @var \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler
     */
    private $handler;

    public function setUp(): void
    {
        $this->handler = new TwigBlockHandler();
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler::isContextual
     */
    public function testIsContextual(): void
    {
        self::assertTrue($this->handler->isContextual(new Block()));
    }

    /**
     * @covers \Netgen\Layouts\Standard\Block\BlockDefinition\Handler\Twig\TwigBlockHandler::getTwigBlockName
     */
    public function testGetTwigBlockName(): void
    {
        $block = Block::fromArray(
            [
                'availableLocales' => ['en'],
                'locale' => 'en',
                'parameters' => [
                    'block_name' => Parameter::fromArray(
                        [
                            'value' => 'twig_block',
                        ]
                    ),
                ],
            ]
        );

        self::assertSame('twig_block', $this->handler->getTwigBlockName($block));
    }
}
