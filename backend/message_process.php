<?php
    include 'check_login.php';
    require 'db_connect.php';
    if(isset($_POST['action'])){
      switch ($_POST['action']) {
        case 'load':
          loadMessage();
          break;
        case 'edit':
          editMessage();
          break;
        case 'delete':
          deleteMessage();
          break;
        default:
     
      }
    }
    function loadMessage() {
      if(isset($_POST['toUserId']) 
      && isset($_POST['content'])){
          $db = new DatabaseConnection();
          $fromUserId = $_SESSION["userId"];
          $toUserId = $_POST["toUserId"];
          $content = $_POST["content"];
          $sql = "INSERT INTO user_message (fromUserId, toUserId, content) VALUES (?, ?, ?); ";
          $param_types = "dds";
          $status = $db->getStatusQuerry($sql, $param_types, $fromUserId, $toUserId, $content);
          
          if($status === true){
            header("Location: ./../frontend/user_message.php?userId=".$toUserId);
            exit();
          }
          else{
            header("Location: ./../frontend/user_message.php?userId=".$toUserId."&error=error");
            exit();
          }
      }
    }

    function editMessage(){

    }
    function deleteMessage(){
      
    }
?>
