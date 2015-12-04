#CHECKPOINT ONE
<p>
  Project for partial fulfillment for moving to D1
</p>
<h2>Features</h2>
<b>./src</b>
<ul>
  <li><b>Urban Word:</b> A simple app to store new urban words (UrbanWord.php)</li>
  <li><b>UrbanDictionary:</b> A app for manipulating UrbanWord class, to perform basic CRUD operations (UrbanDictionary.php)</li>
  <li><b>Group:</b> A app for manipulating UrbanWord class, to perform basic CRUD operations (Group.php)</li>
</ul>

<b>./test</b>
<p>Contains test files for the apps in ./src using PHPUnit Framework</p>

<h2>Usage</h2>
To use any of the apps follow the steps below:

<b>UrbanDictionary (Require/add UrbanDictionary.php to whatever file you are using it from)</b>
```php

  <?php
    $urban = new UrbanDictionary

    //To create new urban word, pass  
    //slang, description and sentence-example respectively
    //to create function the function

    $urban->create
    (
      "Kpom-Kpi",
      "Means to chill, cool-down, mellow",
      "Bros, please can you Kpom-Kpi right there"
    );


    //Get a slang
    $urban->get("Kpom-Kpi"); //Returns an array of the word, description and sentence-example

    //Update Slang
    //Updates the slang/word of Kpom-Kpi to Chillax
    $urban->update("Kpom-Kpi", array("slang"=>"Chillax"))

    //or
    //Updates the slang and description
    $urban->update("Kpom-Kpi", array("slang"=>"Chillax", description:"To become peaceful"))

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
  ?>

```

<b>Group (Require src/Group.php)</b>
```php
  <?php
    //Returns an array of words in string in descending order
    //of Highest occurence
    $group = Group::build("Let us go boom boom clark");
```
