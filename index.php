<?php
    require_once 'php/recebe_dados.php';
    
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        echo $_SESSION['ss_id_usuario'];                          
    };

?>
<!DOCTYPE html>

<html>
    <head>

        
        <title>Administrativo - Cadastro de Viagens</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--        <link href="lib/fancybox/jquery.fancybox.min.css" type="text/css" rel="stylesheet">-->

        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
<!--Corpo da pagina de cadastro de viagens-->
        <div class="container">
        <form class="form-horizontal" id="f_cadastro" enctype="multipart/form-data" name="f_cadastro" method="post" >
            <fieldset>
                <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Viagens</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-11 control-label">
                                <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
                            </div>
                        </div>
                        
                        <!-- Parte do form ref a Viagem -->
                        <div class="form-group" id="viagem">
                            <div class="col-md-2 control-label">
                                <h3>Viagem</h3></div>
                        </div>

                        <!-- Text input Tabela Viagem-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="viagem">Nome da Viagem<h11>*</h11></label>  
                            <div class="col-md-8">
                                <input id="f_nome" name="f_nome" placeholder="max de 50 caracter" class="form-control input-md" required="" type="text" autofocus maxlength="50" />
                            </div>
                        </div>

                        <!-- Text input tabela roteiro-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="viagem">Data <h11>*</h11></label>  
                            <div class="col-md-2">
                                <input id="f_data" name="f_data" placeholder="" class="form-control input-md" required="" type="date">
                            </div>

                        <!-- Text input tabela roteiro-->
                            <label class="col-md-2 control-label" for="viagem">Posição na vitrine </label>  
                            <div class="col-md-1">
                                <input id="f_posicao" name="f_posicao" placeholder="informar de 1 a 6" value="1" class="form-control input-md" type="number" maxlength="1" pattern="[0-9]" min="1" max="6">
                            </div>
                            <label class="col-md-2 control-label" for="viagem">Roteiro de Parceiro </label>  
                            <div class="col-md-2">
                                <label required="" class="radio-inline" for="radios-0" >
                                <input name="f_parceiro" id="f_parceiro" value="1" type="radio" required>Sim</label> 
                                <label class="radio-inline" for="radios-1">
                                <input name="f_parceiro" id="f_parceiro" value="0" type="radio" checked="checked">Não</label>
                            </div>
                        </div>
                        <!-- Fim Parte do form ref a Viagem -->
                        
                        <!-- Parte do form ref a Roteiro -->
                        <div class="form-group" id="roteiro">
                            <div class="col-md-12 control-label"><hr></div>
                            <div class="col-md-2 control-label">
                                <h3>Roteiro</h3>
                            </div>
                        </div>

                        <!-- Text input tabela roteiro-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="roteiro">Descrição<h11>*</h11></label>  
                            <div class="col-md-8">
                                <textarea id="f_roteiro" name="f_roteiro" placeholder="max de 250 caracter" rows=8 cols= 40 class="form-control input-md" required="" autofocus maxlength="1500"></textarea>
                            </div>
                        </div>

                        <!-- Text input tabela roteiro-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="roteiro">Incluso<h11>*</h11></label>  
                            <div class="col-md-3">
                                <textarea id="f_incluso" name="f_incluso" placeholder="max de 500 caracter" rows=8 cols= 40 class="form-control input-md" required="" autofocus maxlength="500"></textarea>
                            </div>

                            <label class="col-md-2 control-label" for="roteiro">Não Incluso<h11>*</h11></label>  
                            <div class="col-md-3">
                                <textarea id="f_nincluso" name="f_nincluso" placeholder="max de 500 caracter" rows=8 cols= 40 class="form-control input-md" required="" autofocus maxlength="500"></textarea>
                            </div>
                        </div>
                        <!-- Fim parte do form ref a Roteiro -->

                        <!-- Parte do form ref a Embarque e Desembarque -->
                        <div class="form-group" id="embarquedesembarque">
                        <div class="col-md-12 control-label"><hr></div>
                        <div class="col-md-2 control-label">
                            <h3>Embarque e Desembarque</h3></div>
                        </div>

                        <!-- Text input tabela roteiro -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="embarque">Local de Embarque<h11>*</h11></label>  
                            <div class="col-md-3">
                                <input id="f_embarque" name="f_embarque" placeholder="max de 50 caracter" class="form-control input-md" required="" autofocus maxlength="50">
                            </div>

                        <!-- Text input tabela roteiro -- Prepended text-->
                            <label class="col-md-2 control-label" for="embarque">Data e Hora <h11>*</h11></label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                                    <input id="f_checkin" name="f_checkin" class="form-control" placeholder="Data de embarque" required="" type="datetime-local">
                                </div>
                            </div>
                        </div>
                        <!-- Text input tabela roteiro -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="desembarque">Local de Desembarque<h11>*</h11></label>  
                            <div class="col-md-3">
                                <input id="desembarque" name="f_desembarque" placeholder="max de 50 caracter" class="form-control input-md" required="" autofocus maxlength="50">
                            </div>

                        <!-- Text input tabela roteiro -- Prepended text-->
                            <label class="col-md-2 control-label" for="desembarque">Data e Hora <h11>*</h11></label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
                                    <input id="f_checkout" name="f_checkout" class="form-control" placeholder="Data de embarque" required="" type="datetime-local">
                                </div>
                            </div>
                        </div>
                        <!-- Fim parte do form ref a Embarque e Desembarque -->

                        <!-- Parte do form ref a Hospedagem -->
                        <div class="form-group" id="hospedagem">
                            <div class="col-md-12 control-label"><hr></div>
                            <div class="col-md-2 control-label">
                                <h3>Hospedagens/Ingressos</h3></div>
                        </div>

                        <!-- Text input tabela preco -->
                        <div class="container" id="contdinamico">
                        <p>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Tipo">Tipo <h11>*</h11></label>
                                <div class="col-md-4">
                                    <input id="f_tipo" name="f_tipo[]" placeholder="max 250 caracteres" class="form-control input-md" required="" value="" type="text" maxlength="250">
                                </div>
                                <label class="col-md-2 control-label" for="Preço">Preço <h11>*</h11></label>
                                <div class="col-md-2">
                                        <input id="f_preco" name="f_preco[]" placeholder="informar preço" class="form-control input-md" required="" value="0,00" type="tel" maxlength="15" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$"  />
<!--                                    <input id="f_preco" name="f_preco[]" placeholder="informar preço" class="form-control input-md" required="" value="0,00" type="text" maxlength="15" pattern="\d+(,\d{2})?" /> -->
                                </div>
                            </div>
                            <!-- Text input tabela preco -->   
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Pagamento">Condições de Pagamento <h11>*</h11></label>
                                <div class="col-md-8">
                                    <textarea id="f_pagamento" name="f_pagamento[]" placeholder="max 500 caracteres" class="form-control input-md" required="" maxlength="500" rows="3" cols="100"></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="down" name="down"/>                    
                            <div class="form-group">
                                <label class="col-md-8 control-label" for="hospedagem"></label>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" id="inchospedagem" name="inchospedagem">Incluir Novo</button>
                                </div>
                            </div>
                        </p>    
                        </div> <!--fecha container contdinamico-->
                            <!-- Fim parte do form ref a Hospedagem -->

                        <!-- Parte do form ref a Politicas -->
                        <div class="form-group" id="documentos">
                            <div class="col-md-12 control-label"><hr></div>
                            <div class="col-md-2 control-label">
                                <h3>Políticas</h3>
                            </div>
                        </div>

                        <!-- Text input Tabela Documentos-->     
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="politicas">Políticas<h11>*</h11></label>  
                            <div class="col-md-4" id="politica">
                            </div>
                        </div>
                        <!-- Fim parte do form ref a Politicas -->

                        <!-- Parte do form ref a Imagens -->
                        <div class="form-group" id="imagens">
                            <div class="col-md-12 control-label"><hr></div>
                            <div class="col-md-2 control-label">
                                <h3>Imagens</h3>
                            </div>
                        </div>

                        <!-- Text input Tabela Viagem-->     
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="imagens">Capa <h11>*</h11></label>  
                            <div class="col-md-8">
                                <input id="f_capa" name="f_capa" placeholder="" class="form-control input-md" required="" type="file" accept="image/*">
                            </div>
                        </div>

                        <!-- Text input Tabela Viagem-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="imagens">Fotos </label>  
                            <div class="col-md-8">
                                <input id="f_fotos" name="f_fotos[]" placeholder="" class="form-control input-md" type="file" multiple="multiple" accept="image/*">
                            </div>
                        </div>    
                        <!-- Fim parte do form ref a Imagens -->

                        <!-- Botões (Double) -->
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="Cadastrar"></label>
                                <div class="col-md-4">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="submit" >Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="reset">Cancelar</button>
                                </div>
                        </div>
                        <!-- Envia o form para processar -->
                        <div class="row">
                            <div class="col-md-4 alert alert-light" role="alert">
                                <?php if (isset($_POST['f_nome'])){echo trata_o_form();}?>
                            </div>
                        </div>
                    </div> <!--fecha panel body -->
                </div> <!-- fecha panel - primary -->
            </fieldset>
        </form>
        </div> <!-- do container-->

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.maskMoney.js" type="text/javascript"></script>

        <!-- aplicação do R$ na mascara de valores - não está funcionando -->
<!--        <script>
            $(function() {
                $("f_preco").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
            })
        </script>-->
        
        <!-- controle de hospedagens incluidas -->
        <script>
            $(function() {
               var scnDiv = $('#contdinamico');
               var i = 1;

               $(document).on('click','#inchospedagem', function(){
                  $('<p>'+
                    '<div id="new'+i+'">'+
                    '<div class="form-group">'+
                        '<label class="col-md-3 control-label" for="Tipo">Tipo <h11>*</h11></label>'+
                        '<div class="col-md-4">'+
                            '<input id="f_tipo['+i+']" name="f_tipo[]" placeholder="max 250 caracteres" class="form-control input-md" required="" value="" type="text" maxlength="250">'+
                        '</div>'+
                        '<label class="col-md-2 control-label" for="Preço">Preço <h11>*</h11></label>'+
                        '<div class="col-md-2">'+
                            '<input id="f_preco['+i+']" name="f_preco[]" placeholder="informar preço" class="form-control input-md" required="" value="0,00" type="text" maxlength="15" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" />'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label class="col-md-3 control-label" for="Pagamento">Condições de Pagamento <h11>*</h11></label>'+
                        '<div class="col-md-8">'+
                            '<textarea id="f_pagamento['+i+']" name="f_pagamento[]" placeholder="max 500 caracteres" class="form-control input-md" required="" maxlength="500" rows="3" cols="100"></textarea>'+
                        '</div>'+
                    '</div>'+
                    '<input type="hidden" id="down" name="down"/>'+                    
                    '<div class="form-group">'+
                        '<label class="col-md-8 control-label" for="hospedagem"></label>'+
                        '<div class="col-md-4">'+
                            '<button type="button" class="btn btn-primary" id="inchospedagem" name="inchospedagem">Incluir Novo</button>'+
                            '<button type="button" class="btn btn_remove" id="'+i+'" name="exchospedagem">Excluir </button>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                    '</p>').appendTo(scnDiv);
                    
                      i++;
                    return false;
               });
               $(document).on('click','.btn_remove',function(){
                  var button_id=$(this).attr("id");
                  $("#new"+button_id+"").remove();
                  return false;
               });
            });
        </script>
        
        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>                

</body>
</html>

