<?php
function alert($msg) {
    echo "<script>alert('$msg')</script>";
}

function move($u = '/index.php') {
    echo "<script>location.href='$u'</script>";
}

function back($msg = null) {
    if ($msg) {
        echo "<script>alert('$msg')</script>";
    }
    echo "<script>history.back();</script>";
    exit;
}