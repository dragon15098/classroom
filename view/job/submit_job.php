<h2>Submit your file</h2>
<form action="C_SubmitJob.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="hidden" name="jobId" id="jobId" value=<?php echo $jobDetail->jobId ?>>
        <input type="hidden" name="action" id="action" value="submit">
    </div>
    <button method="POST" formaction="C_SubmitJob.php" type="submit" style="float: right;" class="btn btn_action">Submit</button>
</form>