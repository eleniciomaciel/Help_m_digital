

<div class="modal fade bd-exampleCont-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <div id="form-ver-conteudo"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- /.modal-dialog
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-defaultConteudo">
                Launch Default Modal
              </button>
 -->
 
 <script>
        $('.modalConteudo').click(function() {
        var id = $(this).attr("id");

                $.ajax({
                url:"<?php echo base_url();?>conteudo/selectModalConteudo/" + id,
                type:"POST",
                dataType:'json',
                success:function(data){
                    $('#form-ver-conteudo').html(data);
                    $('.bd-exampleCont-modal-lg').modal('show');
                },
                error:function(xhr,er){
                    alert('Error ao selecionar dados! ' + xhr.status);
                }
            });
        });
</script>