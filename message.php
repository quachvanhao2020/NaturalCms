<script>
    <?php if(isset($_SESSION['message'])) {echo "alert('".__($_SESSION['message'])."')"; unset($_SESSION['message']);} ?>
</script>