--TEST--
Test continue stmt
--DESCRIPTION--
Lowlevel basic test
--FILE--
<?php

require __DIR__ . '/../../../../Bootstrap.php';

use PhpToZephir\EngineFactory;
use PhpToZephir\Logger;
use Symfony\Component\Console\Output\NullOutput;

$engine = EngineFactory::getInstance(new Logger(new NullOutput(), false));
$code   = <<<'EOT'
<?php

namespace Code\StrongType\FunctionStmt;

class MethodTypeWithScalarType
{
    /**
     * @param string  $toto
     * @param boolean $titi
     * @param float   $tata
     * @param array   $tutu
     * @param double  $foo
     */
    public function test($toto, $titi, $tata, $tutu, $foo, $bar)
    {
    }
}
EOT;
echo $engine->convertString($code, true);

?>
--EXPECT--
namespace Code\StrongType\FunctionStmt;

class MethodTypeWithScalarType
{
    /**
     * @param string  $toto
     * @param boolean $titi
     * @param float   $tata
     * @param array   $tutu
     * @param double  $foo
     */
    public function test(string toto, boolean titi, float tata, array tutu, double foo, bar) -> void
    {
    }

}