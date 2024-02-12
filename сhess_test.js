//  $arr - the array in which the search is performed
//  $target - the desired number
//   $findMin - a Boolean value, if true, will choose the smallest value for equidistant variants
function binarySearchClosestEl(arr, target, findMin = true) {
    let left = 0;
    let right = arr.length - 1;
    let closestIndex = -1;

    let minDiff = Number.MAX_SAFE_INTEGER;

    while (left <= right) {
        let mid = Math.floor((left + right) / 2);
        let diff = Math.abs(arr[mid] - target);

        if (diff < minDiff || (diff === minDiff && findMin)) {
            minDiff = diff;
            closestIndex = mid;
        }

        if (arr[mid] === target) {
            return mid;
        } else if (arr[mid] < target) {
            left = mid + 1;
        } else {
            right = mid - 1;
        }
    }

    return closestIndex;
}


const arr = [1, 2, 3, 5, 7, 9];
const target = 6;
const closestIndex = binarySearchClosestEl(arr, target, false);
console.log("Closest element index:", closestIndex, "Value:", arr[closestIndex]);