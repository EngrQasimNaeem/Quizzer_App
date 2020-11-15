<?php include('database.php'); ?>
<?php session_start(); ?>
<?php  
    //SET Question
    $number = (int) $_GET['n'];

   // Get total questions
    $query = "SELECT * FROM questions";
    //Get result
    $results = $mysqli->query($query) or die($mysqli->error . __LINE__);
    $total = $results->num_rows;


    //Get result
    $query = "SELECT * FROM questions
                WHERE question_number = $number";
    $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

    $question = $result->fetch_assoc();

    $query1 = "SELECT * FROM choices 
                WHERE question_number =$number";

    $choices = $mysqli->query($query1) or die ($mysqli->error.__LINE__);

    


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
            <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
            <p class="question">
                <?php echo $question['text']; ?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                <?php while($row = $choices->fetch_assoc()): ?>
                    <li><input type="radio" name="choice" id="" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
                <?php endwhile; ?>

                </ul>
                <input type="submit" name="" id="" value="Submit">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
            </form>

        </div>
    </main>

    <footer>
        <div class="container">
            Copyright & Copy 2020 PHP Quizer
        </div>
    </footer>
</body>

</html>