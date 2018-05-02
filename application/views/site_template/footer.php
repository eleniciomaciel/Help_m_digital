    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url()?>style_home/assets/js/vendor/jquery.min.js"><\/script>')</script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="<?= base_url()?>style_home/assets/js/vendor/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="<?= base_url()?>style_home/assets/js/vendor/holder.min.js"></script>
    <script src="<?= base_url()?>style_home/assets/js/jquery-3.3.1.js"></script>
    <script src="<?= base_url()?>style_home/assets/js/jquery-ui.js"></script>
        <script src="<?= base_url()?>style_home/assets/js/jquery.validate.js"></script>
        <script src="<?= base_url()?>style_home/assets/js/jquery.mask.js"></script>
    <script>
    $( "#form_my_help" ).validate({
   
    rules: {
    firstName_home: {
                        required: true,
                        maxlength: 50,
                        minlength: 3
                    },
         cargo_home:{
                        required: true,
                        maxlength: 50,
                        minlength: 3
                    },
    email_user_home:{
                        required: true,
                        email: true                    
                    },
   Institution_home:{
                        required: true,
                        maxlength: 50,
                        minlength: 3
                    },
        phone_home: {
                        required: true,
                        minlength: 16
                    },
      assunto_home: {
                        required: true,
                        maxlength: 30,
                        minlength: 3
                    },
          help_here:{
                        required: true,
                        maxlength: 999,
                        minlength: 10
                    }
    },
    messages:{
                    //exemplo
       firstName_home: {
                    required: "Informe seu nome!",
                    minlength: "Mínimo 3 caracteres.",
                    maxlength: "Máximo 50 caracteres."
                   },
         cargo_home:{
                    required: "Informe seu cargo!",
                    minlength: "Mínimo 3 caracteres.",
                    maxlength: "Máximo 50 caracteres."
                    },
   email_user_home:{
                    required: "Informe seu email!",
                    email: "Digite um email válido!"
                   },
  Institution_home:{
                    required: "Informe sua instituição!",
                    minlength: "Mínimo 3 caracteres.",
                    maxlength: "Máximo 50 caracteres."
                   },
       phone_home:{
                    required: "Informe um contato!",
                    minlength: "Falta números no telefone",
                  },
     assunto_home:{
                    required: "Digite um assunto por favor!",
                    minlength: "Fale mais por gentileza.",
                    maxlength: "Máximo 1.000 caracteres."
                  },
        help_here:{
                    required: "Digite seu recado por favor!",
                    minlength: "Muito curto a dúvida, fale mais por gentileza.",
                    maxlength: "Máximo 1.000 caracteres."
                  }
    }
  }); 
  
    </script>
    
    <script>
      $('#phone_home').mask('(00) 9.0000-0000', {placeholder: "(00) 0.0000-0000"});
    </script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
    <script>
        
    $(document).on('submit', '#form_my_help', function(event){
    event.preventDefault();
    $.ajax({
       url:"<?php echo base_url() . 'mensagem/store_create'?>",  
        dataType: 'json',
        type:'POST',
        data: $('#form_my_help').serialize(),
        success: function(data) {
            if($.isEmptyObject(data.error)){
                    $(".print-error-msg").css('display','none');
                    $(".success-msg_home").css('display','block');
                    $('#form_my_help')[0].reset();
                    $(".success-msg_home").fadeOut(6000);
                    $(".success-msg_home").html(data.success);
                    $("#exampleModalDuvida").modal('show');
            }else{
                    $(".print-error-msg").css('display','block');
                    $(".print-error-msg").html(data.error);
            }
        }
                    
                    
/*                    
    }).done(function(data){

        getPageData();
         $('#form_my_help')[0].reset();
        $("#exampleModalDuvida").modal('show');
        toastr.success('Mensagem enviada com sucesso.', 'Success Alert', {timeOut: 5000});

    });
*/
    });
});

//*************************************************************************

    </script>

<script type="text/javascript">
        $('#busca_home').autocomplete({
            source: "<?php echo site_url('search/get_autocomplete');?>",
            
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $("#form_search").submit(); 
            }
        });
</script>
  </body>
</html>