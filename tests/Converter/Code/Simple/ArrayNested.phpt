--TEST--
Test continue stmt
--DESCRIPTION--
Lowlevel basic test
--FILE--
<?php

require __DIR__ . '/../../../Bootstrap.php';

use PhpToZephir\EngineFactory;
use PhpToZephir\Logger;
use Symfony\Component\Console\Output\NullOutput;

$engine = EngineFactory::getInstance(new Logger(new NullOutput(), false));
$code   = <<<'EOT'
<?php

namespace Code\Simple;

class ArrayNested
{
    public function test()
    {
    	$return = array(array("a"=>"apple"), array("b" => "ball"));
    }
}
EOT;
echo $engine->convertString($code, true);

?>
--EXPECT--
namespace Code\Simple;

class ArrayNested
{
    public function test() -> void
    {
        var returnn;
    
        
        let returnn =  [["a" : "apple"], ["b" : "ball"]];
    }

}