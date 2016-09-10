<?php
/*
 * Short description
 *
 * Long description
 *
 * @package     Lexical analysis
 * @author      Frank Wikström <frank@mossadal.se>
 * @author      Yunqi Ouyang <ouyang@yunqi.li>
 * @copyright   2015 Frank Wikström
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 *
 */

namespace MathParser\Lexing;

/** Lexer capable of recognizing tchisla expressions.
 *
 * Subclass of the generic Lexer, with TokenDefinition patterns for
 * numbers, elementary functions, arithmetic operations and variables.
 *
 * ### Recognized tokens
 *
 * * `/\d|[1-9]\d+/` matching integers matching
 * * `/sqrt/`  matching square root function
 * * `/√/`  matching square root operation
 * * `/!/`  matching factorial operation
 * * `/\(/` matching opening parenthesis (both as delimiter and function evaluation)
 * * `/\)/` matching closing parenthesisis (both as delimiter and function evaluation)
 * * `/\+/` matching + for addition (or unary +)
 * * `/\-/` matching - for subtraction (or unary -)
 * * `/\* /` matching * for multiplication
 * * `/\//` matching / for division
 * * `/\^/` matching ^ for exponentiation
 * * `/\n/` matching newline
 * * `/\s+/` matching whitespace
 */
 class TchislaLexer extends Lexer
{
    public function __construct()
    {
        $this->add(new TokenDefinition('/\d|[1-9]\d+/', TokenType::PosInt));

        $this->add(new TokenDefinition('/sqrt/', TokenType::FunctionName));
        $this->add(new TokenDefinition('/√/', TokenType::SquareRootOperator));

        $this->add(new TokenDefinition('/!/', TokenType::FactorialOperator));

        $this->add(new TokenDefinition('/\(/', TokenType::OpenParenthesis));
        $this->add(new TokenDefinition('/\)/', TokenType::CloseParenthesis));

        $this->add(new TokenDefinition('/\+/', TokenType::AdditionOperator));
        $this->add(new TokenDefinition('/\-/', TokenType::SubtractionOperator));
        $this->add(new TokenDefinition('/\*/', TokenType::MultiplicationOperator));
        $this->add(new TokenDefinition('/\//', TokenType::DivisionOperator));
        $this->add(new TokenDefinition('/\^/', TokenType::ExponentiationOperator));

        $this->add(new TokenDefinition('/\n/', TokenType::Terminator));
        $this->add(new TokenDefinition('/\s+/', TokenType::Whitespace));

    }
}
