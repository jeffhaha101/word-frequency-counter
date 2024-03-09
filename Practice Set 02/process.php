<?php

// function to get common stop words
function getStopWords() {
    // stop words
    return array("the", "and", "in", "of", "to", "for", "on", "with", "at");
}

// function to calculate word frequency
function calculateWordFrequency($text, $stopWords) {
    // tokenize the text into words
    $words = str_word_count($text, 1);

    // remove stop words
    $filteredWords = array_diff($words, $stopWords);

    // count the frequency of each word
    $wordFrequency = array_count_values($filteredWords);

    return $wordFrequency;
}

// function to sort word frequency array
function sortWordFrequency($wordFrequency, $sortOrder) {
    // sort the array based on frequency
    if ($sortOrder === 'asc') {
        asort($wordFrequency);
    } else {
        arsort($wordFrequency);
    }

    return $wordFrequency;
}

// display word frequency in a table
function displayWordFrequency($wordFrequency, $limit) {

    // display the result in a table
    echo '<link rel="stylesheet" type="text/css" href="styles.css">';

    echo "<h2>Word Frequency Result</h2>";
    echo "<table>";
    echo "<thead><tr><th>Word</th><th>Frequency</th></tr></thead>";
    echo "<tbody>";

    // display the top N words based on the limit
    $counter = 0;
    foreach ($wordFrequency as $word => $frequency) {
        echo "<tr><td>$word</td><td>$frequency</td></tr>";
        $counter++;
        if ($counter >= $limit) {
            break;
        }
    }

    echo "</tbody>";
    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get user input from the form
    $text = $_POST["text"];
    $sortOrder = $_POST["sort"];
    $limit = $_POST["limit"];

    // get common stop words
    $stopWords = getStopWords();

    // calculate word frequency
    $wordFrequency = calculateWordFrequency($text, $stopWords);

    // sort word frequency array
    $sortedWordFrequency = sortWordFrequency($wordFrequency, $sortOrder);

    // result
    displayWordFrequency($sortedWordFrequency, $limit);
}

?>
