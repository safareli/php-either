<?php
namespace spec\PlasmaConduit\either;
use PHPSpec2\ObjectBehavior;
use PlasmaConduit\Map;
use PlasmaConduit\either\Left;
use PlasmaConduit\either\Right;

class EitherUtil extends ObjectBehavior {

    function it_should_filter_lefts_on_array_for_lefts() {
        $eithers = [new Left(""), new Right(""), new Left("")];
        self::lefts($eithers)->length()->shouldReturn(2);
    }

    function it_should_filter_lefts_on_map_for_lefts() {
        $eithers = new Map([new Left(""), new Right(""), new Left("")]);
        self::lefts($eithers)->length()->shouldReturn(2);
    }

    function it_should_throw_when_lefts_is_called_with_number() {
        $this->shouldThrow()->duringLefts(123);
    }

    function it_should_filter_rights_on_array_for_rights() {
        $eithers = [new Left(""), new Right(""), new Left("")];
        self::rights($eithers)->length()->shouldReturn(1);
    }

    function it_should_filter_rights_on_map_for_rights() {
        $eithers = new Map([new Left(""), new Right(""), new Left("")]);
        self::rights($eithers)->length()->shouldReturn(1);
    }

    function it_should_throw_when_rights_is_called_with_number() {
        $this->shouldThrow()->duringRights(123);
    }

    function it_should_partition_for_on_array_partition() {
        $eithers     = [new Left(""), new Right(""), new Left("")];
        $partitioned = self::partition($eithers);
        $partitioned->get(0)->get()->length()->shouldReturn(2);
    }

    function it_should_partition_for_on_map_partition() {
        $eithers = new Map([new Left(""), new Right(""), new Left("")]);
        $partitioned = self::partition($eithers);
        $partitioned->get(1)->get()->length()->shouldReturn(1);
    }

    function it_should_throw_when_number_is_called_with_number() {
        $this->shouldThrow()->duringPartition(123);
    }

}
