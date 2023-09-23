<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
<script>
    $(function() {
        $('.pop').on('click', function(e) {
            $('.imagepreview').attr('src', $(e.target).attr('src'));
            $('#imagemodal').modal('show');   
        });		
    });
</script>
<style>
    .pop{
        cursor: pointer;
    }
</style>