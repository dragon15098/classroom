<?php

use function PHPSTORM_META\type;

include_once("./../backend/db_connect.php");
include_once("E_Challenge.php");
include_once("Page.php");
class Model_Challenge
{

    public function __construct()
    {
        if ($config = parse_ini_file("./../backend/config.ini")) {

            define('PAGE_SIZE', $config["pageSize"]);
        }
    }

    public function getAllChallenge($currentPage)
    {
        $start = PAGE_SIZE * ($currentPage - 1);
        $result = scandir("./../challenges/");
        $listId = [];
        foreach ($result as &$challenge) {
            if($challenge != "."  && $challenge != "."){
                $listId[] = substr($challenge, 9);
            }
        }
        $total = sizeof($listId);
        $offset = 1;
        $numberPage = ($total / PAGE_SIZE);
        if ($numberPage != (int) $numberPage) {
            $numberPage =  (int) $numberPage + 1;
        }
        $listId = array_slice($listId, $start, PAGE_SIZE + 1);
        $challenges = [];
        foreach ($listId as &$id) {
            if ($id != null) {
                $challenges[] = Entity_Challenge::construct1($id);
            }
        }
        return Page::construct5(PAGE_SIZE, $offset, $challenges, $currentPage, $total, $numberPage);
    }

    public function getChallengeHint($challengeId)
    {
        $filePath = "./../challenges/challenge" . $challengeId . "/hint.txt";
        return file_get_contents($filePath);
    }

    public function getChallengeAnswer($challengeId)
    {
        $result = scandir("./../challenges/challenge" . $challengeId);
        if ($result[2] !== "hint.txt") {
            return $result[2];
        } else {
            return $result[3];
        }
    }

    public function addNewChallenge($hint)
    {
        $challengesPath = "./../challenges";
        $result = scandir($challengesPath);
        $maxSize = sizeof($result) - 1;
        $challengeIndex = $maxSize;
        mkdir($challengesPath . "/challenge" . $challengeIndex);
        $hintPath = $challengesPath . "/challenge" . $challengeIndex . "/hint.txt";
        touch( $hintPath);
        file_put_contents($hintPath, $hint);
        return $challengesPath . "/challenge" . $challengeIndex . "/";
    }
}
