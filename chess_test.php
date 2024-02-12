<?php
/**
 * @param $arr - the array in which the search is performed
 * @param $target - the desired number
 * @param $findMin - a Boolean value, if true, will choose the smallest value for equidistant variants
 *
 * @return int
 */
function binarySearchClosestEl($arr, $target, $findMin = true) {
    $left = 0;
    $right = count($arr) - 1;
    $closestIndex = -1;
    $minDiff = PHP_INT_MAX;

    while ($left <= $right) {
        $mid = (int) floor(($left + $right) / 2);
        $diff = abs($arr[$mid] - $target);

        if ($diff < $minDiff || ($diff == $minDiff && $findMin)) {
            $minDiff = $diff;
            $closestIndex = $mid;
        }

        if ($arr[$mid] === $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return $closestIndex;
}


$arr = [1, 2, 3, 5, 8, 9];
$target = 6;
$closestIndex = binarySearchClosestEl($arr, $target, false);
echo "Closest element index: $closestIndex Value: {$arr[$closestIndex]}\n";