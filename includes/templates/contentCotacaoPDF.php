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
        <h3>Dados do Veículo</h3>
        <strong><?php echo $infos['veiculo']; ?></strong><br>
        <strong>Tipo: </strong><span><?php echo ucfirst( $infos['tipo'] ); ?></span><br>
        <strong>Valor da Fipe: </strong><span><?php echo money_format( '%.2n', $infos['valor_veiculo'] ); ?></span><br>
        <strong>Código da Fipe: </strong><span><?php echo $infos['codigo_fipe']; ?></span><br>
      </div>
      <div class="col-3 pl-2">
        <h3>Cotação - <?php echo date('d/m/Y');?></h3>
        <strong>Plano <?php echo ucfirst( $infos['plano'] ); ?></strong> <span><?php echo money_format( '%.2n', $infos['valor_plano'] ); ?><?php echo ( $infos['desconto'] != '' ) ? ' (Desconto de ' . $infos['desconto'] . '%)' : ''; ?></span><br>
        <strong>Valor da Adesão: </strong><span><?php echo money_format( '%.2n', $infos['adesao'] ); ?></span><br>
        <?php if ( $infos['cota_furto_roubo'] <= 0 ) : ?><strong>Cota de Participação: </strong><span><?php echo money_format( '%.2n', $infos['cota_par'] ); ?></span><br> <?php endif; ?>
        <?php if ( $infos['cota_furto_roubo'] > 0 ) : ?><strong>Cota de furto e roubo: </strong><span><?php echo money_format( '%.2n', $infos['cota_furto_roubo'] ); ?></span><br> <?php endif; ?> 
      </div>
    </div>
    <div class="row">
      <div class="col pl-5">
        <div class="row-2">
          <div class="col-2-2">
            <h4>Coberturas do Plano</h4>
            <strong>Socorro eletro mecânico: </strong><br>
            <strong>Retorno domicílio: </strong><br>
            <strong>Reboque - sinistro: </strong><br>
            <strong>Pneus: </strong><br>
            <strong>combustivel: </strong><br>
            <strong>Guarda veículos: </strong><br>
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
        <li><strong>Carência:</strong> Após cadastro na base da SIGA e pagamento da adesão.</li>
        <li><strong>Socorro elétrico/mecânico:</strong> Em caso de socorro dentro da cidade onde o veículo foi cadastrado, a SIGA providenciará o envio de um socorro eletro/mecânico, para que o veículo seja reparado no local onde o veículo se encontrar.</li>
        <li><strong>Reboque do veículo após pane:</strong> Em caso de pane dentro do horário comercial a SIGA providenciará um reboque para que o veículo seja levado para uma oficina ou credenciado mais próximo.<br>
          <strong>A assistência não fará translado quando:</strong> O veículo já se encontrar em oficina, concessionária ou similares.<br>
          *Após o veículo encaminhado para oficina, concessionárias ou similares, não sendo reparado NÃO caberá nova solicitação.</li>
        <li><strong>Reboque após sinistro:</strong> Na ocorrência do acidente, incêndio, roubo ou furto do veículo, o <strong>Cliente deverá</strong> entrar em contato com a assistência da SIGA, informar os dados do cadastro da empresa ou associação conveniada. Após análise será fornecido reboque de acordo com a ocorrência. 
          <strong>Importante:</strong> O Cliente é responsável pela remoção de eventual carga transportada no veículo antes da efetivação do reboque.</li>
        <li><strong>Troca de pneus (sugestão):</strong> Na hipótese de ocorrerem danos ao (s) pneumáticos, que impossibilitem a locomoção dos veículos por seus próprios meios, a SIGA solicitará o serviço de reboque, para que o veículo seja levado a borracharia mais próxima respeitando o limite, conforme plano contratado. 
          <strong>Importante:</strong> Todas as despesas para o conserto pneumático: pneus, câmera, bicos, etc., serão de responsabilidade do Cliente, exceto a mão de obra com limite dos valores do plano contratado.</li>
        <li><strong>Auxílio combustível:</strong> Na hipótese de impossibilidade de locomoção de veículo, por falta de combustível, a SIGA providenciará o serviço de reboque para que o mesmo seja levado até o posto de combustível mais próximo, limite de raio, conforme plano contratado, do local do evento. </li>
        <li><strong>Guarda do veículo:</strong> Em atendimento realizado pela assistência 24 horas, e caso seja necessário à guarda do veículo em local apropriado, por não haver nenhuma oficina disponível a SIGA, providenciará a guarda do veículo até o limite dos valores do plano contratado, até que possa ser efetuada sua remoção até a oficina ou concessionária mais próxima.</li>
        <li><strong>Chaveiro:</strong> Em caso de perda, roubo/furto ou quebra de chaves, bem como fechamento das mesmas no interior do veículo, a SIGA enviará o serviço de chaveiro até o veículo para prestar o atendimento ao Cliente.</li>
        <li><strong>Retorno domicílio (em sequência de acidente):</strong> Na ocorrência do acidente, incêndio, roubo ou furto do veículo previamente atendido pela SIGA, será colocado à disposição do Cliente e os beneficiários, (considerando a capacidade de lotação do veículo determinado pela fábrica) transporte alternativo a critério da SIGA, para que possam retornar ou concluir seu destino. 
          <strong>Importante:</strong> Quando o veículo do Cliente for destinado a transporte de passageiro (taxi, vans e assemelhados) a SIGA não se responsabilizará pelo transporte dos passageiros, somente sendo beneficiado o Cliente.  </li>
        <li><strong>Táxi (em sequência de pane)</strong> – Será colocada a disposição dos Clientes da SIGA o serviço de táxi quando for confirmada a imobilização do veículo para reparo por mais de 24 horas ou reembolso previamente autorizado quando o veículo se encontrar a mais de 20 km do endereço cadastrado.</li>
        <li><strong>Hospedagem:</strong> Em caso de evento previamente atendido, a SIGA proporcionará ao motorista e seus acompanhantes, respeitando o limite determinado pelo fabricante, estada em hotel com diária máxima no valor, conforme plano contratado, por pessoa, se o conserto do veículo não puder se realizar no mesmo dia ou caso o retorno domicílio não seja possível devida as condições locais. </li>
        <li><strong>Carro Reserva</strong>
          <ol>
            <li>Terá direito a quantidade de dias, conforme plano contratado, consecutivos de carro reserva o Cliente que for vítima de roubo, furto ou acidente, mediante pagamento de participação obrigatória. </li> 
            <li>O benefício se dará após a provação e o cumprimento das regras definidas pela empresa ou associação (no caso a EXCLUSIVA PV exige-se a entrega do Boletim de Ocorrência e o pagamento da participação obrigatória/franquia e prévia solicitação do Cliente com no mínimo 5 dias de antecedência, salvo em datas comemorativas e feriados que o prazo mínimo passará para 7 (sete) dias de antecedência.</li> 
            <li>A SIGA é responsável pelo pagamento das diárias, não incluindo outras taxas de qualquer espécie.</li> 
            <li><strong>É de inteira responsabilidade do Cliente a providência pela caução ou outras exigências que eventualmente forem apresentadas pela empresa locadora.</strong></li>
          </ol>
        </li>
        </ol>
      </div>
    </div>
    <div class="part-footer">
      <div class="row">
        <div class="col-2">
          <h3>Participação obrigatória Mínima:</h3>
          <p>* Franquia Vidros é de 30% valor da peça, para veículos populares, 40% para veículos especiais, taxi e PJ e 50% para veículos importados, caminhonetes e truck.</p>
        </div>
        <div class="col-2 p-1">
          <h3>&nbsp;</h3>
          <p>*Veículo comum R$1.100,00, veículo especiais R$1.400,00, caminhonetes e vans R$1.700,00, ultra R$1.900,00, furto e <br>roubo R$2.500,00, truck R$ 4.500,00 <br>e agregado R$ 2.500,00.</p>
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