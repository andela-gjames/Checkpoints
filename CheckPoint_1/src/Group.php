<?php
  class Group
  {
    public static function build($string=null)
    {
      //Ensure Correct values is passed into function
      if(is_null($string))
        throw new InvalidArgumentException("You cannot pass null as the argument");
      elseif(is_int($string))
        throw new InvalidArgumentException("This function only accepts strings");

      // Removes all AlphaNumeric Characters from passed arguments
      $string = preg_replace("/[^A-Za-z0-9\s]/", '', $string);
      //Converts String into array using space as delimiter
      $string_array = array_filter(explode(" ",$string));

      //Counts occurace of each associative array value and saves into new array containing count in $counts
      $counts = array_count_values($string_array);

      //Sorts  the  array in Descending order and returns the count done.
      if(arsort($counts)){
        return $counts;
      }
      else {
        return array();
      }
    }
  }
