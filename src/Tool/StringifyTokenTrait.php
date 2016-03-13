<?php

namespace League\Token\Tool;

trait StringifyTokenTrait
{
    // League\Token\TokenInterface
    abstract public function getToken();

    // League\Token\TokenInterface
    final public function __toString()
    {
        return (string) $this->getToken();
    }
}
