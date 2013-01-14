<?php
namespace PlasmaConduit\either;
use PlasmaConduit\option\Some;
use PlasmaConduit\option\None;
use PlasmaConduit\either\Left;

class Right implements Either {

    private $_value = null;

    /**
     * Value constructor that wraps the value
     *
     * @param {Any} $value - The value to wrap
     */
    public function __construct($value) {
        $this->_value = $value;
    }

    /**
     * Returns false
     *
     * @return {Boolean}
     */
    public function isLeft() {
        return false;
    }

    /**
     * Returns true
     *
     * @return {Boolean}
     */
    public function isRight() {
        return true;
    }

    /**
     * Calls the `$rightCase` with the wrapped value and returns the result
     *
     * @param {callable} $leftCase  - Callable for left case
     * @param {callable} $rightCase - Callable for right case
     * @return {Any}                - Whatever the ran case returns
     */
    public function fold($leftCase, $rightCase) {
        return $rightCase($this->_value);
    }

    /**
     * Returns the left projection of `Left`. So `None` is returned.
     *
     * @return {Option} - The left projection as `None`
     */
    public function left() {
        return new None();
    }

    /**
     * Returns the right projection of `Left`. So `Some($value)` is returned.
     *
     * @return {Option} - The right projection as `Some`
     */
    public function right() {
        return new Some($this->_value);
    }

    /**
     * Returns this `Right` as a `Left`
     *
     * @return {Either} - The left transformed to a `Left`
     */
    public function swap() {
        return new Left($this->_value);
    }
}