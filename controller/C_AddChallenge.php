<?php

include_once("./../model/M_Challenge.php");
class  Ctrl_AddChallenge
{
    public function process()
    {
        $modelChallenge = new Model_Challenge();
        if (isset($_POST["action"]) && $_POST["action"] === "submit") {
            $location = $modelChallenge->addNewChallenge($_POST["hint"]);
            $this->uploadFile($location);
        } else {
            session_start();
            include_once("./../view/challenge/add_challenge.php");
        }
    }
    function uploadFile($location)
    {
        $target_file = $location . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }

        if ($_FILES["fileToUpload"]["size"] > 20000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (
            $fileType != "txt"
            && $fileType != "docx"
            && $fileType != "pdf"
        ) {
            echo "Sorry, only TXT, DOCX & PDF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            exit();
        } else {
            $moved = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            if (is_dir($location)) {
                if (is_writable($location)) {
                    if ($moved) {
                        header("Location: C_Challenge.php");
                    } else {
                        echo "Not uploaded because of error #" . $_FILES["fileToUpload"]["error"];
                    }
                } else {
                    echo 'Upload directory is not writable';
                }
            } else {
                echo $location;
                echo 'Upload directory does not exist.';
            }
        }
    }
};

$C_home = new Ctrl_AddChallenge();
$C_home->process();
