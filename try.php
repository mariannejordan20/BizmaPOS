<?php
function GetVolumeLabel($drive) {
    // Check if the drive exists
    if (is_dir($drive . ':\\')) {
        // Get the volume label
        $volname = basename(shell_exec("vol {$drive}:"));
        return $volname;
    } else {
        return '';
    }
}

$serial = GetVolumeLabel("C");
echo $serial;
?>
