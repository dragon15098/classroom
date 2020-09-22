<?php

include_once("./../model/M_Job.php");
class  Ctrl_AddJob
{
    public function process()
    {
        session_start();
        if (isset($_POST["action"]) && $_POST["action"] == "insert") {
            $this->uploadFile();
            //header("Location: C_Job.php");
        } else {
            include_once("./../view/add_job/add_job.php");
        }
    }
    function uploadFile()
    {
        $target_dir = "/var/www/classroom/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
        } else {
            $moved = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            if (is_dir($target_dir)) {
                if (is_writable($target_dir)) {
                    if ($moved) {
                        echo "Successfully uploaded";
                        $this->insertJobToDB($_POST["jobName"], $target_file);
                    } else {
                        echo "Not uploaded because of error #" . $_FILES["fileToUpload"]["error"];
                    }
                } else {
                    echo 'Upload directory is not writable';
                }
            } else {
                echo 'Upload directory does not exist.';
            }
        }
    }

    function insertJobToDB($jobName, $pathFile){
        
        $modelJob = new Model_Job();
        if($modelJob->insertNewJob($jobName, $pathFile)){
            header("Location: C_Job.php");
        }
        else{

        };
    }
};

$C_home = new Ctrl_AddJob();
$C_home->process();
