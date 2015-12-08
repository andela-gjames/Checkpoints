<?php namespace CZ4\Dictionary;
/**
* Class for Grouping Strings.
**/
class Group
{
    /**
     * Ranks words in a string based on occurance frequency
     * @param  string [$string         = null] string to build
     * @return array  of the word in descending order of frequency of occurance
     */
    public static function build($string = null)
    {
        //Ensure Correct values is passed into function
        if (is_null($string)) {
            throw new \InvalidArgumentException('You cannot pass null as the argument');
        } elseif (is_int($string)) {
            throw new \InvalidArgumentException('This function only accepts strings');
        }

        // Removes non alphanum characters and convert string to array using space as delimter
        $string = preg_replace("/[^A-Za-z0-9\s]/", '', $string);
        $string_array = array_filter(explode(' ', $string));

        //Counts occurace of each value, sorts and returns the count as result
        $counts = array_count_values($string_array);
        if (arsort($counts)) {
            return $counts;
        } else {
            return array();
        }
    }
}
