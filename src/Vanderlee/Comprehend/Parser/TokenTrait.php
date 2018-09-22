<?php

namespace vanderlee\comprehend\parser;

use vanderlee\comprehend\core\Token;

/**
 *
 * @author Martijn
 */
trait TokenTrait
{

    /**
     * Name of the token
     * @var null
     */
    private $tokenName = null;

    /**
     * Group to which this token belongs (mostly for standard Library tokens
     *
     * @var null
     */
    private $tokenGroup = null;

    /**
     * @var null
     */
    private $tokenIsTerminal = false;

    /**
     * @param string $token
     * @return $this
     */
    public function token($token, $group = null, $isTerminal = false)
    {
        $this->tokenName       = $token;
        $this->tokenGroup      = $group;
        $this->tokenIsTerminal = $isTerminal;

        return $this;
    }

    private function resolveToken(&$input, $offset, $length, &$children, $class)
    {
        if ($this->tokenIsTerminal) {
            $children = [];
        }
        return new Token($this->tokenGroup, $this->tokenName, $input, $offset, $length, $children, $class);
    }

}