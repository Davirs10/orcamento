<form action="" method="post" autocomplete="off">
    <div class="loader">
        <ul id="loading" >
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
            <li class="loading-child"><div></div></li>
        </ul>
        <h4>Aguarde! <br> Estamos gerando sua cotação...</h4>
    </div>
    <section id="cotacao" class="">
        <div id="modeloFipe" class="container-fluid bg-light d-none">
            <div class="row">
                <div class="col pb-3">
                    <pre><?php // var_dump(  ) ); ?></pre>
                    <h3 class="text-blue text-center text-uppercase">Dados do Veículo</span>
                </div>
            </div>
            <div class="row form-exclusiva d-flex justify-content-center d-none">
            <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="exclusiva-input">
                       <select required name="tipo" id="tipo">
                        <option value="">Selecione o Tipo de Veículo...</option>
                        <option value="passeio">Passeio</option>
                        <option value="especial">Especial</option>
                        <option value="caminhonete">Caminhonete</option>
                        <option value="vans">Vans</option>
                        <option value="ultra">Ultra</option>
                        <option value="truck">Truck</option>
                        <option value="moto">Moto</option>
                       </select>
                    </div>
                    <div class="exclusiva-input">
                        <input required type="text" name="marca" list="marca" id="marcaValue" placeholder="Marca">
                        <datalist name="marca" id="marca">

                        </datalist>
                    </div>
                    <div class="exclusiva-input">
                        <input required type="text" name="modelo" list="modelo" id="modeloValue"
                            placeholder="Modelo">
                        <datalist name="modelo" id="modelo">

                        </datalist>
                    </div>
                    <div class="exclusiva-input">
                        <input required type="text" name="ano" list="ano" id="anoValue" placeholder="Ano/Modelo">
                        <datalist name="ano" id="ano">

                        </datalist>
                    </div>
                    <div class="exclusiva-input">
                        <input required type="text" name="ano_fabricacao" id="ano_fabricacao" placeholder="Ano de Fabricação">
                    </div>
                    <div class="exclusiva-input">
                        <input type="text" name="preco" id="precoValue" placeholder="Valor">
                        <input type="text" name="fipe_codigo" id="fipe_codigo" hidden="true">
                        <input type="text" name="cod_vendedor" id="cod_vendedor" hidden="true" value="<?php echo get_the_author_meta( 'cod_vendedor_funil', get_current_user_id() ); ?>">
                    </div>
                    <div class="exclusiva-input">
                        <input required type="number" min="0" max="<?php echo (get_the_author_meta( 'desc_10', get_current_user_id() ) != '') ? get_the_author_meta( 'desc_10', get_current_user_id() ) : '10'; ?>" name="desconto" id="desconto" placeholder="Desconto (%)">
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div id="planos" class="exclusiva-input">
                                    <select required name="plano" id="plano">
                                        <option value="">Selecione o Tipo de Plano...</option>
                                        <option value="truck">Truck</option>
                                        <option value="agregado">Agregado</option>
                                        <option value="prime">Prime</option>
                                        <option value="platinum">Platinum</option>
                                        <option value="gold">Gold</option>
                                        <option value="moto">Moto</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="dis-flex-col">
                                <input type="checkbox" class="" name="truck" id="truck">
                                <label for="truck">Truck</label><br>
                                <input type="checkbox" class="" name="agregado" id="agregado">
                                <label for="agregado">Agregado</label><br>
                                <input type="checkbox" class="" name="prime" id="prime">
                                <label for="prime">Prime</label><br>
                                <input type="checkbox" class="" name="platinum" id="platinum">
                                <label for="platinum">Platinum</label><br>
                                <input type="checkbox" class="" name="gold" id="gold">
                                <label for="gold">Gold</label><br>
                                <input type="checkbox" class="" name="moto" id="moto">
                                <label for="moto">Moto</label><br>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pb-3">
                            <h3 class="text-blue text-center text-uppercase">Funil de vendas</span>
                        </div>
                    </div>
                    <div class="exclusiva-input">
                       <select required name="canal_vendas" id="canal_vendas">
                        <option value="">Selecione o canal de Vendas...</option>
                        <option value="65255">ANÚNCIO TV</option>
                        <option value="68415">CAPTAÇÃO DESPACHANTE ZONA SUL / NATHALIA</option>
                        <option value="68352">CAPTAÇÃO DESPACHANTE ZONA SUL / RAQUEL</option>
                        <option value="65107">CAPTAÇÃO POSTO CAMPESTRINHO</option>
                        <option value="65106">CAPTAÇÃO POSTO DIVISAS</option>
                        <option value="65256">CAPTADORES</option>
                        <option value="65103">FEIRAS E EVENTOS</option>
                        <option value="65105">GOOGLE</option>
                        <option value="65553">GRUPOS DE WHATSAPP</option>
                        <option value="65104">INDICAÇÃO</option>
                        <option value="65254">MCV</option>
                        <option value="65253">PARCEIROS</option>
                        <option value="68192">REATIVAÇÃO DE INATIVO</option>
                        <option value="65168">REDES SOCIAIS</option>
                       </select>
                    </div>
                    <div class="exclusiva-input">
                        <input type="checkbox" name="furto_roubo" id="furto_roubo">
                        <label for="furto_roubo">Furto e Roubo</label>
                    </div>
                    <div class="row">
                        <div class="col pb-3">
                            <h3 class="text-blue text-center text-uppercase">Adicionais</span>
                        </div>
                    </div>
                    <div class="exclusiva-input">
                        <div class="exclusiva-input">
                            <div class="dis-flex">
                                <div class="dis-flex-col">
                                    <input type="checkbox" class="" name="acidentes_pessoais_premiado" checked id="acidentes_pessoais_premiado">
                                    <label for="acidentes_pessoais_premiado">Acidentes pessoais premiado (R$2,00)</label><br>
                                    <input type="checkbox" class="" name="clube_vantagens" checked id="clube_vantagens">
                                    <label for="clube_vantagens">Clube de vantagens (R$2,00)</label><br>
                                    <input type="checkbox" class="" name="acidentes_passageiros_10" id="acidentes_passageiros_10">
                                    <label for="acidentes_passageiros_10">Acidentes passageiros 10 mil (R$10,00)</label><br>
                                    <input type="checkbox" class="" name="sistema_rastreamento" id="sistema_rastreamento">
                                    <label for="sistema_rastreamento">Sistema de Rastreamento (R$30,00)</label><br>
                                </div>
                                <div class="dis-flex-col">
                                    <input type="checkbox" class="" name="sistema_rastreamento_bloqueio" id="sistema_rastreamento_bloqueio">
                                    <label for="sistema_rastreamento_bloqueio">Sistema de Rastreamento c/ bloqueio (R$49,90)</label><br>
                                    <input type="checkbox" class="" name="reboque_100" id="reboque_100">
                                    <label for="reboque_100">Reboque + 100 km (R$10,00)</label><br>
                                    <input type="checkbox" class="" name="carro_reserva_5" id="carro_reserva_5">
                                    <label for="carro_reserva_5">Carro reserva 5 dias (R$10,00)</label><br>
                                    <input type="checkbox" class="" name="cobertura_terceiros_5" id="cobertura_terceiros_5">
                                    <label for="cobertura_terceiros_5">Coberturas terceiros + 5 mil (R$9,90)</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col pb-3">
                <h3 class="text-blue text-center text-uppercase">Dados do Cliente!</span>
            </div>
        </div>
        <div id="dadosPessoais" class="container-fluid bg-light p-3 d-none">
            <div class="row form-exclusiva d-flex justify-content-center pt-3 pb-3">
                <div class="col-sm-6">
                    <div class="exclusiva-input">
                        <input id="nome" class="" required type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="exclusiva-input">
                        <input id="email" class="" type="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="exclusiva-input">
                        <input id="telefone" class="" required type="text" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="buttons-form pt-3 d-flex justify-content-end">
                        <button id="gera_oportunidade" class="btn btn-primary p-2" type="button">Gerar Cotação</button>
                        <button id="btn-reset" type="reset" class="btn btn-alert p-2">Limpar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>