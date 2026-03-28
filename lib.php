<?php
function alert($msg) {
    echo "<script>alert('$msg')</script>";
}

function move($u = '/index.php') {
    echo "<script>location.href='$u'</script>";
}