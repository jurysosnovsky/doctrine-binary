<?php

/*
 * This file is part of the DoctrineBinary package.
 *
 * (c) Jury Sosnovsky <github@sosnoffsky.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoctrineBinary;

use Doctrine\ORM\Query\AST\AggregateExpression;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

abstract class AbstractAggregateFunction extends FunctionNode
{
    /** @var AggregateExpression */
    private $aggregateExpression = null;

    public function getSql(SqlWalker $sqlWalker): string
    {
        return $this->aggregateExpression->dispatch($sqlWalker);
    }

    public function parse(Parser $parser): void
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $expression = $parser->SimpleArithmeticExpression();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);

        $this->aggregateExpression = new AggregateExpression($this->getFunctionName(), $expression, false);
    }

    abstract protected function getFunctionName(): string;
}
