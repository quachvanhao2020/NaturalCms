<script>
    <?php if(isset($_SESSION['message'])) {echo NOTIFY."('".__($_SESSION['message'])."')"; unset($_SESSION['message']);} ?>
</script>