<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exclusiva PV | <?php echo $infos['nome']; ?>  </title>
</head>

<style>
@page { margin: 0in 0in 0in 0in; }
body { font-family: "Poppins", Sans-serif; color: #18527a; background-color: #e8edf1; }
.bg-blue {
    background-color: #203864;
    -webkit-print-color-adjust: exact;
}
.bg-info {
    background-color: #528dd4 !important;
    -webkit-print-color-adjust: exact;
}
.text-white {
    color: #fff !important;
    -webkit-print-color-adjust: exact;
}
.bg-light {
    color: #fff !important;
    -webkit-print-color-adjust: exact;
}
.bg-blue {
    background-color: #203864;
    -webkit-print-color-adjust: exact;
}
.bg-gray {
    background-color: #dbe0eb;
    -webkit-print-color-adjust: exact;
}
.bg-primary {
    background-color: #13527d!important;
    color: #fff;
    -webkit-print-color-adjust: exact;
}
.bg-dark {
  background-color: #0d0d0d;
}
.row {
  width: auto;
  display: table;
}

.row-2 {
  width: auto;
  display: table;
}

.col {
  width: 90%;
  padding-top: 0.1in;
  padding-left: 0.5in;
}

.col li {
  font-size: 13px;
  padding-bottom: 0.08in;
}
.col-1 {
  width: 90%;
  padding: 0.5in;
}
.col-2 {
  width: 4.0in;
  margin: auto;
  display: table-cell;
}

.pl-5 {
  padding-left: 0.5in;
}

.pl-2 {
  padding-left: 0.2in;
}

.col-2-2 {
  width: 2.1in;
  margin: auto;
  display: table-cell;
}

.col-3 {
  width: 4.5in;
  margin: auto;
  display: table-cell;
  padding-right: 0.5in;
}
footer {
  /* position: absolute; */
  width: 100%;
  bottom: 1px;
}
.img {
  width: auto;
  height: 20in;
}
.img-footer-background {
  background-color: #13527d;
  width: 13in;
  height: 20in;
}
.img-footer {
  background-color: #124b70;
  width: auto;
  height: 19.5in;
}
.img-logo {
  width: 3in;
  height: auto;
}
.molde {
  border: 1px solid #203864;
  border-radius: 20%;
  padding: 0.3in;
}
.p-1 {
  padding: 0 0.1in;
}
.part-footer {
  background-color: #13527d;
  color: #fff !important;
  padding-top: 0.6in;
  padding-bottom: 0.52in;
  padding-left: 0.5in;
  height: auto;
}
a { color: #ffffff !important; }
.col-3 h1 {
  text-align: right;
}
.header {
  padding-bottom: 0.3in;
}
</style>

<body>
<?php setlocale( LC_MONETARY, 'pt_BR' ); ?>
<header></header>
  <div class="container">

    <img class="img" src="<?php echo $_SERVER["DOCUMENT_ROOT"]. '/wp-content/plugins/orcamento/includes/templates/img/page1.jpg'; ?>" alt="">
    <img class="img" src="<?php echo $_SERVER["DOCUMENT_ROOT"]. '/wp-content/plugins/orcamento/includes/templates/img/page4.jpg'; ?>" alt="">
    <img class="img" src="<?php echo $_SERVER["DOCUMENT_ROOT"]. '/wp-content/plugins/orcamento/includes/templates/img/page5.jpg'; ?>" alt="">
    <div class="header bg-primary">
      <div class="row">
        <div class="col-2 pl-5">
          <h2>Dados do Cliente</h2>
          <strong>Nome: </strong><span><?php echo $infos['nome']; ?></span><br>
          <strong>Telefone: </strong><span><?php echo $infos['telefone']; ?></span><br>
        </div>
        <div class="col-3">
          <h1>
            <img class="img-logo" src="<?php echo $_SERVER["DOCUMENT_ROOT"]. '/wp-content/plugins/orcamento/includes/templates/img/Logo_Branco.png'; ?>" alt="">
          </h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-2 pl-5">
        <h3>Dados do Ve??culo</h3>
        <strong><?php echo $infos['veiculo']; ?></strong><br>
        <strong>Tipo: </strong><span><?php echo ucfirst( $infos['tipo'] ); ?></span><br>
        <strong>Valor da Fipe: </strong><span><?php echo money_format( '%.2n', $infos['valor_veiculo'] ); ?></span><br>
        <strong>C??digo da Fipe: </strong><span><?php echo $infos['codigo_fipe']; ?></span><br>
      </div>
      <div class="col-3 pl-2">
        <h3>Cota????o - <?php echo date('d/m/Y');?></h3>
        <strong>Plano <?php echo ucfirst( $infos['plano'] ); ?></strong> <span><?php echo money_format( '%.2n', $infos['valor_plano'] ); ?><?php echo ( $infos['desconto'] != '' ) ? ' (Desconto de ' . $infos['desconto'] . '%)' : ''; ?></span><br>
        <strong>Valor da Ades??o: </strong><span><?php echo money_format( '%.2n', $infos['adesao'] ); ?></span><br>
        <?php if ( $infos['cota_furto_roubo'] <= 0 ) : ?><strong>Cota de Participa????o: </strong><span><?php echo money_format( '%.2n', $infos['cota_par'] ); ?></span><br> <?php endif; ?>
        <?php if ( $infos['cota_furto_roubo'] > 0 ) : ?><strong>Cota de furto e roubo: </strong><span><?php echo money_format( '%.2n', $infos['cota_furto_roubo'] ); ?></span><br> <?php endif; ?> 
      </div>
    </div>
    <div class="row">
      <div class="col pl-5">
        <div class="row-2">
          <div class="col-2-2">
            <h4>Coberturas do Plano</h4>
            <strong>Socorro eletro mec??nico: </strong><br>
            <strong>Retorno domic??lio: </strong><br>
            <strong>Reboque - sinistro: </strong><br>
            <strong>Pneus: </strong><br>
            <strong>combustivel: </strong><br>
            <strong>Guarda ve??culos: </strong><br>
            <strong>Chaveiro: </strong><br>
            <strong>Reboque - pane: </strong><br>
            <strong>Taxi - pane: </strong><br>
            <strong>Hospedagem: </strong><br>
            <strong>Carro reserva: </strong><br>
            <strong>AP (Acidentes pessoais): </strong><br>
            <strong>APP (Acidentes pessoais passageiros): </strong><br>
            <strong>Clube de descontos: </strong><br>
          </div>
          <div class="col-2-2">
            <h4><?php echo ucfirst( $infos['plano'] ); ?></h4>
            <span><?php echo $infos['coberturas']['socorro']; ?></span><br>
            <span><?php echo $infos['coberturas']['retorno']; ?></span><br>
            <span><?php echo $infos['coberturas']['reboque']; ?></span><br>
            <span><?php echo $infos['coberturas']['pneus']; ?></span><br>
            <span><?php echo $infos['coberturas']['combustivel']; ?></span><br>
            <span><?php echo money_format( '%.2n', $infos['coberturas']['guarda'] ); ?></span><br>
            <span><?php echo money_format( '%.2n', $infos['coberturas']['chaveiro'] ); ?></span><br>
            <span><?php echo $infos['coberturas']['reboque_pane']; ?></span><br>
            <span><?php echo money_format( '%.2n', $infos['coberturas']['taxi'] ); ?></span><br>
            <span><?php echo money_format( '%.2n', $infos['coberturas']['hospedagem'] ); ?></span><br>
            <span><?php echo $infos['coberturas']['carro_reserva']; ?></span><br>
            <span><?php echo $infos['coberturas']['ap']; ?></span><br>
            <span><?php echo $infos['coberturas']['app']; ?></span><br>
            <span><?php echo $infos['coberturas']['desconto']; ?></span><br>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col pl-5">
        <h4>Adicionais</h4>
        <small>
          <?php foreach ($infos['adicionais'] as $value) : ?>
            <?php if ($value != "") : ?>
              <span><?php echo '* ' . $value; ?></span><br>
            <?php endif; ?>
          <?php endforeach; ?>
        </small>
      </div>
    </div>
    <div class="row">
      <div class="col pt-1">
        <h3>Garantia e limites</h3>
        <ol class="molde">
        <li><strong>Car??ncia:</strong> Ap??s cadastro na base da SIGA e pagamento da ades??o.</li>
        <li><strong>Socorro el??trico/mec??nico:</strong> Em caso de socorro dentro da cidade onde o ve??culo foi cadastrado, a SIGA providenciar?? o envio de um socorro eletro/mec??nico, para que o ve??culo seja reparado no local onde o ve??culo se encontrar.</li>
        <li><strong>Reboque do ve??culo ap??s pane:</strong> Em caso de pane dentro do hor??rio comercial a SIGA providenciar?? um reboque para que o ve??culo seja levado para uma oficina ou credenciado mais pr??ximo.<br>
          <strong>A assist??ncia n??o far?? translado quando:</strong> O ve??culo j?? se encontrar em oficina, concession??ria ou similares.<br>
          *Ap??s o ve??culo encaminhado para oficina, concession??rias ou similares, n??o sendo reparado N??O caber?? nova solicita????o.</li>
        <li><strong>Reboque ap??s sinistro:</strong> Na ocorr??ncia do acidente, inc??ndio, roubo ou furto do ve??culo, o <strong>Cliente dever??</strong> entrar em contato com a assist??ncia da SIGA, informar os dados do cadastro da empresa ou associa????o conveniada. Ap??s an??lise ser?? fornecido reboque de acordo com a ocorr??ncia. 
          <strong>Importante:</strong> O Cliente ?? respons??vel pela remo????o de eventual carga transportada no ve??culo antes da efetiva????o do reboque.</li>
        <li><strong>Troca de pneus (sugest??o):</strong> Na hip??tese de ocorrerem danos ao (s) pneum??ticos, que impossibilitem a locomo????o dos ve??culos por seus pr??prios meios, a SIGA solicitar?? o servi??o de reboque, para que o ve??culo seja levado a borracharia mais pr??xima respeitando o limite, conforme plano contratado. 
          <strong>Importante:</strong> Todas as despesas para o conserto pneum??tico: pneus, c??mera, bicos, etc., ser??o de responsabilidade do Cliente, exceto a m??o de obra com limite dos valores do plano contratado.</li>
        <li><strong>Aux??lio combust??vel:</strong> Na hip??tese de impossibilidade de locomo????o de ve??culo, por falta de combust??vel, a SIGA providenciar?? o servi??o de reboque para que o mesmo seja levado at?? o posto de combust??vel mais pr??ximo, limite de raio, conforme plano contratado, do local do evento. </li>
        <li><strong>Guarda do ve??culo:</strong> Em atendimento realizado pela assist??ncia 24 horas, e caso seja necess??rio ?? guarda do ve??culo em local apropriado, por n??o haver nenhuma oficina dispon??vel a SIGA, providenciar?? a guarda do ve??culo at?? o limite dos valores do plano contratado, at?? que possa ser efetuada sua remo????o at?? a oficina ou concession??ria mais pr??xima.</li>
        <li><strong>Chaveiro:</strong> Em caso de perda, roubo/furto ou quebra de chaves, bem como fechamento das mesmas no interior do ve??culo, a SIGA enviar?? o servi??o de chaveiro at?? o ve??culo para prestar o atendimento ao Cliente.</li>
        <li><strong>Retorno domic??lio (em sequ??ncia de acidente):</strong> Na ocorr??ncia do acidente, inc??ndio, roubo ou furto do ve??culo previamente atendido pela SIGA, ser?? colocado ?? disposi????o do Cliente e os benefici??rios, (considerando a capacidade de lota????o do ve??culo determinado pela f??brica) transporte alternativo a crit??rio da SIGA, para que possam retornar ou concluir seu destino. 
          <strong>Importante:</strong> Quando o ve??culo do Cliente for destinado a transporte de passageiro (taxi, vans e assemelhados) a SIGA n??o se responsabilizar?? pelo transporte dos passageiros, somente sendo beneficiado o Cliente.  </li>
        <li><strong>T??xi (em sequ??ncia de pane)</strong> ??? Ser?? colocada a disposi????o dos Clientes da SIGA o servi??o de t??xi quando for confirmada a imobiliza????o do ve??culo para reparo por mais de 24 horas ou reembolso previamente autorizado quando o ve??culo se encontrar a mais de 20 km do endere??o cadastrado.</li>
        <li><strong>Hospedagem:</strong> Em caso de evento previamente atendido, a SIGA proporcionar?? ao motorista e seus acompanhantes, respeitando o limite determinado pelo fabricante, estada em hotel com di??ria m??xima no valor, conforme plano contratado, por pessoa, se o conserto do ve??culo n??o puder se realizar no mesmo dia ou caso o retorno domic??lio n??o seja poss??vel devida as condi????es locais. </li>
        <li><strong>Carro Reserva</strong>
          <ol>
            <li>Ter?? direito a quantidade de dias, conforme plano contratado, consecutivos de carro reserva o Cliente que for v??tima de roubo, furto ou acidente, mediante pagamento de participa????o obrigat??ria. </li> 
            <li>O benef??cio se dar?? ap??s a prova????o e o cumprimento das regras definidas pela empresa ou associa????o (no caso a EXCLUSIVA PV exige-se a entrega do Boletim de Ocorr??ncia e o pagamento da participa????o obrigat??ria/franquia e pr??via solicita????o do Cliente com no m??nimo 5 dias de anteced??ncia, salvo em datas comemorativas e feriados que o prazo m??nimo passar?? para 7 (sete) dias de anteced??ncia.</li> 
            <li>A SIGA ?? respons??vel pelo pagamento das di??rias, n??o incluindo outras taxas de qualquer esp??cie.</li> 
            <li><strong>?? de inteira responsabilidade do Cliente a provid??ncia pela cau????o ou outras exig??ncias que eventualmente forem apresentadas pela empresa locadora.</strong></li>
          </ol>
        </li>
        </ol>
      </div>
    </div>
    <div class="part-footer">
      <div class="row">
        <div class="col-2">
          <h3>Participa????o obrigat??ria M??nima:</h3>
          <p>* Franquia Vidros ?? de 30% valor da pe??a, para ve??culos populares, 40% para ve??culos especiais, taxi e PJ e 50% para ve??culos importados, caminhonetes e truck.</p>
        </div>
        <div class="col-2 p-1">
          <h3>&nbsp;</h3>
          <p>*Ve??culo comum R$1.100,00, ve??culo especiais R$1.400,00, caminhonetes e vans R$1.700,00, ultra R$1.900,00, furto e <br>roubo R$2.500,00, truck R$ 4.500,00 <br>e agregado R$ 2.500,00.</p>
        </div>
      </div>
    </div>
    <div id="img-footer-background">
      <img class="img-footer" src="<?php echo $_SERVER["DOCUMENT_ROOT"]. '/wp-content/plugins/orcamento/includes/templates/img/page6.jpg'; ?>" alt="">
      <footer class="bg-blue" style="text-align: center; color: #fff;">
        <small> &copy; <?php echo date('Y');?> Exclusiva PV | Desenvolvido por <a style="color: #203864;" href="http://www.rrsolucoesdigitais.com.br" target="_blank" rel="noopener noreferrer"> Davi Rodrigues </a>
        </small>
      </footer>
    </div>
  </div>
</body>
</html>