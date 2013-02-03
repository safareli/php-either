<?php
namespace PlasmaConduit\either;
use PlasmaConduit\Map;
use PlasmaConduit\either\Left;
use PlasmaConduit\either\Right;
use Exception;

class EitherUtil {

    public static function lefts($map) {
        $map = self::_ensureMap($map);
        return $map->filter(function($value) {
            return $value instanceof Left;
        });
    }


    public static function rights($map) {
        $map = self::_ensureMap($map);
        return $map->filter(function($value) {
            return $value instanceof Right;
        });
    }

    public static function partition($map) {
        $map = self::_ensureMap($map);
        return $map->partition(function($value) {
            return $value instanceof Left;
        });
    }

    private static function _ensureMap($map) {
        if (is_array($map)) {
            return new Map($map);
        }
        if (!($map instanceof Map)) {
            throw new Exception("EitherUtil methods require map or array");
        }
        return $map;
    }

}