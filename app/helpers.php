<?php

// Returns readable file size of resource
function readable_filesize($bytes, $decimals = 2)
{
    $size = ["B", "kB", "MB", "GB", "TB", "PB"];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

// Returns if resouce mime-type is that of an image
function is_image($mimeType)
{
    return starts_with($mimeType, "image/");
}

?>
