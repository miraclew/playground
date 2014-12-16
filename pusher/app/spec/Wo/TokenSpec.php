<?php

namespace spec\Wo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TokenSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Wo\Token');
    }
}
