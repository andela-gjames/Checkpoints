<?php
  require("UrbanWord.php");

  class UrbanDictionary
  {
    public function __construct()
    {
    }

    /**
     * @params $slang, $description, $example_sentence
     * Adds New Word to Dictionary
     */
    public function create($slang, $description, $example_sentence )
    {
      //Construct the array in required format
      $word = array
      (
          'slang'             => $slang,
          'description'       => $description,
          'example-sentence'  => $example_sentence
      );
      //Add new data to UrbanWord::$data using custome add() function
      return $this->add($word);
    }
    /**
     * @params $slang
     *  Gets a word data by Slang
     */
    public function get($slang)
    {
      //Get slang data using custome function getWord() and save in $data
      $data = $this->getWord($slang);

      //Check if $data is not empty and return result based on that
      if(!empty($data)){
        return $data['data'];
      }
      else{
          return null;
      }

    }

    /**
     * @params $slang, $new
     *  Updates a particular slang record
     */
    public function update($slang, $new)
    {

      //Use array_reduce() inbuilt function to iterate over UrbanWord::$data array
      // Pass the two arguments into the callback function using use()
      array_reduce(UrbanWord::$data, function($count, $item) use($slang, $new)
      {
        //Test if current item array has slang that is equal to argument passed
        if($item['slang'] == $slang)
        {
          //If match is found replace matched occurance in both arrays using array_replace
          UrbanWord::$data[$count] = array_replace($item, $new);
        }
        return $count += 1;
      }, 0);
    }

    /**
     * $param $slang
     * Deletes a particular slang racord
     */
    public function delete($slang)
    {
      //Get Slang Data to delete using custome function getWord() that returns array of index and slang info
      $data = $this->getWord($slang);
      //Check if Slang Data Exist
      if(!!$data)
      {
        //Get The Index of Slang data
        $index = $data["index"];
        //Delelte that slang data from the index
        unset(UrbanWord::$data[$index]);
        //Return true on completion
        return true;
      }
      //Return false because slang does not exist in dictionary
      return false;
    }

    //Returns all the dictionary words
    public function getAll()
    {
      return UrbanWord::$data;
    }

    //Util Function: Accepts an array of new word and other data and adds it to dictionary
    private function add($word)
    {
      return !!array_push(UrbanWord::$data, $word);
    }

    //Util Function to get Index of particular slang, NOT USED
    private function getIndex($slang)
    {
      $this->get($slang);
    }

    //Util Function: Gets a Particular slang and saves the informartion in a new array containing index and data
    private function getWord($slang)
    {
      foreach(UrbanWord::$data as $key=>$data)
      {
        if($slang == $data['slang'])
          return array('index' => $key, 'data' => $data);
      }
      return array();
    }
  }
