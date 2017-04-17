<?php
/**
 * Class for Grouping Strings.
 **/
  class Group
  {
      /**
     * @param $string the string to count occurance of values
     *
     * @throws InvalidArgumentException if the argument passed is not a string or if it is null
     *
     * @return array of the ranked words from string
     */
    public static function build($string = null)
    {
        //Ensure Correct values is passed into function
      if (is_null($string)) {
          throw new InvalidArgumentException('You cannot pass null as the argument');
      } elseif (is_int($string)) {
          throw new InvalidArgumentException('This function only accepts strings');
      }

      // Removes non alphanum characters and convert string to array using space as delimter
      $string = preg_replace("/[^A-Za-z0-9\s]/", '', $string);
        $string_array = array_filter(explode(' ', $string));

      //Counts occurace of each value, sorts and returns the count as result
      $counts = array_count_values($string_array);
        if (arsort($counts)) {
            return $counts;
        } else {
            return [];
        }
    }
  }
