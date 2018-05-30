<?php declare(strict_types=1);

namespace Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\AssignTypeResolver;

use Iterator;
use PhpParser\Node\Expr\Variable;
use Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\AbstractNodeTypeResolverTest;
use Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\AssignTypeResolver\Source\ClassWithParent;
use Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\AssignTypeResolver\Source\ParentClass;

/**
 * @covers \Rector\NodeTypeResolver\PerNodeTypeResolver\AssignTypeResolver
 */
final class AssignTypeResolverTest extends AbstractNodeTypeResolverTest
{
    /**
     * @dataProvider provideTypeForNodesAndFilesData()
     * @param string[] $expectedTypes
     */
    public function test(string $file, int $nodePosition, array $expectedTypes): void
    {
        $variableNodes = $this->getNodesForFileOfType($file, Variable::class);

        $this->assertSame($expectedTypes, $this->nodeTypeResolver->resolve($variableNodes[$nodePosition]));
    }

    public function provideTypeForNodesAndFilesData(): Iterator
    {
        # assign of "new <name>"
//        yield [__DIR__ . '/Source/New.php.inc', 0, ['AnotherClassWithParentInterface', 'ParentInterface']];
//        yield [__DIR__ . '/Source/New.php.inc', 1, ['AnotherClassWithParentInterface', 'ParentInterface']];
//        # method call
//        yield [__DIR__ . '/Source/MethodCall.php.inc', 1, ['AnotherClass']];
//        # assign of "new <name>"
//        yield [__DIR__ . '/Source/MethodCall.php.inc', 0, ['SomeClass2', 'SomeParentClass2']];
//        yield [__DIR__ . '/Source/MethodCall.php.inc', 2, ['SomeClass2', 'SomeParentClass2']];
//        # method call on property fetch
//        yield [__DIR__ . '/Source/PropertyFetch.php.inc', 0, ['SomeClass4', 'SomeParentClass4']];
//        yield [__DIR__ . '/Source/PropertyFetch.php.inc', 2, ['SomeClass4', 'SomeParentClass4']];
        # method call on class constant
        yield [__DIR__ . '/Source/ClassConstant.php', 0, [ClassWithParent::class, ParentClass::class]];
        yield [__DIR__ . '/Source/ClassConstant.php', 2, [ClassWithParent::class, ParentClass::class]];
    }
}
