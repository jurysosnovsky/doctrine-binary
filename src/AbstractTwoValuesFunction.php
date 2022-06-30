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

use Doctrine\ORM\Query\AST\ArithmeticTerm;
use Doctrine\ORM\Query\AST\SimpleArithmeticExpression;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * Abstract class for DQL function with two parameters.
 *
 * @author Jury Sosnovsky <github@sosnoffsky.com>
 */
abstract class AbstractTwoValuesFunction extends AbstractTemplateFunction
{
    /**
     * First function parameter.
     *
     * @var SimpleArithmeticExpression|ArithmeticTerm|null
     */
    private $firstValueExpression = null;

    /**
     * Second function parameter.
     *
     * @var SimpleArithmeticExpression|ArithmeticTerm|null
     */
    private $secondValueExpression = null;

    /**
     * {@inheritDoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return sprintf(
            $this->getTemplate(),
            $this->firstValueExpression->dispatch($sqlWalker),
            $this->secondValueExpression->dispatch($sqlWalker),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->firstValueExpression = $parser->SimpleArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->secondValueExpression = $parser->SimpleArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
