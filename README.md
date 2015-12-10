#Checkpoint One 
[![StyleCI](https://styleci.io/repos/47337499/shield)](https://styleci.io/repos/47337499)
[![Build Status](https://travis-ci.org/andela-gjames/Urban-Dictionary.svg?branch=develop)](https://travis-ci.org/andela-gjames/Urban-Dictionary)
    
In this task, an application that serves as a dictionary for urban words and slangs is created.
A class was created that contains a static associative array to hold urban words `UrbanWord`. 
    
Also, a dictionary class is created that can add, retrieve, update and delete meanings of urban words from `UrbanWord` thrown in as arguments to the class functions. 

PHPUnit was also used to effectively test classes and functions to ensure they are effective.

##Features

  * **Urban Word:** A simple app to store new urban words `UrbanWord.php`
  * **UrbanDictionary:** A app for manipulating UrbanWord class, to perform basic CRUD operations `UrbanDictionary.php`
  * **Group:** A app for manipulating UrbanWord class, to perform basic CRUD operations `Group.php`
  * **Test:** Contains test files for the apps in `./src` using PHPUnit Framework

##Usage
To use any of the apps follow the steps below:

###UrbanDictionary

#####Create New Word
```php
    $urban = new UrbanDictionary();

    //To create new urban word, pass  
    //slang, description and sentence-example respectively
    //to create function the function

    $urban->create
    (
      "Kpom-Kpi",
      "Means to chill, cool-down, mellow",
      "Bros, please can you Kpom-Kpi right there"
    );

```

#####Get/Retrieve A Word
```php
    //Get a slang
    $urban->get("Kpom-Kpi"); //Returns an array of the word, description and sentence-example
```

#####Update A Word
```php
    //Update Slang
    //Updates the slang/word of Kpom-Kpi to Chillax
    $urban->update("Kpom-Kpi", array("slang"=>"Chillax"))

    //or
    //Updates the slang and description
    $urban->update("Kpom-Kpi", array("slang"=>"Chillax", description=>"To become peaceful"))

    //or
    $urban->update
    (
      "Kpom-Kpi",
       array
       (
         "slang"=>"Chillax",
         "description"=>"To become peaceful",
         "example-sentence"=>"Please Chillax"
         )
    )
```
#####Delete A Word
```php
  $urban->delete('Chillax');
```
#####Group
```php
    //Returns an array of words in string in descending order
    //of Highest occurence
    $group = Group::build("Let us go boom boom clark");
```


##Testing

  The test require PHPunit to run<br/>
  To test the files, navigate to the root `/` directory and run

```console
    phpunit
```
