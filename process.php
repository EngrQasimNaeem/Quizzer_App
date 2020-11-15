<?php include("database.php") ?>
<?php session_start(); ?>

<?php

    //Check to see if score is set_error_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

       
        $next = $number+1;

        //Get Total questions
        $query = "SELECT * FROM questions";

        //Get result

        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);

        $total = $results->num_rows;

        // GET Correct Choice

        $query = "SELECT * FROM choices
                  WHERE question_number = $number
                  AND is_correct = 1";

        //Get result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Get row
        $row = $result->fetch_assoc();

        //Set correcct choice
        $correct_choice = $row['id'];


        //Compare
        if($correct_choice == $selected_choice){
            $_SESSION['score']+1;
        }

        if($number == $total){
            header("Location: final.php");
            exit();
        }else{
            header("Location: question.php?n=".$next);
        }

    }

?>