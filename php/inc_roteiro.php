<?php

function inc_roteiro($strnome,$dtadata,$strdescricao,$strincluso,$strnincluso,$dtacheckin,$dtacheckout,$strembarque,$strdesembarque,$introtpar,$strnmepar,$intposvit)
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
        $execsql=$pdo->query("SELECT * FROM tb_roteiro WHERE int_tb_via_cod = '".$intcodvia."' AND str_tb_rot_data_viagem = '".$dtadata."'");
        $data = $execsql->fetchAll(PDO::FETCH_ASSOC);
        
        if ($execsql->rowCount() == 0){
            $execsql=$pdo->prepare("INSERT INTO tb_roteiro (int_tb_via_cod,"
                                      . "str_tb_rot_data_viagem,"
                                      . "str_tb_rot_roteiro,"
                                      . "str_tb_rot_incluso,"
                                      . "str_tb_rot_nincluso,"
                                      . "str_tb_rot_datahora_embarque,"
                                      . "str_tb_rot_datahora_desembarque,"
                                      . "str_tb_rot_local_embarque,"
                                      . "str_tb_rot_local_desembarque,"
                                      . "dta_tb_rot_data_inclusao,"
                                      . "int_tb_rot_parceiro,"
                                      . "str_tb_rot_nmepar,"
                                      . "int_tb_rot_pos) VALUES"
                                      . "(:int_tb_via_cod,"
                                      .  ":str_tb_rot_data_viagem,"
                                      .  ":str_tb_rot_roteiro,"
                                      .  ":str_tb_rot_incluso,"
                                      .  ":str_tb_rot_nincluso,"
                                      .  ":str_tb_rot_datahora_embarque,"
                                      .  ":str_tb_rot_datahora_desembarque,"
                                      .  ":str_tb_rot_local_embarque,"
                                      .  ":str_tb_rot_local_desembarque,"
                                      .  ":dta_tb_rot_data_inclusao,"
                                      .  ":int_tb_rot_parceiro,"
                                      .  ":str_tb_rot_nmepar,"
                                      .  ":int_tb_rot_pos)");

            $execsql->bindValue(':int_tb_via_cod',$intcodvia,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_data_viagem',$dtadata,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_roteiro',$strdescricao,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_incluso',$strincluso,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_nincluso',$strnincluso,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_datahora_embarque',$dtacheckin,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_datahora_desembarque',$dtacheckout,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_local_embarque',$strembarque,PDO::PARAM_STR);
            $execsql->bindValue(':str_tb_rot_local_desembarque',$strdesembarque,PDO::PARAM_STR);
            $execsql->bindValue(':dta_tb_rot_data_inclusao',$now->format('d-m-Y H:i:s'));
            $execsql->bindValue(':int_tb_rot_parceiro',$introtpar,PDO::PARAM_INT);
            $execsql->bindValue(':str_tb_rot_nmepar',$strnmepar,PDO::PARAM_STR);
            $execsql->bindValue(':int_tb_rot_pos',$intposvit,PDO::PARAM_INT);


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
            return "Roteiro já cadastrado!";
        }
    }
    catch (Exception $erro)
    {
        //echo 'passei por aqui 2<br>';
        return 'Erro:'.$erro->getMessage();
        //var_dump($erro);
    }
    return "Roteiro cadastrado";
}

