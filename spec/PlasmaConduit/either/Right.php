<?php
namespace spec\PlasmaConduit\either;
use PHPSpec2\ObjectBehavior;

class Right extends ObjectBehavior {

    const VALUE = "value";
    const LEFT  = "left";
    const RIGHT = "right";

    function let() {
        $this->beConstructedWith(self::VALUE);
    }

    function it_should_be_initializable() {
        $this->shouldHaveType('PlasmaConduit\either\Right');
    }

    function it_should_return_false_for_left() {
        $this->isLeft()->shouldReturn(false);
    }

    function it_should_return_true_for_right() {
        $this->isRight()->shouldReturn(true);
    }

    function it_should_run_the_right_case_for_fold() {
        $this->fold(
            function($value) {
                return Left::LEFT;
            },
            function($value) {
                return Left::RIGHT;
            }
        )->shouldReturn(self::RIGHT);
    }

    function it_should_return_None_for_left() {
        $this->left()->shouldHaveType('PlasmaConduit\option\None');
    }

    function it_should_return_Some_for_right() {
        $this->right()->shouldHaveType('PlasmaConduit\option\Some');
    }

    function it_should_return_Left_for_swap() {
        $this->swap()->shouldHaveType('PlasmaConduit\either\Left');
    }

}