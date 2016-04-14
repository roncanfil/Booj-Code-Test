<?php

/*

My first thought was "divide and conquer" to divide the array in the middle into two subarrays 
(left and right) and compare the total sum of their elements, but since I need to assume that 
"the sequence may be very long" the order of that code will be O(n^2).

Just like with some sort algorithms, I can start from one of the edges of the array to try to 
find the equilibrium indexes with an order O(n). 

To do that, I'll start assuming the total sum of the left array ($left) is 0 and I'll compare it 
to the total sum of the elements of the right array ($right). If they match, it means that the element
is an index. I keep doing this considering the new "$left" as the the sum of its previous value plus 
the new element and the new "$right" as the subtraction of the new element to its current value. 
Since I'm going to be working with arrays, I'll store the indexes in an array to display the results.

*/
 
function getEquilibriumIndexes($arr) {
    $right = array_sum($arr);                 // sum of the array
    $left = 0;                                // assuming 0
    $indexes = array();                       // array to store the equilibrium indexes
    foreach($arr as $key => $value){          //iterating the array
        $right -= $value;                     //the new value of $right
        if($left == $right){                  //comparing values
          $indexes[] = $key;                  //if they match, I store it
        }
        $left += $value;                      //the new value of $left
    }
    return $indexes;                          //return the array with the equilibrium indexes
}
 
echo "<h1>Equilibrium Indexes Test</h1>";

$arr = array(-7, 1, 5, 2, -4, 3, 0);          //Example
echo "<h3>Array = {-7, 1, 5, 2, -4, 3, 0}</h3>";
echo "<h3>Equilibrium Indexes:</h3>";
foreach (getEquilibriumIndexes($arr) as $r) echo "<h4>$r</h4>";

?>