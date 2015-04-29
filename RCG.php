<?php

// access the files
$firstnames = file("FirstNames.txt");
$lastnames = file("LastNames.txt");
$verbs = file("Verbs.txt");
$adjectives = file("Adjectives.txt");
$nouns = file("Nouns.txt");
$tags = file("Tags.txt");
$text = file("Text.txt");
$domains = file("Domains.txt");

// set my variables
$firstname = trim($firstnames[array_rand($firstnames)]); // for some reason when i retrieve the files i get an extra space at the end of the line
$lastname = trim($lastnames[array_rand($lastnames)]);    // substr($x, 0, -1) trims off that extra space
$verb = trim($verbs[array_rand($verbs)]);
$adjective = trim($adjectives[array_rand($adjectives)]);
$noun = trim($nouns[array_rand($nouns)]);
$title = $verb . " " . $adjective . " " . $noun; // this strings together the content for the <title> tag
$email = $firstname . "." . $lastname . "@" . trim($domains[array_rand($domains)]); // does the same exept it's for the <email> tag

$numoftags = mt_rand(0, 4); // specifies how many tags
for ($i = -1; $i <= $numoftags; $i++) { // generate the tags
	$personaltags[$i] = trim($tags[array_rand($tags)]);
	// TODO: implement alphabetical sorting and distinct tags
}

$numoftext = mt_rand(3, 10); // specifies how many paragraphs of text
for ($j = -1; $j <= $numoftext; $j++) { // this loop is used to make the paragraphs of text for the <text> item
	$personaltextlist[$j] = trim($text[array_rand($text)]); // puts a random element of $text into $personaltextlist
	$personaltext = ""; // needed a definition
	$personaltext = $personaltext . $personaltextlist[$j] . ($j < $numoftext) ? "\n\n" : "";
	// that last bit adds two new lines if $j < $numoftext
}

// actualy outputs the data
echo "<data>";
echo "<firstname>" . $firstname . "</firstname>";
echo "<lastname>" . $lastname . "</lastname>";
echo "<title>" . $title . "</title>";
echo "<text>" . $personaltext . "</text>";
echo "<email>" . $email . "</email>";
echo "</data>";





?>
