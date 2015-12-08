<?php namespace CZ4\Dictionary;

class UrbanDictionary
{
    // private $urbanWord;
    public function __construct()
    {
      // $this->urbanWord = $urbanWord;
    }

    
    /**
     * Addes new word to dictionary
     * @param  string $slang            Slang to add
     * @param  string $description      descrip
     * @param  string $example_sentence example senetence in which slang is used
     * @return boolean based on user input
     */
    public function create($slang, $description, $example_sentence)
    {
        //Construct the array in required format
        $word = array(
            'slang' => $slang,
            'description' => $description,
            'example-sentence' => $example_sentence,
        );
        //Add new data to UrbanWord::$data using custome add() function
        return $this->add($word);
    }

    /**
     * Gets a slang word using key as index
     * @param  string $slang the slang word to find
     * @return array  containing  slang, description and example-sentence
     */
    public function get($slang)
    {
        //Get slang data using custome function getWord() and save in $data
        $data = $this->getWord($slang);

        //Check if $data is not empty and return result based on that
        if (!empty($data)) {
            return $data['data'];
        } else {
            return;
        }
    }

    
    /**
     * Updates slang word
     * @param  string $slang slang to update
     * @param  array  $new   contains array of slang parameters to update
     * @return int    of slang updated
     */
    public function update($slang, $new)
    {

        //Use array_reduce() inbuilt function to iterate over UrbanWord::$data array
        // Pass the two arguments into the callback function using use()
        array_reduce(UrbanWord::$data, function ($count, $item) use ($slang, $new) {
            //Test if current item array has slang that is equal to argument passed
            if ($item['slang'] == $slang) {
                //If match is found replace matched occurance in both arrays using array_replace
                UrbanWord::$data[$count] = array_replace($item, $new);
            }
            return $count += 1;
        }, 0);
    }

    
    /**
     * Deletes a particular slang from the UrbanWord object
     * @param  string  $slang the slang word to delete
     * @return boolean if delete successful returns else returns false
     */
    public function delete($slang)
    {
        //Get Slang Data to delete using custome function getWord() that returns array of index and slang info
        $data = $this->getWord($slang);
        //Check if Slang Data Exist
        if ((bool) $data) {
            //Get The Index of Slang data
            $index = $data['index'];
            //Delelte that slang data from the index
            unset(UrbanWord::$data[$index]);
            //Return true on completion
            return true;
        }
        //Return false because slang does not exist in dictionary
        return false;
    }

    
    /**
     * Function is used when all words from dictionary is needed
     * @return array of each word in UrbanWord
     */
    public function getAll()
    {
        return UrbanWord::$data;
    }

    
    /**
     * Util method: used to add new word to UrbanWord array object
     * @param  array   $word associative array of each slang, description and example-sentence
     * @return boolean if added successfully or false if not added successfully
     */
    private function add($word)
    {
        return (bool) array_push(UrbanWord::$data, $word);
    }

    
    /**
     * Util Function: Gets a Particular slang and saves the informartion in a new array containing index and data
     * array('index' => $key, 'data' => $value)
     * @param  string $slang slang word to get
     * @return array  of slang index and slang word data
     */
    private function getWord($slang)
    {
        foreach (UrbanWord::$data as $key => $data) {
            if ($slang == $data['slang']) {
                return array('index' => $key, 'data' => $data);
            }
        }

        return array();
    }
}
