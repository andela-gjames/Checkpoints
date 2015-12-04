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

<b>UrbanDictionary</b>
```
  <?php
    $urban = new UrbanDictionary
    //To create new urban word pass to create function the slang, description and sentence-exaple respectively
    $urban->create("Kpom-Kpi", "Means to chill, cool-down, mellow", "Bros, please can you Kpom-Kpi right there");
  ?>
```
