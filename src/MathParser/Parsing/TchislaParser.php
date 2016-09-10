<?php
namespace MathParser\Parsing;

class TchislaParser extends Parser
{
    protected $simplifyingParser = false;
    
    protected static function allowImplicitMultiplication()
    {
        return false;
    }
}
