<div class="container d-flex justify-content-center align-items-center file-upload p-3">
    <?php
        if (isset($message['success']))
        {
            echo '<div class="circle circle-green p-3">'.$message['success'].'</div>';
        }
        else
        {
            echo '<div class="circle circle-red p-3">'.$message['error'].'</div>';
        }
    ?>
</div>
