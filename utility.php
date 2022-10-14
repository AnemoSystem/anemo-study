<?php
    function formatDate($which_date) {
        $separate_date = explode("-", $which_date);
        $new_date = $separate_date[2]."/".$separate_date[1]."/".$separate_date[0];
        return $new_date;
    }
?>