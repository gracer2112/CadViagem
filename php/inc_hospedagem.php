<?php

//inclusão de hospedagem
function inc_hospedagem($strnome,$dtadata,
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
        
        $pdo=  conexao();
        
        $now= new DateTime();
        $now->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        //echo "<pre>";
        //print_r($now->format('d-m-Y H:i:s'));
        //echo "</pre>";
        
        //busca o codigo da viagem
        $execsql=$pdo->query("SELECT int_tb_via_cod FROM tb_viagem WHERE str_tb_via_nome = '".$strnome."'");
        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $intcodvia=$row['int_tb_via_cod'];
        };

        //verifica se já tem roteiro cadastrado
        $execsql=$pdo->query("SELECT int_tb_rot_cod FROM tb_roteiro WHERE int_tb_via_cod = '".$intcodvia."' AND str_tb_rot_data_viagem = '".$dtadata."'");
        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $intcodrot=$row['int_tb_rot_cod'];
        };

//        echo "<pre>";
//        print_r($intcodvia);
//        print_r($intcodrot);
//        echo "</pre>";
        
        $execsql=$pdo->query("SELECT int_tb_via_cod, int_tb_rot_cod FROM tb_preco WHERE int_tb_via_cod = '".$intcodvia."' AND int_tb_rot_cod = '".$intcodrot."'");
//        echo "<pre>";
//        print_r($execsql);
//        echo "</pre>";

        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $intcodvia=$row['int_tb_via_cod'];
            $intcodrot=$row['int_tb_rot_cod'];
        };
        
        if ($execsql->rowCount() == 0){
            $execsql=$pdo->prepare("INSERT INTO tb_preco (int_tb_via_cod,"
                                      . "int_tb_rot_cod,"
                                      . "str_tb_pre_hospedagem_1,"
                                      . "dec_tb_pre_hospedagem_1,"
                                      . "str_tb_pre_desc_1,"
                                      . "str_tb_pre_hospedagem_2,"
                                      . "dec_tb_pre_hospedagem_2,"
                                      . "str_tb_pre_desc_2,"
                                      . "str_tb_pre_hospedagem_3,"
                                      . "dec_tb_pre_hospedagem_3,"
                                      . "str_tb_pre_desc_3,"
                                      . "str_tb_pre_hospedagem_4,"
                                      . "dec_tb_pre_hospedagem_4,"
                                      . "str_tb_pre_desc_4,"
                                      . "str_tb_pre_hospedagem_5,"
                                      . "dec_tb_pre_hospedagem_5,"
                                      . "str_tb_pre_desc_5,"
                                      . "str_tb_pre_hospedagem_6,"
                                      . "dec_tb_pre_hospedagem_6,"
                                      . "str_tb_pre_desc_6,"
                                      . "str_tb_pre_hospedagem_7,"
                                      . "dec_tb_pre_hospedagem_7,"
                                      . "str_tb_pre_desc_7,"
                                      . "str_tb_pre_hospedagem_8,"
                                      . "dec_tb_pre_hospedagem_8,"
                                      . "str_tb_pre_desc_8,"
                                      . "str_tb_pre_hospedagem_9,"
                                      . "dec_tb_pre_hospedagem_9,"
                                      . "str_tb_pre_desc_9,"
                                      . "str_tb_pre_hospedagem_10,"
                                      . "dec_tb_pre_hospedagem_10,"
                                      . "str_tb_pre_desc_10,"
                                      . "dta_tb_pre_data_inclusao) VALUES"
                                    . "(:int_tb_via_cod,"
                                     . ":int_tb_rot_cod,"
                                     . ":str_tb_pre_hospedagem_1,"
                                     . ":dec_tb_pre_hospedagem_1,"
                                     . ":str_tb_pre_desc_1,"
                                     . ":str_tb_pre_hospedagem_2,"
                                     . ":dec_tb_pre_hospedagem_2,"
                                     . ":str_tb_pre_desc_2,"
                                     . ":str_tb_pre_hospedagem_3,"
                                     . ":dec_tb_pre_hospedagem_3,"
                                     . ":str_tb_pre_desc_3,"
                                     . ":str_tb_pre_hospedagem_4,"
                                     . ":dec_tb_pre_hospedagem_4,"
                                     . ":str_tb_pre_desc_4,"
                                     . ":str_tb_pre_hospedagem_5,"
                                     . ":dec_tb_pre_hospedagem_5,"
                                     . ":str_tb_pre_desc_5,"
                                     . ":str_tb_pre_hospedagem_6,"
                                     . ":dec_tb_pre_hospedagem_6,"
                                     . ":str_tb_pre_desc_6,"
                                     . ":str_tb_pre_hospedagem_7,"
                                     . ":dec_tb_pre_hospedagem_7,"
                                     . ":str_tb_pre_desc_7,"
                                     . ":str_tb_pre_hospedagem_8,"
                                     . ":dec_tb_pre_hospedagem_8,"
                                     . ":str_tb_pre_desc_8,"
                                     . ":str_tb_pre_hospedagem_9,"
                                     . ":dec_tb_pre_hospedagem_9,"
                                     . ":str_tb_pre_desc_9,"
                                     . ":str_tb_pre_hospedagem_10,"
                                     . ":dec_tb_pre_hospedagem_10,"
                                     . ":str_tb_pre_desc_10,"
                                     . ":dta_tb_pre_data_inclusao)");
            
            $execsql->bindValue(':int_tb_via_cod'          ,$intcodvia,PDO::PARAM_INT);
            $execsql->bindValue(':int_tb_rot_cod'          ,$intcodrot,PDO::PARAM_INT);
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
            $execsql->bindValue('dta_tb_pre_data_inclusao' ,$now->format('d-m-Y H:i:s'));

            //echo '<pre>';
            //print_r ($execsql);
            //echo '</pre>';
            $execsql->execute();

        } else {
            //mostra o que encontrou
//            foreach ($data as $row) {
//                echo $row['str_tb_via_nome']."<br />\n";
//                echo $row['dta_tb_via_data_inclusao']."<br />\n";
//            };
            return "Hospedagem/Ingresso já cadastrada!";
        }
    }
    catch (Exception $erro)
    {
        echo 'passei por aqui 2<br>';
        return 'Erro:'.$erro->getMessage();
        //var_dump($erro);
    }
    return "Hospedagem/Ingresso cadastrada";
}

