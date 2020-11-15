<?php include('database.php'); ?>


<?php
    //Get Total Questions
    $query = "SELECT * FROM questions";

    $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    $total = $results->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Quizer</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>PHP Quizer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Test your php knowledge</h2>
            <p>This is a multiple choice quiz to test your knowlwedge of PHP</p>
            <ul>
                <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong>Multiple Choice</li>
                <li><strong>Estimate Time: </strong><?php echo $total * .5; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright & Copy 2020 PHP Quizer
        </div>
    </footer>
</body>

</html>