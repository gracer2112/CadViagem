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
                     $introtpar,$strnmepar,$intposvit,
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
    include_once ("conexao.php"); 
    
    try {
        
        //abre conexao
        $pdo=  conexao();
        
        //verifica se tem essa viagem cadastrada na base
        $execsql=$pdo->query("SELECT * FROM tb_viagem WHERE str_tb_via_nome = '".$strnome."'");
        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);

        //se não tem inclui a viagem, o roteiro e as hospedagens/ingresso
        if ($execsql->rowCount() == 0){
            $execsql=$pdo->prepare("CALL SP_Incluir_Viagens ("
                                      .  ":str_tb_via_nome,"
                                      .  ":str_tb_via_foto_1,"
                                      .  ":int_tb_via_foto_1,"
                                      .  ":str_tb_via_foto_2,"
                                      .  ":int_tb_via_foto_2,"
                                      .  ":str_tb_via_foto_3,"
                                      .  ":int_tb_via_foto_3,"
                                      .  ":str_tb_via_foto_4,"
                                      .  ":int_tb_via_foto_4,"
                                      .  ":str_tb_via_foto_5,"
                                      .  ":int_tb_via_foto_5,"
                                      .  ":str_tb_via_foto_6,"
                                      .  ":int_tb_via_foto_6,"
                                      .  ":str_tb_rot_data_viagem,"
                                      .  ":str_tb_rot_roteiro,"
                                      .  ":str_tb_rot_incluso,"
                                      .  ":str_tb_rot_nincluso,"
                                      .  ":str_tb_rot_datahora_embarque,"
                                      .  ":str_tb_rot_datahora_desembarque,"
                                      .  ":str_tb_rot_local_embarque,"
                                      .  ":str_tb_rot_local_desembarque,"
                                      .  ":int_tb_rot_parceiro,"
                                      .  ":str_tb_rot_nmepar,"
                                      .  ":int_tb_rot_pos,"
                                      .  ":str_tb_pre_hospedagem_1,"
                                      .  ":dec_tb_pre_hospedagem_1,"
                                      .  ":str_tb_pre_desc_1,"
                                      .  ":str_tb_pre_hospedagem_2,"
                                      .  ":dec_tb_pre_hospedagem_2,"
                                      .  ":str_tb_pre_desc_2,"
                                      .  ":str_tb_pre_hospedagem_3,"
                                      .  ":dec_tb_pre_hospedagem_3,"
                                      .  ":str_tb_pre_desc_3,"
                                      .  ":str_tb_pre_hospedagem_4,"
                                      .  ":dec_tb_pre_hospedagem_4,"
                                      .  ":str_tb_pre_desc_4,"
                                      .  ":str_tb_pre_hospedagem_5,"
                                      .  ":dec_tb_pre_hospedagem_5,"
                                      .  ":str_tb_pre_desc_5,"
                                      .  ":str_tb_pre_hospedagem_6,"
                                      .  ":dec_tb_pre_hospedagem_6,"
                                      .  ":str_tb_pre_desc_6,"
                                      .  ":str_tb_pre_hospedagem_7,"
                                      .  ":dec_tb_pre_hospedagem_7,"
                                      .  ":str_tb_pre_desc_7,"
                                      .  ":str_tb_pre_hospedagem_8,"
                                      .  ":dec_tb_pre_hospedagem_8,"
                                      .  ":str_tb_pre_desc_8,"
                                      .  ":str_tb_pre_hospedagem_9,"
                                      .  ":dec_tb_pre_hospedagem_9,"
                                      .  ":str_tb_pre_desc_9,"
                                      .  ":str_tb_pre_hospedagem_10,"
                                      .  ":dec_tb_pre_hospedagem_10,"
                                      .  ":str_tb_pre_desc_10,"
                                      .  "@ret_coderro)");
            $execsql->bindValue(':str_tb_via_nome',$strnome,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_via_foto_1',$strcapa,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_1',1,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_via_foto_2',$strfotos_2,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_2',0,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_via_foto_3',$strfotos_3,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_3',0,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_via_foto_4',$strfotos_4,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_4',0,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_via_foto_5',$strfotos_5,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_5',0,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_via_foto_6',$strfotos_6,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_via_foto_6',0,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_rot_data_viagem',$dtadata,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_roteiro',$strdescricao,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_incluso',$strincluso,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_nincluso',$strnincluso,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_datahora_embarque',$dtacheckin,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_datahora_desembarque',$dtacheckout,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_local_embarque',$strembarque,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_local_desembarque',$strdesembarque,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_rot_parceiro',$introtpar,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_rot_nmepar',$strnmepar,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_rot_pos',$intposvit,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_pre_hospedagem_1' ,$arhospedagens1,PDO::PARAM_STR);
            $execsql->bindValue(':dec_tb_pre_hospedagem_1' ,$arpreco1,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_pre_desc_1'       ,$arpagamento1,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_pre_hospedagem_2' ,$arhospedagens2,PDO::PARAM_STR);
            $execsql->bindValue(':dec_tb_pre_hospedagem_2' ,$arpreco2,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_pre_desc_2'       ,$arpagamento2,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_pre_hospedagem_3' ,$arhospedagens3,PDO::PARAM_STR);
            $execsql->bindValue(':dec_tb_pre_hospedagem_3' ,$arpreco3,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_pre_desc_3'       ,$arpagamento3,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_pre_hospedagem_4' ,$arhospedagens4,PDO::PARAM_STR);
            $execsql->bindValue(':dec_tb_pre_hospedagem_4' ,$arpreco4,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_pre_desc_4'       ,$arpagamento4,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_pre_hospedagem_5' ,$arhospedagens5,PDO::PARAM_STR);
            $execsql->bindValue(':dec_tb_pre_hospedagem_5' ,$arpreco5,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_5'        ,$arpagamento5,PDO::PARAM_STR);
            $execsql->bindValue('str_tb_pre_hospedagem_6'  ,$arhospedagens6,PDO::PARAM_STR);
            $execsql->bindValue('dec_tb_pre_hospedagem_6'  ,$arpreco6,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_6'        ,$arpagamento6,PDO::PARAM_STR);
            $execsql->bindValue('str_tb_pre_hospedagem_7'  ,$arhospedagens7,PDO::PARAM_STR);
            $execsql->bindValue('dec_tb_pre_hospedagem_7'  ,$arpreco7,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_7'        ,$arpagamento7,PDO::PARAM_STR);
            $execsql->bindValue('str_tb_pre_hospedagem_8'  ,$arhospedagens8,PDO::PARAM_STR);
            $execsql->bindValue('dec_tb_pre_hospedagem_8'  ,$arpreco8,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_8'        ,$arpagamento8,PDO::PARAM_STR);
            $execsql->bindValue('str_tb_pre_hospedagem_9'  ,$arhospedagens9,PDO::PARAM_STR);
            $execsql->bindValue('dec_tb_pre_hospedagem_9'  ,$arpreco9,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_9'        ,$arpagamento9,PDO::PARAM_STR);
            $execsql->bindValue('str_tb_pre_hospedagem_10' ,$arhospedagens10,PDO::PARAM_STR);
            $execsql->bindValue('dec_tb_pre_hospedagem_10' ,$arpreco10,PDO::PARAM_INT);
            $execsql->bindValue('str_tb_pre_desc_10'       ,$arpagamento10,PDO::PARAM_STR);

            
            $execsql->execute(); 
            
            $execsql=$pdo->query("SELECT @ret_coderro as errno");

            $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $row) {
                $coderro=$row['errno'];
                echo '<pre>';
                print_r ($coderro);
                echo '</pre>';
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

    //cria o diretorio da viagem com as imagens    
    $destino = '../img/'.$intcodvia;
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
}

