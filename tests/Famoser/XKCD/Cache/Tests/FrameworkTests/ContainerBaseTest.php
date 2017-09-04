<?php
/**
 * Created by PhpStorm.
 * User: famoser
 * Date: 12.12.2016
 * Time: 13:33
 */

namespace Famoser\XKCD\Cache\Tests\FrameworkTests;


use Famoser\XKCD\Cache\Framework\ContainerBase;
use Famoser\XKCD\Cache\Services\Interfaces\DatabaseServiceInterface;
use Famoser\XKCD\Cache\Services\Interfaces\LoggingServiceInterface;
use Famoser\XKCD\Cache\Tests\TestHelpers\ApiTestHelper;
use Slim\Interfaces\RouterInterface;
use Slim\Views\Twig;

/**
 * test the container base
 * @package Famoser\XKCD\Cache\Tests\FrameworkTests
 */
class ContainerBaseTest extends \PHPUnit_Framework_TestCase
{
    public function testPropertiesCorrect()
    {
        $testHelper = new ApiTestHelper();
        $app = $testHelper->getTestApp();
        $container = new ContainerBase($app->getContainer());

        static::assertInstanceOf(RouterInterface::class, $container->getRouter());
        static::assertInstanceOf(DatabaseServiceInterface::class, $container->getDatabaseService());
        static::assertInstanceOf(LoggingServiceInterface::class, $container->getLoggingService());
        static::assertTrue(count($container->getSettingsArray()) > 0);
        static::assertInstanceOf(Twig::class, $container->getView());

        //6 methods tested + __construct
        $expectedMethodCount = 9;
        $actualMethodCount = count(get_class_methods(ContainerBase::class));
        static::assertTrue(
            $actualMethodCount == $expectedMethodCount,
            "expected " . $expectedMethodCount . " methods, got " . $actualMethodCount
        );
    }
}