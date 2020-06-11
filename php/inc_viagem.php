<?php

//inclusão de viagem
function inc_viagem ($strnome,$strcapa,$intcapa_1,$strcapatmp,
                     $strfotos_2,$intfotos_2,$strfotostmp_2,
                     $strfotos_3,$intfotos_3,$strfotostmp_3,
                     $strfotos_4,$intfotos_4,$strfotostmp_4,
                     $strfotos_5,$intfotos_5,$strfotostmp_5,
                     $strfotos_6,$intfotos_6,$strfotostmp_6,
                     $dtadata,$strdescricao,
                     $strincluso,$strnincluso,
                     $dtacheckin,$dtacheckout,
                     $strembarque,$strdesembarque,
                     $introtpar,$strnmepar,$intposvit,$strcodpol,
                     $arhospedagens1,$arpreco1,$arpagamento1,
                     $arhospedagens2,$arpreco2,$arpagamento2,
                     $arhospedagens3,$arpreco3,$arpagamento3,
                     $arhospedagens4,$arpreco4,$arpagamento4,
                     $arhospedagens5,$arpreco5,$arpagamento5,
                     $arhospedagens6,$arpreco6,$arpagamento6,
                     $arhospedagens7,$arpreco7,$arpagamento7,
                     $arhospedagens8,$arpreco8,$arpagamento8,
                     $arhospedagens9,$arpreco9,$arpagamento9,
                     $arhospedagens10,$arpreco10,$arpagamento10)

{
    //echo 'passei por aqui<br>';
    //echo "$strnome<br>";
//    echo "<pre>";
//    print_r ($strcodpol);
//    echo "</pre>";

    include_once ("conexao.php"); 
    
    try {
        
        //abre conexao
        $pdo=  conexao();
        
        //converte a matriz dos documentos para string
        $strcodpol_1="";
        
        for ($i=0;$i < count($strcodpol);$i++) {
            $strcodpol_1 .=str_pad($strcodpol[$i],2,"0",STR_PAD_LEFT).",";
        };
        
//        echo "$strcodpol_1<br>";
        
        $strusuario="TESTE";
        
        //verifica se tem essa viagem cadastrada na base
        $execsql=$pdo->query("SELECT * FROM tb_viagem WHERE str_tb_via_nome = '".$strnome."'");
        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);

        //se não tem inclui a viagem, o roteiro e as hospedagens/ingresso
        if ($execsql->rowCount() == 0){
            $execsql=$pdo->prepare("CALL SP_Incluir_Viagens ("
                                      .  ":strnome,"
                                      .  ":strcapa,"
                                      .  ":intcapa_1,"
                                      .  ":strfotos_2,"
                                      .  ":intfotos_2,"
                                      .  ":strfotos_3,"
                                      .  ":intfotos_3,"
                                      .  ":strfotos_4,"
                                      .  ":intfotos_4,"
                                      .  ":strfotos_5,"
                                      .  ":intfotos_5,"
                                      .  ":strfotos_6,"
                                      .  ":intfotos_6,"
                                      .  ":dtadata,"
                                      .  ":strdescricao,"
                                      .  ":strincluso,"
                                      .  ":strnincluso,"
                                      .  ":dtacheckin,"
                                      .  ":dtacheckout,"
                                      .  ":strembarque,"
                                      .  ":strdesembarque,"
                                      .  ":introtpar,"
                                      .  ":strnmepar,"
                                      .  ":intposvit,"
                                      .  ":strpolitica,"
                                      .  ":arhospedagens1,"
                                      .  ":arpreco1,"
                                      .  ":arpagamento1,"
                                      .  ":arhospedagens2,"
                                      .  ":arpreco2,"
                                      .  ":arpagamento2,"
                                      .  ":arhospedagens3,"
                                      .  ":arpreco3,"
                                      .  ":arpagamento3,"
                                      .  ":arhospedagens4,"
                                      .  ":arpreco4,"
                                      .  ":arpagamento4,"
                                      .  ":arhospedagens5,"
                                      .  ":arpreco5,"
                                      .  ":arpagamento5,"
                                      .  ":arhospedagens6,"
                                      .  ":arpreco6,"
                                      .  ":arpagamento6,"
                                      .  ":arhospedagens7,"
                                      .  ":arpreco7,"
                                      .  ":arpagamento7,"
                                      .  ":arhospedagens8,"
                                      .  ":arpreco8,"
                                      .  ":arpagamento8,"
                                      .  ":arhospedagens9,"
                                      .  ":arpreco9,"
                                      .  ":arpagamento9,"
                                      .  ":arhospedagens10,"
                                      .  ":arpreco10,"
                                      .  ":arpagamento10,"
                                      .  ":strusu,"
                                      .  "@ret_coderro)");
            $execsql->bindValue(':strnome',$strnome,PDO::PARAM_STR);
            $execsql->bindValue(':strcapa',$strcapa,PDO::PARAM_STR);
            $execsql->bindValue(':intcapa_1',1,PDO::PARAM_INT);
            $execsql->bindValue(':strfotos_2',$strfotos_2,PDO::PARAM_STR);
            $execsql->bindValue(':intfotos_2',0,PDO::PARAM_INT);
            $execsql->bindValue(':strfotos_3',$strfotos_3,PDO::PARAM_STR);
            $execsql->bindValue(':intfotos_3',0,PDO::PARAM_INT);
            $execsql->bindValue(':strfotos_4',$strfotos_4,PDO::PARAM_STR);
            $execsql->bindValue(':intfotos_4',0,PDO::PARAM_INT);
            $execsql->bindValue(':strfotos_5',$strfotos_5,PDO::PARAM_STR);
            $execsql->bindValue(':intfotos_5',0,PDO::PARAM_INT);
            $execsql->bindValue(':strfotos_6',$strfotos_6,PDO::PARAM_STR);
            $execsql->bindValue(':intfotos_6',0,PDO::PARAM_INT);
            $execsql->bindValue(':dtadata',$dtadata,PDO::PARAM_STR);
            $execsql->bindValue(':strdescricao',$strdescricao,PDO::PARAM_STR);
            $execsql->bindValue(':strincluso',$strincluso,PDO::PARAM_STR);
            $execsql->bindValue(':strnincluso',$strnincluso,PDO::PARAM_STR);
            $execsql->bindValue(':dtacheckin',$dtacheckin,PDO::PARAM_STR);
            $execsql->bindValue(':dtacheckout',$dtacheckout,PDO::PARAM_STR);
            $execsql->bindValue(':strembarque',$strembarque,PDO::PARAM_STR);
            $execsql->bindValue(':strdesembarque',$strdesembarque,PDO::PARAM_STR);
            $execsql->bindValue(':introtpar',$introtpar,PDO::PARAM_INT);
            $execsql->bindValue(':strnmepar',$strnmepar,PDO::PARAM_STR);
            $execsql->bindValue(':intposvit',$intposvit,PDO::PARAM_INT);
            $execsql->bindvalue(':strpolitica',$strcodpol_1,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens1' ,$arhospedagens1,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco1' ,$arpreco1,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento1',$arpagamento1,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens2' ,$arhospedagens2,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco2' ,$arpreco2,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento2'       ,$arpagamento2,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens3' ,$arhospedagens3,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco3' ,$arpreco3,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento3'       ,$arpagamento3,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens4' ,$arhospedagens4,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco4' ,$arpreco4,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento4'       ,$arpagamento4,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens5' ,$arhospedagens5,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco5' ,$arpreco5,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento5'        ,$arpagamento5,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens6'  ,$arhospedagens6,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco6'  ,$arpreco6,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento6'        ,$arpagamento6,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens7'  ,$arhospedagens7,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco7'  ,$arpreco7,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento7'        ,$arpagamento7,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens8'  ,$arhospedagens8,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco8'  ,$arpreco8,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento8'        ,$arpagamento8,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens9'  ,$arhospedagens9,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco9'  ,$arpreco9,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento9'        ,$arpagamento9,PDO::PARAM_STR);
            $execsql->bindValue(':arhospedagens10' ,$arhospedagens10,PDO::PARAM_STR);
            $execsql->bindValue(':arpreco10' ,$arpreco10,PDO::PARAM_INT);
            $execsql->bindValue(':arpagamento10'       ,$arpagamento10,PDO::PARAM_STR);
            $execsql->bindValue(':strusu',$strusuario,PDO::PARAM_STR);

            
            $execsql->execute(); 
            
            $execsql=$pdo->query("SELECT @ret_coderro as errno");

            $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $row) {
                $coderro=$row['errno'];
//                echo '<pre>';
//                print_r ($coderro);
//                echo '</pre>';
            };
           
        } else {
            //mostra o que encontrou
//            foreach ($data as $row) {
//                echo $row['str_tb_via_nome']."<br />\n";
//                echo $row['dta_tb_via_data_inclusao']."<br />\n";
//            };
            return "Viagem já cadastrada!";
        }
    }
    catch (Exception $erro)
    {
        //echo 'passei por aqui 2<br>';
        return 'Erro:'.$erro->getMessage();
        //var_dump($erro);
    }
    
    catch (PDOException $erro) 
    {
        //echo 'passei por aqui 3<br>';
        return 'Erro:'.$execsql->errorInfo();
        //var_dump($erro);
    }

//    verifica qual o ultima chave cadastrada
//    $execsql=$pdo->query("SELECT LAST_INSERT_ID()");
//    $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
//    echo '<pre>';
//    print_r ($data);
//    echo '</pre>';
//
//    foreach ($data as $row) {
//        $coderro=$row['LAST_INSERT_ID()'];
//    };
    
    //busca o codigo da viagem que foi cadastrada para guardar as imagens no diretorio
    $execsql=$pdo->query("SELECT int_tb_via_cod FROM tb_viagem WHERE str_tb_via_nome = '".$strnome."'");
    $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row) {
        $intcodvia=$row['int_tb_via_cod'];
    };

    if ($execsql->rowCount() > 0){
        //cria o diretorio da viagem com as imagens    
        $destino = '../Site_JTB/img/'.$intcodvia;
    //    echo '<pre>';
    //    print_r ($destino);
    //    echo '</pre>';


        mkdir($destino, 0777,true);

        $ret=isset($strcapa) ? move_uploaded_file($strcapatmp, ($destino ."/". $strcapa)) : FALSE;
        $ret=isset($strfotos_2) ? move_uploaded_file($strfotostmp_2, ($destino ."/". $strfotos_2)) : FALSE;
        $ret=isset($strfotos_3) ? move_uploaded_file($strfotostmp_3, ($destino ."/". $strfotos_3)) : FALSE;
        $ret=isset($strfotos_4) ? move_uploaded_file($strfotostmp_4, ($destino ."/". $strfotos_4)) : FALSE;
        $ret=isset($strfotos_5) ? move_uploaded_file($strfotostmp_5, ($destino ."/". $strfotos_5)) : FALSE;
        $ret=isset($strfotos_6) ? move_uploaded_file($strfotostmp_6, ($destino ."/". $strfotos_6)) : FALSE;
    //    echo '<pre>';
    //    print_r ($strcapatmp);
    //    print_r ($strfotostmp_2);
    //    print_r ($strfotostmp_3);
    //    print_r ($strfotostmp_4);
    //    print_r ($strfotostmp_5);
    //    print_r ($strfotostmp_6);
    //    echo '</pre>';


        return "Viagem cadastrada";
    } else {
        return "Erro no cadastramento da viagem";
    };
}

