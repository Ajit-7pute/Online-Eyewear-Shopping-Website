<?php
session_start();
$_SESSION = [];
session_destroy();
?>
<script>
    alert("You are logged out successfully");
    location.href = "index.php";
</script>