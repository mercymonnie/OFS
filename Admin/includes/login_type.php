
<?php
if ($_SESSION['role'] == 'admin') {
    ?>
    <h4 class="alert_info">Welcome To <strong>"OFS"</strong> Admin Panel As: <?php echo "  " . "<font color='#f90'><big><b>" . $login_session . "</b></big></font>"; ?>  </h4>
    <?php
} else {
    ?>
    <h4 class="alert_info">Welcome To <strong>"OFS"</strong> Boutique Owner Panel As: <?php echo "  " . "<font color='#f90'><big><b>" . $login_session . "</b></big></font>"; ?>  </h4>
    <?php
}
?>
