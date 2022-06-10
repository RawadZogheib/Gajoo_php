<?php

    $sql = "SELECT `audio_Id`, `audio_language`, `audio_theme`, `audio_time`, `audio_date` FROM `audio`";
    $aud = mysqli_query($con, $sql);

?>