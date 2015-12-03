<?php
/**
 * Class for Grouping Strings
 **/
  class Group
  {
    /**
     * @param $string the string to count occurance of values
     * @throws InvalidArgumentException if the argument passed is not a string or if it is null
     * @return Array of the ranked words from string
     */
    public static function build($string=null)
    {
      //Ensure Correct values is passed into function
      if(is_null($string))
        throw new InvalidArgumentException("You cannot pass null as the argument");
      elseif(is_int($string))
        throw new InvalidArgumentException("This function only accepts strings");

      // Removes all non AlphaNumeric Characters from passed arguments
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
