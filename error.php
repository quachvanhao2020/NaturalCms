<script>
    <?php if(isset($_SESSION['error'])) {echo "alert('".__($_SESSION['error'])."')"; unset($_SESSION['error']);} ?>
</script>