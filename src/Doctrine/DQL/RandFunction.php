<?php

namespace App\Doctrine\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Parser;

class RandFunction extends FunctionNode
{
    public function parse(Parser $parser)
    {
        // RAND() nie przyjmuje parametrów, więc nic nie trzeba parsować
    }

    public function getSql(SqlWalker $sqlWalker)
    {
        return 'RAND()';
    }
}