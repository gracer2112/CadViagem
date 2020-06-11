<?php
    // Recebe os dados e guarda-os em variáveis
    // 
    // classe para controlar as hospedagens e ingressos
Function trata_o_form() {

require_once "inc_viagem.php";
//require_once "list_viagem.php";
//require_once "inc_roteiro.php";
//require_once "inc_hospedagem.php";

    class Hospedagem {
        public $tipo;
        public $preco;
        public $pagamento;
        
        public function set_tipo($Tipo){
            $this->tipo = $Tipo;
        }
        public function get_tipo(){
            return $this->tipo;
        }
        public function set_preco($Preco){
            $this->preco = $Preco;
        }
        public function get_preco(){
            return $this->preco;
        }
        public function set_pagamento($Pagamento){
            $this->pagamento = $Pagamento;
        }
        public function get_pagamento(){
            return $this->pagamento;
        }
    }

    //OPERACAO - CRUD
    $stroperacao  = "C";
    
    //VIAGEM
    $strnome    =   filter_input(INPUT_POST,'f_nome',FILTER_SANITIZE_STRING);
    $dtadata    =   filter_input(INPUT_POST,'f_data',FILTER_SANITIZE_STRING);
    $intposvit  =   filter_input(INPUT_POST,'f_posicao',FILTER_SANITIZE_NUMBER_INT);
    $introtpar  =   filter_input(INPUT_POST,'f_parceiro',FILTER_SANITIZE_NUMBER_INT);
    
//    echo "$strnome<br>";
//    echo "$dtadata<br>";
//    echo "$intposvit<br>";
//    echo "$introtpar<br>";

    //ROTEIRO
    $strdescricao   =   filter_input(INPUT_POST,'f_roteiro',FILTER_SANITIZE_STRING);
    $strincluso     =   filter_input(INPUT_POST,'f_incluso',FILTER_SANITIZE_STRING);
    $strnincluso    =   filter_input(INPUT_POST,'f_nincluso',FILTER_SANITIZE_STRING);

//    echo "$strdescricao<br>";
//    echo "$strincluso<br>";
//    echo "$strnincluso<br>";

    //EMBARQUE E DESEMBARQUE
    $strembarque    =   filter_input(INPUT_POST,'f_embarque',FILTER_SANITIZE_STRING);
    $strdesembarque =   filter_input(INPUT_POST,'f_embarque',FILTER_SANITIZE_STRING);
    $dtacheckin     =   filter_input(INPUT_POST,'f_checkin',FILTER_SANITIZE_STRING);
    $dtacheckout    =   filter_input(INPUT_POST,'f_checkout',FILTER_SANITIZE_STRING);

//    echo "$strembarque<br>";
//    echo "$strdesembarque<br>";
//    echo "$dtacheckin<br>";
//    echo "$dtacheckout<br>";
    
    //HOSPEDAGENS/INGRESSOS

    if (!empty($_POST['f_tipo'])) {

        $tipo=$_POST['f_tipo'];
        $preco=$_POST['f_preco'];
        $pagamento=$_POST['f_pagamento'];
        $conthosp = count($tipo);
        
        $strhospedagens_1 = new Hospedagem();
        $strhospedagens_1->tipo         =   $tipo;
        $strhospedagens_1->preco        =   $preco;
        $strhospedagens_1->pagamento    =   $pagamento;

    };

    //$strhospedagens             =   isset($_POST['arrayEnviado']) ? json_decode($_POST['arrayEnviado']) : FALSE;

//    echo "<pre>";
//    print_r($strhospedagens_1);
//    echo "</pre>";

    //POLITICAS
    $strcodpol   =   isset($_POST['f_doc']) ? $_POST['f_doc'] : FALSE;
//    echo "<pre>";
//    print_r($strcodpol);
//    echo "</pre>";

    
    //IMAGENS
    $strcapa        = isset($_FILES['f_capa']) ? $_FILES['f_capa'] : FALSE;
    $strfotos       = isset($_FILES['f_fotos']) ? $_FILES['f_fotos'] : FALSE;
    
//    var_dump(isset($_FILES['f_capa']));
//    var_dump(isset($_FILES['f_fotos']));
//
//    echo "<pre>";
//    print_r($strcapa);
//    print_r($strfotos);
//    echo "</pre>";
    
    switch ($stroperacao){
    case "C":
        //carrega dados da capa
        $strcapa = $_FILES['f_capa'];
        $strcapa_1 =$strcapa["name"];
        $strtipoc=$strcapa["type"];
        $strtmpc=$strcapa["tmp_name"];
        $strtamc=$strcapa["size"];
//        echo "<pre>";
//        print_r($strcapa_1);
//        echo "</pre>";
        
        //inicializa a variavel de array que guardará as propriedades dos arquivos
        $arfotos = array();
//        $artipof  = array();
//        $artmpf   = array();
//        $artamf   = array();
        //valida se existem fotos para serem carregadas
        if ($strfotos){
            //guarda as informações das fotos
            $strfotos=$_FILES['f_fotos'];
            $qtdfotos=count($strfotos["name"]);
            for ($i=0;$i < count($strfotos["name"]);$i++){
                $arfotos[$i]= $strfotos["name"][$i];
//                $artipof[$i]= $strfotos["type"][$i];
                $artmpf[$i]= $strfotos["tmp_name"][$i];
//                $artamf[$i]= $strfotos["size"][$i];
//                echo "<pre>";
//                print_r($arfotos[$i]);
//                echo "</pre>";
            }
            $imagensfaltantes=5-count($strfotos["name"]);
            for ($i=0;$i < $imagensfaltantes;$i++){
                $arfotos[$i+count($strfotos["name"])]= NULL;
                $artmpf[$i+count($strfotos["tmp_name"])]= NULL;
            }
        } else {
            for ($i=0;$i < 5;$i++){
                $arfotos[$i]= NULL;
            }
        };
        
        //inicializa a variavel de array que guardará as propriedades das hospedagens
        $arhospedagens = array();
        $arpreco       = array();
        $arpagamento   = array();

        //valida se existem hospedagens para serem carregadas
        if ($strhospedagens_1){
            //guarda as informações das hospedagens
            for ($i=0;$i < $conthosp;$i++){
                $arhospedagens[$i]= $strhospedagens_1->tipo[$i];
                $arpreco[$i]= $strhospedagens_1->preco[$i];
                $arpagamento[$i]= $strhospedagens_1->pagamento[$i];

//                echo "<pre>";
//                print_r($conthosp);
//                print_r($arhospedagens[$i]);
//                print_r($arpreco[$i]);
//                print_r($arpagamento[$i]);
//                echo "</pre>";
            }
            $hospedagensfaltantes=10-$conthosp;
            for ($i=0;$i < $hospedagensfaltantes;$i++){
                $arhospedagens[$i+$conthosp]= NULL;
                $arpreco[$i+$conthosp]= NULL;
                $arpagamento[$i+$conthosp]= NULL;
            }
        } else {
            for ($i=0;$i < 10;$i++){
                $arhospedagens[$i]= NULL;
                $arpreco[$i]= NULL;
                $arpagamento[$i]= NULL;
            }
        };
        
        $strnmepar = "teste";
        
        //inclusão das tres tabelas por SP
        $msg=inc_viagem($strnome,$strcapa_1,1,$strtmpc,
                        $arfotos[0],0,$artmpf[0],
                        $arfotos[1],0,$artmpf[1],
                        $arfotos[2],0,$artmpf[2],
                        $arfotos[3],0,$artmpf[3],
                        $arfotos[4],0,$artmpf[4],
                        $dtadata,$strdescricao,
                        $strincluso,$strnincluso,
                        $dtacheckin,$dtacheckout,
                        $strembarque,$strdesembarque,
                        $introtpar,$strnmepar,$intposvit,$strcodpol,
                        $arhospedagens[0],$arpreco[0],$arpagamento[0],
                        $arhospedagens[1],$arpreco[1],$arpagamento[1],
                        $arhospedagens[2],$arpreco[2],$arpagamento[2],
                        $arhospedagens[3],$arpreco[3],$arpagamento[3],
                        $arhospedagens[4],$arpreco[4],$arpagamento[4],
                        $arhospedagens[5],$arpreco[5],$arpagamento[5],
                        $arhospedagens[6],$arpreco[6],$arpagamento[6],
                        $arhospedagens[7],$arpreco[7],$arpagamento[7],
                        $arhospedagens[8],$arpreco[8],$arpagamento[8],
                        $arhospedagens[9],$arpreco[9],$arpagamento[9]);

        return $msg;
        break;
    }
}
?>