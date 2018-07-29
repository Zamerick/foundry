<?php
namespace Tests\Feature;

use Mockery;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\TestCase;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Database\ConnectionResolverInterface;

class SingleCommandTest extends TestCase
{
    public function MakeChannelTest()
    {
        return true;
    }

    public function MakeEventTest()
    {
        return true;
    }

    public function MakeMiddlewareTest()
    {
        return true;
    }

    public function MakePackageTest()
    {
        return true;
    }

    public function MakeCommandTest()
    {
        return true;
    }

    public function MakeProviderTest()
    {
        return true;
    }

    public function MakeQueryTest()
    {
        // call the command
        // assert actual file system looks like what i expect
        // double check file contents?
        return true;
    }

    public function MakeRequestTest()
    {
        return true;
    }

    public function MakeRuleTest()
    {
        return true;
    }

    public function MakeSeederTest()
    {
        return true;
    }

    public function MakeTestTest()
    {
        return true;
    }

    public function MakeTraitTest()
    {
        return true;
    }

    public function MakeTranslationTest()
    {
        return true;
    }
}
