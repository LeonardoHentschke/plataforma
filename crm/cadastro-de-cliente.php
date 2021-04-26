<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

if(!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}elseif ($usuarios->temSistema('CRM')) {
    
}else{
    header("Location: ../index.php");
    exit;
}

if(isset($_POST['razao_social']) && empty($_POST['razao_social'])==false ){

  $razao_social            =addslashes($_POST['razao_social']);
  $tipo                    =addslashes($_POST['tipo']);
  $cnpj_cpf                =addslashes($_POST['cnpj_cpf']);
  $inscricao_estadual      =addslashes($_POST['inscricao_estadual']);
  $endereco                =addslashes($_POST['endereco']);
  $bairro                  =addslashes($_POST['bairro']);
  $numero                  =addslashes($_POST['numero']);
  $complemento             =addslashes($_POST['complemento']);
  $segmento                =addslashes($_POST['segmento']);
  $estado                  =addslashes($_POST['estado']);
  $cidade                  =addslashes($_POST['cidade']);
  $email                   =addslashes($_POST['email']);
  $telefone                =addslashes($_POST['telefone']);
  $whats_app               =addslashes($_POST['whats_app']);
  $observacoes             =addslashes($_POST['observacoes']);

        
  $sql = "INSERT INTO empresas_crm SET razao_social='$razao_social', tipo='$tipo', cnpj_cpf='$cnpj_cpf', inscricao_estadual='$inscricao_estadual', endereco='$endereco', bairro='$bairro', numero='$numero', complemento='$complemento', segmento='$segmento', estado='$estado', cidade='$cidade', email='$email', telefone='$telefone', whats_app='$whats_app', observacoes='$observacoes'";

  $pdo-> query($sql);

  header("Location: oportunidades.php");
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <title> CRM | Grupo Cero </title>   
</head>
<body style="background-color: #DCDCDC; color: #000">

  <div class="container">
    <br><br>
    
    <div class="row justify-content-center">            
            <div class="col-12">
                <form method="POST">

                    <div class="form-row">

                        <div class="col-md-6">
                          <input type="text" name="razao_social" class="form-control" placeholder="Razão Social" required/><br/>                          
                        </div>

                        <div class="col-md-3 mb-4">
                          <select class="form-control" name="tipo" required>
                              <option value=""> Tipo (FISICA/JURIDICA) </option>
                              <option> Fisica </option>
                              <option> Juridica </option>
                          </select>
                        </div>


                        <div class="col-md-3">
                          <input type="text" name="cnpj_cpf" class="form-control" placeholder="CNPJ / CPF" required/><br/>
                        </div>                        

                    </div>

                    <div class="form-row">

                        <div class="col-md-3">
                          <input type="text" name="inscricao_estadual" class="form-control" placeholder="Inscrição Estadual" required/><br/>
                        </div>

                        <div class="col-md-4">
                          <input type="text" name="endereco" class="form-control" placeholder="Endereço" required/><br/>
                        </div>

                        <div class="col-md-2">
                          <input type="text" name="bairro" class="form-control" placeholder="Bairro" /><br/>
                        </div>

                        <div class="col-md-1">
                          <input type="text" name="numero" class="form-control" placeholder="Número" required/><br/>
                        </div>

                        <div class="col-md-2">
                          <input type="text" name="complemento" class="form-control" placeholder="Complemento" /><br/>
                        </div>                    

                    </div>

                    <div class="form-row">
                      
                      <div class="col-md-6 mb-4">
                        <select class="form-control" name="segmento" required>
                            <option value=""> -- Segmento -- </option>
                            <option> Monitoramento/Vigilância </option>
                            <option> Prestação de Serviços </option>
                            <option> Consultoria </option>
                            <option> Locação </option>
                        </select>
                      </div>

                      <div class="col-md-3 mb-4">
                        <select class="form-control" name="estado" required>
                            <option value=""> -- Estado -- </option>
                            <option> RS </option>                            
                        </select>
                      </div>

                      <div class="col-md-3 mb-2">
                        <select class="form-control" name="cidade" required>
                            <option value=""> -- Cidade -- </option>                            
                            <option>Aceguá,RS,BRASIL</option>
                            <option>Água Santa,RS,BRASIL</option>
                            <option>Agudo,RS,BRASIL</option>
                            <option>Ajuricaba,RS,BRASIL</option>
                            <option>Alecrim,RS,BRASIL</option>
                            <option>Alegrete,RS,BRASIL</option>
                            <option>Alegria,RS,BRASIL</option>
                            <option>Almirante Tamandaré do Sul,RS,BRASIL</option>
                            <option>Alpestre,RS,BRASIL</option>
                            <option>Alto Alegre,RS,BRASIL</option>
                            <option>Alto Feliz,RS,BRASIL</option>
                            <option>Alvorada,RS,BRASIL</option>
                            <option>Amaral Ferrador,RS,BRASIL</option>
                            <option>Ametista do Sul,RS,BRASIL</option>
                            <option>André da Rocha,RS,BRASIL</option>
                            <option>Anta Gorda,RS,BRASIL</option>
                            <option>Antônio Prado,RS,BRASIL</option>
                            <option>Arambaré,RS,BRASIL</option>
                            <option>Araricá,RS,BRASIL</option>
                            <option>Aratiba,RS,BRASIL</option>
                            <option>Arroio do Meio,RS,BRASIL</option>
                            <option>Arroio do Padre,RS,BRASIL</option>
                            <option>Arroio do Sal,RS,BRASIL</option>
                            <option>Arroio do Tigre,RS,BRASIL</option>
                            <option>Arroio dos Ratos,RS,BRASIL</option>
                            <option>Arroio Grande,RS,BRASIL</option>
                            <option>Arvorezinha,RS,BRASIL</option>
                            <option>Augusto Pestana,RS,BRASIL</option>
                            <option>Áurea,RS,BRASIL</option>
                            <option>Bagé,RS,BRASIL</option>
                            <option>Balneário Pinhal,RS,BRASIL</option>
                            <option>Barão de Cotegipe,RS,BRASIL</option>
                            <option>Barão do Triunfo,RS,BRASIL</option>
                            <option>Barão,RS,BRASIL</option>
                            <option>Barra do Guarita,RS,BRASIL</option>
                            <option>Barra do Quaraí,RS,BRASIL</option>
                            <option>Barra do Ribeiro,RS,BRASIL</option>
                            <option>Barra do Rio Azul,RS,BRASIL</option>
                            <option>Barra Funda,RS,BRASIL</option>
                            <option>Barracão,RS,BRASIL</option>
                            <option>Barros Cassal,RS,BRASIL</option>
                            <option>Benjamin Constant do Sul,RS,BRASIL</option>
                            <option>Bento Gonçalves,RS,BRASIL</option>
                            <option>Boa Vista das Missões,RS,BRASIL</option>
                            <option>Boa Vista do Buricá,RS,BRASIL</option>
                            <option>Boa Vista do Cadeado,RS,BRASIL</option>
                            <option>Boa Vista do Incra,RS,BRASIL</option>
                            <option>Boa Vista do Sul,RS,BRASIL</option>
                            <option>Bom Jesus,RS,BRASIL</option>
                            <option>Bom Princípio,RS,BRASIL</option>
                            <option>Bom Progresso,RS,BRASIL</option>
                            <option>Bom Retiro do Sul,RS,BRASIL</option>
                            <option>Boqueirão do Leão,RS,BRASIL</option>
                            <option>Bossoroca,RS,BRASIL</option>
                            <option>Bozano,RS,BRASIL</option>
                            <option>Braga,RS,BRASIL</option>
                            <option>Brochier,RS,BRASIL</option>
                            <option>Butiá,RS,BRASIL</option>
                            <option>Caçapava do Sul,RS,BRASIL</option>
                            <option>Cacequi,RS,BRASIL</option>
                            <option>Cachoeira do Sul,RS,BRASIL</option>
                            <option>Cachoeirinha,RS,BRASIL</option>
                            <option>Cacique Doble,RS,BRASIL</option>
                            <option>Caibaté,RS,BRASIL</option>
                            <option>Caiçara,RS,BRASIL</option>
                            <option>Camaquã,RS,BRASIL</option>
                            <option>Camargo,RS,BRASIL</option>
                            <option>Cambará do Sul,RS,BRASIL</option>
                            <option>Campestre da Serra,RS,BRASIL</option>
                            <option>Campina das Missões,RS,BRASIL</option>
                            <option>Campinas do Sul,RS,BRASIL</option>
                            <option>Campo Bom,RS,BRASIL</option>
                            <option>Campo Novo,RS,BRASIL</option>
                            <option>Campos Borges,RS,BRASIL</option>
                            <option>Candelária,RS,BRASIL</option>
                            <option>Cândido Godói,RS,BRASIL</option>
                            <option>Candiota,RS,BRASIL</option>
                            <option>Canela,RS,BRASIL</option>
                            <option>Canguçu,RS,BRASIL</option>
                            <option>Canoas,RS,BRASIL</option>
                            <option>Canudos do Vale,RS,BRASIL</option>
                            <option>Capão Bonito do Sul,RS,BRASIL</option>
                            <option>Capão da Canoa,RS,BRASIL</option>
                            <option>Capão do Cipó,RS,BRASIL</option>
                            <option>Capão do Leão,RS,BRASIL</option>
                            <option>Capela de Santana,RS,BRASIL</option>
                            <option>Capitão,RS,BRASIL</option>
                            <option>Capivari do Sul,RS,BRASIL</option>
                            <option>Caraá,RS,BRASIL</option>
                            <option>Carazinho,RS,BRASIL</option>
                            <option>Carlos Barbosa,RS,BRASIL</option>
                            <option>Carlos Gomes,RS,BRASIL</option>
                            <option>Casca,RS,BRASIL</option>
                            <option>Caseiros,RS,BRASIL</option>
                            <option>Catuípe,RS,BRASIL</option>
                            <option>Caxias do Sul,RS,BRASIL</option>
                            <option>Centenário,RS,BRASIL</option>
                            <option>Cerrito,RS,BRASIL</option>
                            <option>Cerro Branco,RS,BRASIL</option>
                            <option>Cerro Grande do Sul,RS,BRASIL</option>
                            <option>Cerro Grande,RS,BRASIL</option>
                            <option>Cerro Largo,RS,BRASIL</option>
                            <option>Chapada,RS,BRASIL</option>
                            <option>Charqueadas,RS,BRASIL</option>
                            <option>Charrua,RS,BRASIL</option>
                            <option>Chiapetta,RS,BRASIL</option>
                            <option>Chuí,RS,BRASIL</option>
                            <option>Chuvisca,RS,BRASIL</option>
                            <option>Cidreira,RS,BRASIL</option>
                            <option>Ciríaco,RS,BRASIL</option>
                            <option>Colinas,RS,BRASIL</option>
                            <option>Colorado,RS,BRASIL</option>
                            <option>Condor,RS,BRASIL</option>
                            <option>Constantina,RS,BRASIL</option>
                            <option>Coqueiro Baixo,RS,BRASIL</option>
                            <option>Coqueiros do Sul,RS,BRASIL</option>
                            <option>Coronel Barros,RS,BRASIL</option>
                            <option>Coronel Bicaco,RS,BRASIL</option>
                            <option>Coronel Pilar,RS,BRASIL</option>
                            <option>Cotiporã,RS,BRASIL</option>
                            <option>Coxilha,RS,BRASIL</option>
                            <option>Crissiumal,RS,BRASIL</option>
                            <option>Cristal do Sul,RS,BRASIL</option>
                            <option>Cristal,RS,BRASIL</option>
                            <option>Cruz Alta,RS,BRASIL</option>
                            <option>Cruzaltense,RS,BRASIL</option>
                            <option>Cruzeiro do Sul,RS,BRASIL</option>
                            <option>David Canabarro,RS,BRASIL</option>
                            <option>Derrubadas,RS,BRASIL</option>
                            <option>Dezesseis de Novembro,RS,BRASIL</option>
                            <option>Dilermando de Aguiar,RS,BRASIL</option>
                            <option>Dois Irmãos das Missões,RS,BRASIL</option>
                            <option>Dois Irmãos,RS,BRASIL</option>
                            <option>Dois Lajeados,RS,BRASIL</option>
                            <option>Dom Feliciano,RS,BRASIL</option>
                            <option>Dom Pedrito,RS,BRASIL</option>
                            <option>Dom Pedro de Alcântara,RS,BRASIL</option>
                            <option>Dona Francisca,RS,BRASIL</option>
                            <option>Doutor Maurício Cardoso,RS,BRASIL</option>
                            <option>Doutor Ricardo,RS,BRASIL</option>
                            <option>Eldorado do Sul,RS,BRASIL</option>
                            <option>Encantado,RS,BRASIL</option>
                            <option>Encruzilhada do Sul,RS,BRASIL</option>
                            <option>Engenho Velho,RS,BRASIL</option>
                            <option>Entre Rios do Sul,RS,BRASIL</option>
                            <option>Entre-Ijuís,RS,BRASIL</option>
                            <option>Erebango,RS,BRASIL</option>
                            <option>Erechim,RS,BRASIL</option>
                            <option>Ernestina,RS,BRASIL</option>
                            <option>Erval Grande,RS,BRASIL</option>
                            <option>Erval Seco,RS,BRASIL</option>
                            <option>Esmeralda,RS,BRASIL</option>
                            <option>Esperança do Sul,RS,BRASIL</option>
                            <option>Espumoso,RS,BRASIL</option>
                            <option>Estação,RS,BRASIL</option>
                            <option>Estância Velha,RS,BRASIL</option>
                            <option>Esteio,RS,BRASIL</option>
                            <option>Estrela Velha,RS,BRASIL</option>
                            <option>Estrela,RS,BRASIL</option>
                            <option>Eugênio de Castro,RS,BRASIL</option>
                            <option>Fagundes Varela,RS,BRASIL</option>
                            <option>Farroupilha,RS,BRASIL</option>
                            <option>Faxinal do Soturno,RS,BRASIL</option>
                            <option>Faxinalzinho,RS,BRASIL</option>
                            <option>Fazenda Vilanova,RS,BRASIL</option>
                            <option>Feliz,RS,BRASIL</option>
                            <option>Flores da Cunha,RS,BRASIL</option>
                            <option>Floriano Peixoto,RS,BRASIL</option>
                            <option>Fontoura Xavier,RS,BRASIL</option>
                            <option>Formigueiro,RS,BRASIL</option>
                            <option>Forquetinha,RS,BRASIL</option>
                            <option>Fortaleza dos Valos,RS,BRASIL</option>
                            <option>Frederico Westphalen,RS,BRASIL</option>
                            <option>Garibaldi,RS,BRASIL</option>
                            <option>Garruchos,RS,BRASIL</option>
                            <option>Gaurama,RS,BRASIL</option>
                            <option>General Câmara,RS,BRASIL</option>
                            <option>Gentil,RS,BRASIL</option>
                            <option>Getúlio Vargas,RS,BRASIL</option>
                            <option>Giruá,RS,BRASIL</option>
                            <option>Glorinha,RS,BRASIL</option>
                            <option>Gramado dos Loureiros,RS,BRASIL</option>
                            <option>Gramado Xavier,RS,BRASIL</option>
                            <option>Gramado,RS,BRASIL</option>
                            <option>Gravataí,RS,BRASIL</option>
                            <option>Guabiju,RS,BRASIL</option>
                            <option>Guaíba,RS,BRASIL</option>
                            <option>Guaporé,RS,BRASIL</option>
                            <option>Guarani das Missões,RS,BRASIL</option>
                            <option>Harmonia,RS,BRASIL</option>
                            <option>Herval,RS,BRASIL</option>
                            <option>Herveiras,RS,BRASIL</option>
                            <option>Horizontina,RS,BRASIL</option>
                            <option>Hulha Negra,RS,BRASIL</option>
                            <option>Humaitá,RS,BRASIL</option>
                            <option>Ibarama,RS,BRASIL</option>
                            <option>Ibiaçá,RS,BRASIL</option>
                            <option>Ibiraiaras,RS,BRASIL</option>
                            <option>Ibirapuitã,RS,BRASIL</option>
                            <option>Ibirubá,RS,BRASIL</option>
                            <option>Igrejinha,RS,BRASIL</option>
                            <option>Ijuí,RS,BRASIL</option>
                            <option>Ilópolis,RS,BRASIL</option>
                            <option>Imbé,RS,BRASIL</option>
                            <option>Imigrante,RS,BRASIL</option>
                            <option>Independência,RS,BRASIL</option>
                            <option>Inhacorá,RS,BRASIL</option>
                            <option>Ipê,RS,BRASIL</option>
                            <option>Ipiranga do Sul,RS,BRASIL</option>
                            <option>Iraí,RS,BRASIL</option>
                            <option>Itaara,RS,BRASIL</option>
                            <option>Itacurubi,RS,BRASIL</option>
                            <option>Itapuca,RS,BRASIL</option>
                            <option>Itaqui,RS,BRASIL</option>
                            <option>Itati,RS,BRASIL</option>
                            <option>Itatiba do Sul,RS,BRASIL</option>
                            <option>Ivorá,RS,BRASIL</option>
                            <option>Ivoti,RS,BRASIL</option>
                            <option>Jaboticaba,RS,BRASIL</option>
                            <option>Jacuizinho,RS,BRASIL</option>
                            <option>Jacutinga,RS,BRASIL</option>
                            <option>Jaguarão,RS,BRASIL</option>
                            <option>Jaguari,RS,BRASIL</option>
                            <option>Jaquirana,RS,BRASIL</option>
                            <option>Jari,RS,BRASIL</option>
                            <option>Jóia,RS,BRASIL</option>
                            <option>Júlio de Castilhos,RS,BRASIL</option>
                            <option>Lagoa Bonita do Sul,RS,BRASIL</option>
                            <option>Lagoa dos Três Cantos,RS,BRASIL</option>
                            <option>Lagoa Vermelha,RS,BRASIL</option>
                            <option>Lagoão,RS,BRASIL</option>
                            <option>Lajeado do Bugre,RS,BRASIL</option>
                            <option>Lajeado,RS,BRASIL</option>
                            <option>Lavras do Sul,RS,BRASIL</option>
                            <option>Liberato Salzano,RS,BRASIL</option>
                            <option>Lindolfo Collor,RS,BRASIL</option>
                            <option>Linha Nova,RS,BRASIL</option>
                            <option>Maçambará,RS,BRASIL</option>
                            <option>Machadinho,RS,BRASIL</option>
                            <option>Mampituba,RS,BRASIL</option>
                            <option>Manoel Viana,RS,BRASIL</option>
                            <option>Maquiné,RS,BRASIL</option>
                            <option>Maratá,RS,BRASIL</option>
                            <option>Marau,RS,BRASIL</option>
                            <option>Marcelino Ramos,RS,BRASIL</option>
                            <option>Mariana Pimentel,RS,BRASIL</option>
                            <option>Mariano Moro,RS,BRASIL</option>
                            <option>Marques de Souza,RS,BRASIL</option>
                            <option>Mata,RS,BRASIL</option>
                            <option>Mato Castelhano,RS,BRASIL</option>
                            <option>Mato Leitão,RS,BRASIL</option>
                            <option>Mato Queimado,RS,BRASIL</option>
                            <option>Maximiliano de Almeida,RS,BRASIL</option>
                            <option>Minas do Leão,RS,BRASIL</option>
                            <option>Miraguaí,RS,BRASIL</option>
                            <option>Montauri,RS,BRASIL</option>
                            <option>Monte Alegre dos Campos,RS,BRASIL</option>
                            <option>Monte Belo do Sul,RS,BRASIL</option>
                            <option>Montenegro,RS,BRASIL</option>
                            <option>Mormaço,RS,BRASIL</option>
                            <option>Morrinhos do Sul,RS,BRASIL</option>
                            <option>Morro Redondo,RS,BRASIL</option>
                            <option>Morro Reuter,RS,BRASIL</option>
                            <option>Mostardas,RS,BRASIL</option>
                            <option>Muçum,RS,BRASIL</option>
                            <option>Muitos Capões,RS,BRASIL</option>
                            <option>Muliterno,RS,BRASIL</option>
                            <option>Não-Me-Toque,RS,BRASIL</option>
                            <option>Nicolau Vergueiro,RS,BRASIL</option>
                            <option>Nonoai,RS,BRASIL</option>
                            <option>Nova Alvorada,RS,BRASIL</option>
                            <option>Nova Araçá,RS,BRASIL</option>
                            <option>Nova Bassano,RS,BRASIL</option>
                            <option>Nova Boa Vista,RS,BRASIL</option>
                            <option>Nova Bréscia,RS,BRASIL</option>
                            <option>Nova Candelária,RS,BRASIL</option>
                            <option>Nova Esperança do Sul,RS,BRASIL</option>
                            <option>Nova Hartz,RS,BRASIL</option>
                            <option>Nova Pádua,RS,BRASIL</option>
                            <option>Nova Palma,RS,BRASIL</option>
                            <option>Nova Petrópolis,RS,BRASIL</option>
                            <option>Nova Prata,RS,BRASIL</option>
                            <option>Nova Ramada,RS,BRASIL</option>
                            <option>Nova Roma do Sul,RS,BRASIL</option>
                            <option>Nova Santa Rita,RS,BRASIL</option>
                            <option>Novo Barreiro,RS,BRASIL</option>
                            <option>Novo Cabrais,RS,BRASIL</option>
                            <option>Novo Hamburgo,RS,BRASIL</option>
                            <option>Novo Machado,RS,BRASIL</option>
                            <option>Novo Tiradentes,RS,BRASIL</option>
                            <option>Novo Xingu,RS,BRASIL</option>
                            <option>Osório,RS,BRASIL</option>
                            <option>Paim Filho,RS,BRASIL</option>
                            <option>Palmares do Sul,RS,BRASIL</option>
                            <option>Palmeira das Missões,RS,BRASIL</option>
                            <option>Palmitinho,RS,BRASIL</option>
                            <option>Panambi,RS,BRASIL</option>
                            <option>Pantano Grande,RS,BRASIL</option>
                            <option>Paraí,RS,BRASIL</option>
                            <option>Paraíso do Sul,RS,BRASIL</option>
                            <option>Pareci Novo,RS,BRASIL</option>
                            <option>Parobé,RS,BRASIL</option>
                            <option>Passa-Sete,RS,BRASIL</option>
                            <option>Passo do Sobrado,RS,BRASIL</option>
                            <option>Passo Fundo,RS,BRASIL</option>
                            <option>Paulo Bento,RS,BRASIL</option>
                            <option>Paverama,RS,BRASIL</option>
                            <option>Pedras Altas,RS,BRASIL</option>
                            <option>Pedro Osório,RS,BRASIL</option>
                            <option>Pejuçara,RS,BRASIL</option>
                            <option>Pelotas,RS,BRASIL</option>
                            <option>Picada Café,RS,BRASIL</option>
                            <option>Pinhal da Serra,RS,BRASIL</option>
                            <option>Pinhal Grande,RS,BRASIL</option>
                            <option>Pinhal,RS,BRASIL</option>
                            <option>Pinheirinho do Vale,RS,BRASIL</option>
                            <option>Pinheiro Machado,RS,BRASIL</option>
                            <option>Pinto Bandeira,RS,BRASIL</option>
                            <option>Pirapó,RS,BRASIL</option>
                            <option>Piratini,RS,BRASIL</option>
                            <option>Planalto,RS,BRASIL</option>
                            <option>Poço das Antas,RS,BRASIL</option>
                            <option>Pontão,RS,BRASIL</option>
                            <option>Ponte Preta,RS,BRASIL</option>
                            <option>Portão,RS,BRASIL</option>
                            <option>Porto Alegre,RS,BRASIL</option>
                            <option>Porto Lucena,RS,BRASIL</option>
                            <option>Porto Mauá,RS,BRASIL</option>
                            <option>Porto Vera Cruz,RS,BRASIL</option>
                            <option>Porto Xavier,RS,BRASIL</option>
                            <option>Pouso Novo,RS,BRASIL</option>
                            <option>Presidente Lucena,RS,BRASIL</option>
                            <option>Progresso,RS,BRASIL</option>
                            <option>Protásio Alves,RS,BRASIL</option>
                            <option>Putinga,RS,BRASIL</option>
                            <option>Quaraí,RS,BRASIL</option>
                            <option>Quatro Irmãos,RS,BRASIL</option>
                            <option>Quevedos,RS,BRASIL</option>
                            <option>Quinze de Novembro,RS,BRASIL</option>
                            <option>Redentora,RS,BRASIL</option>
                            <option>Relvado,RS,BRASIL</option>
                            <option>Restinga Seca,RS,BRASIL</option>
                            <option>Rio dos Índios,RS,BRASIL</option>
                            <option>Rio Grande,RS,BRASIL</option>
                            <option>Rio Pardo,RS,BRASIL</option>
                            <option>Riozinho,RS,BRASIL</option>
                            <option>Roca Sales,RS,BRASIL</option>
                            <option>Rodeio Bonito,RS,BRASIL</option>
                            <option>Rolador,RS,BRASIL</option>
                            <option>Rolante,RS,BRASIL</option>
                            <option>Ronda Alta,RS,BRASIL</option>
                            <option>Rondinha,RS,BRASIL</option>
                            <option>Roque Gonzales,RS,BRASIL</option>
                            <option>Rosário do Sul,RS,BRASIL</option>
                            <option>Sagrada Família,RS,BRASIL</option>
                            <option>Saldanha Marinho,RS,BRASIL</option>
                            <option>Salto do Jacuí,RS,BRASIL</option>
                            <option>Salvador das Missões,RS,BRASIL</option>
                            <option>Salvador do Sul,RS,BRASIL</option>
                            <option>Sananduva,RS,BRASIL</option>
                            <option>Santa Bárbara do Sul,RS,BRASIL</option>
                            <option>Santa Cecília do Sul,RS,BRASIL</option>
                            <option>Santa Clara do Sul,RS,BRASIL</option>
                            <option>Santa Cruz do Sul,RS,BRASIL</option>
                            <option>Santa Margarida do Sul,RS,BRASIL</option>
                            <option>Santa Maria do Herval,RS,BRASIL</option>
                            <option>Santa Maria,RS,BRASIL</option>
                            <option>Santa Rosa,RS,BRASIL</option>
                            <option>Santa Tereza,RS,BRASIL</option>
                            <option>Santa Vitória do Palmar,RS,BRASIL</option>
                            <option>Santana da Boa Vista,RS,BRASIL</option>
                            <option>Sant'Ana do Livramento,RS,BRASIL</option>
                            <option>Santiago,RS,BRASIL</option>
                            <option>Santo Ângelo,RS,BRASIL</option>
                            <option>Santo Antônio da Patrulha,RS,BRASIL</option>
                            <option>Santo Antônio das Missões,RS,BRASIL</option>
                            <option>Santo Antônio do Palma,RS,BRASIL</option>
                            <option>Santo Antônio do Planalto,RS,BRASIL</option>
                            <option>Santo Augusto,RS,BRASIL</option>
                            <option>Santo Cristo,RS,BRASIL</option>
                            <option>Santo Expedito do Sul,RS,BRASIL</option>
                            <option>São Borja,RS,BRASIL</option>
                            <option>São Domingos do Sul,RS,BRASIL</option>
                            <option>São Francisco de Assis,RS,BRASIL</option>
                            <option>São Francisco de Paula,RS,BRASIL</option>
                            <option>São Gabriel,RS,BRASIL</option>
                            <option>São Jerônimo,RS,BRASIL</option>
                            <option>São João da Urtiga,RS,BRASIL</option>
                            <option>São João do Polêsine,RS,BRASIL</option>
                            <option>São Jorge,RS,BRASIL</option>
                            <option>São José das Missões,RS,BRASIL</option>
                            <option>São José do Herval,RS,BRASIL</option>
                            <option>São José do Hortêncio,RS,BRASIL</option>
                            <option>São José do Inhacorá,RS,BRASIL</option>
                            <option>São José do Norte,RS,BRASIL</option>
                            <option>São José do Ouro,RS,BRASIL</option>
                            <option>São José do Sul,RS,BRASIL</option>
                            <option>São José dos Ausentes,RS,BRASIL</option>
                            <option>São Leopoldo,RS,BRASIL</option>
                            <option>São Lourenço do Sul,RS,BRASIL</option>
                            <option>São Luiz Gonzaga,RS,BRASIL</option>
                            <option>São Marcos,RS,BRASIL</option>
                            <option>São Martinho da Serra,RS,BRASIL</option>
                            <option>São Martinho,RS,BRASIL</option>
                            <option>São Miguel das Missões,RS,BRASIL</option>
                            <option>São Nicolau,RS,BRASIL</option>
                            <option>São Paulo das Missões,RS,BRASIL</option>
                            <option>São Pedro da Serra,RS,BRASIL</option>
                            <option>São Pedro das Missões,RS,BRASIL</option>
                            <option>São Pedro do Butiá,RS,BRASIL</option>
                            <option>São Pedro do Sul,RS,BRASIL</option>
                            <option>São Sebastião do Caí,RS,BRASIL</option>
                            <option>São Sepé,RS,BRASIL</option>
                            <option>São Valentim do Sul,RS,BRASIL</option>
                            <option>São Valentim,RS,BRASIL</option>
                            <option>São Valério do Sul,RS,BRASIL</option>
                            <option>São Vendelino,RS,BRASIL</option>
                            <option>São Vicente do Sul,RS,BRASIL</option>
                            <option>Sapiranga,RS,BRASIL</option>
                            <option>Sapucaia do Sul,RS,BRASIL</option>
                            <option>Sarandi,RS,BRASIL</option>
                            <option>Seberi,RS,BRASIL</option>
                            <option>Sede Nova,RS,BRASIL</option>
                            <option>Segredo,RS,BRASIL</option>
                            <option>Selbach,RS,BRASIL</option>
                            <option>Senador Salgado Filho,RS,BRASIL</option>
                            <option>Sentinela do Sul,RS,BRASIL</option>
                            <option>Serafina Corrêa,RS,BRASIL</option>
                            <option>Sério,RS,BRASIL</option>
                            <option>Sertão Santana,RS,BRASIL</option>
                            <option>Sertão,RS,BRASIL</option>
                            <option>Sete de Setembro,RS,BRASIL</option>
                            <option>Severiano de Almeida,RS,BRASIL</option>
                            <option>Silveira Martins,RS,BRASIL</option>
                            <option>Sinimbu,RS,BRASIL</option>
                            <option>Sobradinho,RS,BRASIL</option>
                            <option>Soledade,RS,BRASIL</option>
                            <option>Tabaí,RS,BRASIL</option>
                            <option>Tapejara,RS,BRASIL</option>
                            <option>Tapera,RS,BRASIL</option>
                            <option>Tapes,RS,BRASIL</option>
                            <option>Taquara,RS,BRASIL</option>
                            <option>Taquari,RS,BRASIL</option>
                            <option>Taquaruçu do Sul,RS,BRASIL</option>
                            <option>Tavares,RS,BRASIL</option>
                            <option>Tenente Portela,RS,BRASIL</option>
                            <option>Terra de Areia,RS,BRASIL</option>
                            <option>Teutônia,RS,BRASIL</option>
                            <option>Tio Hugo,RS,BRASIL</option>
                            <option>Tiradentes do Sul,RS,BRASIL</option>
                            <option>Toropi,RS,BRASIL</option>
                            <option>Torres,RS,BRASIL</option>
                            <option>Tramandaí,RS,BRASIL</option>
                            <option>Travesseiro,RS,BRASIL</option>
                            <option>Três Arroios,RS,BRASIL</option>
                            <option>Três Cachoeiras,RS,BRASIL</option>
                            <option>Três Coroas,RS,BRASIL</option>
                            <option>Três de Maio,RS,BRASIL</option>
                            <option>Três Forquilhas,RS,BRASIL</option>
                            <option>Três Palmeiras,RS,BRASIL</option>
                            <option>Três Passos,RS,BRASIL</option>
                            <option>Trindade do Sul,RS,BRASIL</option>
                            <option>Triunfo,RS,BRASIL</option>
                            <option>Tucunduva,RS,BRASIL</option>
                            <option>Tunas,RS,BRASIL</option>
                            <option>Tupanci do Sul,RS,BRASIL</option>
                            <option>Tupanciretã,RS,BRASIL</option>
                            <option>Tupandi,RS,BRASIL</option>
                            <option>Tuparendi,RS,BRASIL</option>
                            <option>Turuçu,RS,BRASIL</option>
                            <option>Ubiretama,RS,BRASIL</option>
                            <option>União da Serra,RS,BRASIL</option>
                            <option>Unistalda,RS,BRASIL</option>
                            <option>Uruguaiana,RS,BRASIL</option>
                            <option>Vacaria,RS,BRASIL</option>
                            <option>Vale do Sol,RS,BRASIL</option>
                            <option>Vale Real,RS,BRASIL</option>
                            <option>Vale Verde,RS,BRASIL</option>
                            <option>Vanini,RS,BRASIL</option>
                            <option>Venâncio Aires,RS,BRASIL</option>
                            <option>Vera Cruz,RS,BRASIL</option>
                            <option>Veranópolis,RS,BRASIL</option>
                            <option>Vespasiano Corrêa,RS,BRASIL</option>
                            <option>Viadutos,RS,BRASIL</option>
                            <option>Viamão,RS,BRASIL</option>
                            <option>Vicente Dutra,RS,BRASIL</option>
                            <option>Victor Graeff,RS,BRASIL</option>
                            <option>Vila Flores,RS,BRASIL</option>
                            <option>Vila Lângaro,RS,BRASIL</option>
                            <option>Vila Maria,RS,BRASIL</option>
                            <option>Vila Nova do Sul,RS,BRASIL</option>
                            <option>Vista Alegre do Prata,RS,BRASIL</option>
                            <option>Vista Alegre,RS,BRASIL</option>
                            <option>Vista Gaúcha,RS,BRASIL</option>
                            <option>Vitória das Missões,RS,BRASIL</option>
                            <option>Westfália,RS,BRASIL</option>
                            <option>Xangri-lá,RS,BRASIL</option>
                        </select>
                      </div>

                    </div>

                    <br>


                    <div class="form-row">

                      <div class="col-md-6">                        
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required/><br/>
                      </div>

                      <div class="col-md-3">                        
                        <input type="text" name="telefone" class="form-control" placeholder="Telefone" required/><br/>
                      </div>

                      <div class="col-md-3">                        
                        <input type="text" name="whats_app" class="form-control" placeholder="Whats App" /><br/>
                      </div>                

                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="observacoes" placeholder="Observações"></textarea>
                        </div>
                    </div>


                    <hr>
                    <br>
                    <div class="form-row">                      

                      <div class="col-md-2  mb-3">
                          <a href="oportunidades.php" class="btn btn-secondary btn-block">Cancelar</a>
                      </div>

                      <div class="col-md-4  mb-3">
                          <input type="submit" value="Salvar" class="btn btn-primary btn-block"/>
                      </div>

                    </div>
                    
                
                </form>
                <br><br>
            </div>
        </div> 



  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
