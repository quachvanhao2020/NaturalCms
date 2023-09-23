<script>
    <?php if(isset($_SESSION['error'])) {echo NOTIFY."('".__($_SESSION['error'])."','','error')"; unset($_SESSION['error']);} ?>
</script>