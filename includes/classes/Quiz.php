<?php
class Quiz
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function returnAvailableQuizzes()
    {
        $row = mysqli_query($this->con, "SELECT * FROM quiz");

        while ($row1 = mysqli_fetch_assoc($row)) {
            echo "<li> " . $row1["quizName"] . " (Quiz ID: " . $row1["quizID"] . " )</li>";
        }

    }

    public function getQuizName($quizNumber)
    {
        $row = mysqli_query($this->con, "SELECT quizName FROM quiz where quizID=$quizNumber");
        $row = mysqli_fetch_array($row);
        return $row['quizName'];
    }

    public function returnQuizQuestions($quizNumber)
    {

        $mainDiv = '<form method="post" action="giveQuiz.php" class="column2">
        <h4>Quiz Name: ' . $this->getQuizName($quizNumber) . '</h4>
        <p>Answer the following questions in the given time and press "Submit" to proceed to your result.</p>';
        $qsStr = " ";
        $qsCount = 1;

        // Get question and its options/answer with the quiz number provided by the user
        $questionAns = mysqli_query($this->con,
            "   SELECT Q.questionDesc, O.opt1, O.opt2, O.opt3, O.corrAns
            FROM questions Q
            JOIN quizQs Qs ON Qs.questionID=Q.questionID
            JOIN quiz ON Qs.quizID=quiz.quizID AND quiz.quizID='$quizNumber'
            JOIN options O ON Q.optionId=O.optionId
        ");

        $qsCount = mysqli_num_rows($questionAns);
        $mainDiv .= '<p>Number of Questions: ' . $qsCount . '</p>
        <p>Time to finish: 60:00</p><hr>';
        $currQs = 1; //Holds the current question being traversed in the array

        while ($row = mysqli_fetch_array($questionAns)) {

            $question = $row['questionDesc'];
            $option1 = $row['opt1'];
            $option2 = $row['opt2'];
            $option3 = $row['opt3'];
            $correctOpt = $row['corrAns'];

            $mainDiv .= '<p class="question" >Question ' . $currQs . ' ) ' . $question . '</p>';

            $optionString =
                '<div class="quesOpts">

                <p><input type="radio" id="choice1" name="option' . $currQs . '[]" value="' . $option1 . '" checked="checked">
                <label for="question' . $currQs . '">' . $option1 . '</label></p>

                <p><input type="radio" id="choice2" name="option' . $currQs . '[]" value="' . $option2 . '">
                <label for="question' . $currQs . '">' . $option2 . '</label></p>

                <p><input type="radio" id="choice3" name="option' . $currQs . '[]" value="' . $option3 . '">
                <label for="question' . $currQs . '">' . $option3 . '</label></p>

                <p><input type="hidden" id="choice3" name="optionAns' . $currQs .'" value="' . $correctOpt . '"></p>

            </div>
           ';

            $currQs++;

            $mainDiv .= $optionString;
        }

        $mainDiv .= '<input type="submit" value="Submit Quiz" name="submitQuiz" /></form>';
        echo $mainDiv;

    }

    public function returnNoOfQuestions($quizNumber)
    {
        $questionAns = mysqli_query($this->con,
            "   SELECT Q.questionDesc, O.opt1, O.opt2, O.opt3, O.corrAns
            FROM questions Q
            JOIN quizQs Qs ON Qs.questionID=Q.questionID
            JOIN quiz ON Qs.quizID=quiz.quizID AND quiz.quizID='$quizNumber'
            JOIN options O ON Q.optionId=O.optionId
        ");

        $qsCount = mysqli_num_rows($questionAns);

        return $qsCount;
    }

    //Checks the users answers and return the total number or correct answers
    public function checkAnswers()
    {   

        $qsCount = $this->returnNoOfQuestions($_SESSION['quizName']);

        $totalMarks = $qsCount;
        $userMarks = 0;

        for ($x = 1; $x <= $qsCount; $x++) {
            $userOption = $_POST['option'. $x];

            foreach ($userOption as $select) {
                if($select == $_POST['optionAns'. $x]){
                    $userMarks++;
                }
            }
        }

        return $userMarks;

    }

}
