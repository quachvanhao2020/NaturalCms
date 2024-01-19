<style>
    .app-wrapper {
        visibility: hidden
    }
    .app-header {
        visibility: hidden
    }
    #animation{
        text-align: center;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function(event){
        document.getElementById("animation").style.display = "none";
        document.getElementsByClassName("app-header")[0].style.visibility = "visible";
        document.getElementsByClassName("app-wrapper")[0].style.visibility = "visible";
    });
</script>
<div id="animation"><img src="https://i.ibb.co/7N1hPtf/Ripple-1s-200px.gif" /></div>