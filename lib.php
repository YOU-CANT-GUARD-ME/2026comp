<?php
require_once 'db.php';
function alert ($m) {
    echo "<script>alert('$m')</script>";
}

function move($u = '/index.php') {
    echo "<script>location.href='$u'</script>";
}
function back ($m = null) {
    if ($m) {
        echo "<script>alert('$m')</script>";
    }
    echo "<script>history.back();</script>";
}
