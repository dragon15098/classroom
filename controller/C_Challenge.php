<?php

include_once("./../model/M_Challenge.php");
class  Ctrl_Challenge
{
    public function process()
    {
        session_start();
        if (isset($_GET["id"])) {
            $this->showChallenge();
        } else if (
            isset($_POST["action"]) && $_POST["action"] === "submit"
            && isset($_POST["challengeId"]) && isset($_POST["answer"])
        ) {
            $this->submitAnswer();
        } else {
            $this->showAllChallenge();
        }
    }

    public  function showAllChallenge()
    {
        $modelChallenge = new Model_Challenge();
        $currentPage = 1;
        if (isset($_GET["currentPage"])) {
            $currentPage = $_GET["currentPage"];
        }
        $page =  $modelChallenge->getAllChallenge($currentPage);
        include_once("./../view/challenge/challenge.php");
    }
    public function showChallenge()
    {
        $modelChallenge = new Model_Challenge();
        $hint = $modelChallenge->getChallengeHint($_GET["id"]);
        include_once("./../view/challenge/challenge_detail.php");
    }
    public function submitAnswer()
    {
        $modelChallenge = new Model_Challenge();
        $answerFile = $modelChallenge->getChallengeAnswer($_POST["challengeId"]);
        $answer = preg_replace("/\.(.*)/", "", $answerFile);
        if (strtolower($_POST["answer"]) === strtolower($answer)) {
            $hint = $modelChallenge->getChallengeHint($_POST["challengeId"]);
            $answerPath = "./../challenges/challenge" . $_POST["challengeId"] . "/" . $answerFile;
            include_once("./../view/challenge/answer_challenge.php");
        } else {
            header("Location: C_Challenge.php?id=". $_POST["challengeId"]);
        }
    }
};

$C_home = new Ctrl_Challenge();
$C_home->process();
