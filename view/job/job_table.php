<span style="font-size:20px">
    List user submit
</span>

<table border='1'>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <?php

    foreach ($page->data as &$userFile) {
        echo "<tr>";
        echo "<td>" . $userFile->userJobFileId . "</td>";
        echo "<td>" . $userFile->username . "</td>";
        echo "<td>" . "<a href='" . $userFile->filePath . "' download class='button button_action'>Download</a>" .
            "</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
    include_once "./../view/page_footer.php";
?>