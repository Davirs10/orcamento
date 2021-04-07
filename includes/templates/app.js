document.querySelector("#gera_oportunidade").disabled = true;
let config_funil = null;
fetch(`https://${location.hostname}/wp-json/orcamento/v1/funil`, {
method: 'GET',
headers: new Headers({
  'Accept': 'application/json',
  "Content-Type": "application/json"
}),
}).then(response => {
  response.json().then(data => { 
    config_funil = data;
    document.querySelector("#gera_oportunidade").disabled = false;
  } );
});

if(window.location.host) {
  const tipo        = document.getElementById('tipo');
  const marca       = document.getElementById('marcaValue');
  const modelo      = document.getElementById('modeloValue');
  const ano         = document.getElementById('anoValue');
  const valor       = document.getElementById('precoValue');
  const fipe_codigo = document.getElementById('fipe_codigo');
  marca.value = '';
  modelo.value = '';
  ano.value = '';
  valor.value = '';
  fipe_codigo.value = '';
  
  async function apiFipe(urlApi) {
    let response = await fetch(urlApi);
    let data = await response.json();
    return data;  
  }
  
  function setValor(type, urlApi) {
    apiFipe(urlApi).then(data => {
      if(type != 'preco') {
        document.getElementById(type).innerHTML = '';
        data.forEach(element => {
          document.getElementById(type).innerHTML += `<option id="${element.id}" value="${element.name}" class="">${element.name}</option>`;
        });
      } else {
        document.getElementById('ano_fabricacao').value = data.ano_modelo;
        valor.value = data.preco;
        fipe_codigo.value = data.fipe_codigo;
      }
    }); 
  }
  
  function comparaValue(datalist, value) {
    for(let element of datalist) {
      if(element.value === value) {
        return element.id;
      }
    }
    return;
  }
  
  function prepare(idhtml) {
    let datalist = document.getElementById(`${idhtml}`);
    let value = document.getElementById(`${idhtml}Value`).value;
    return comparaValue(datalist.children, value);
  }

  let time = setInterval(() => {
    if (config_funil != null) {
      
      clearInterval( time );

      let tp = 1;
      let apikey = config_funil.key_api_fipe;
      let urlApi = `https://api.fipeapi.com.br/v1/${tp}?${apikey}`;
    
      setValor('marca', urlApi);
    
      tipo.onchange = () => {
        marca.value = '';
        modelo.value = '';
        ano.value = '';
        valor.value = '';
        fipe_codigo.value = '';
        tp = (tipo.value == "moto") ? 2 : (tipo.value == "truck") ? 3 : 1;
        let urlApi = `https://api.fipeapi.com.br/v1/${tp}?${apikey}`;
        setValor('marca', urlApi);
      }
    
      marca.onchange = () => {
        modelo.value = '';
        let ID = prepare('marca');
        let urlApi = `https://api.fipeapi.com.br/v1/${tp}/${ID}?${apikey}`;
        setValor('modelo', urlApi);
      }
      
      modelo.onchange = () => {
        ano.value = '';
        let marcaID = prepare('marca');
        let modeloID = prepare('modelo');
        let urlApi = `https://api.fipeapi.com.br/v1/${tp}/${marcaID}/${modeloID}?${apikey}`;
        setValor('ano', urlApi);
      }
      
      ano.onchange = () => {
        valor.value = '';
        let marcaID = prepare('marca');
        let modeloID = prepare('modelo');
        let anoID = prepare('ano');
        let urlApi = `https://api.fipeapi.com.br/v1/${tp}/${marcaID}/${modeloID}/${anoID}?${apikey}`;
        setValor('preco', urlApi);
      }
    }
  }, 200);

  
}

let setValForms = () => {
  return {
    "tipo": document.querySelector("#tipo").value,
    "veiculo": document.querySelector("#marcaValue").value + " " + document.querySelector("#modeloValue").value,
    "valor": document.querySelector("#precoValue").value.replace("R$",""),
    "codigo_fipe": document.querySelector("#fipe_codigo").value,
    "cod_vendedor": document.querySelector("#cod_vendedor").value,
    "nome": document.querySelector("#nome").value,
    "email": document.querySelector("#email").value,
    "canal_vendas": document.querySelector("#canal_vendas").value,
    "telefone": document.querySelector("#telefone").value,
    "plano": document.querySelector("#plano").value,
    "desconto": document.querySelector("#desconto").value,
    "furto_roubo": `${document.querySelector("#furto_roubo").checked}`,
    "acidentes_pessoais_premiado": `${document.querySelector("#acidentes_pessoais_premiado").checked}`,
    "clube_vantagens": `${document.querySelector("#clube_vantagens").checked}`,
    "acidentes_passageiros_10": `${document.querySelector("#acidentes_passageiros_10").checked}`,
    "sistema_rastreamento": `${document.querySelector("#sistema_rastreamento").checked}`,
    "sistema_rastreamento_bloqueio": `${document.querySelector("#sistema_rastreamento_bloqueio").checked}`,
    "reboque_100": `${document.querySelector("#reboque_100").checked}`,
    "carro_reserva_5": `${document.querySelector("#carro_reserva_5").checked}`,
    "cobertura_terceiros_5": `${document.querySelector("#cobertura_terceiros_5").checked}`,
  }
}

let clearMoneyMask = (element) => {
  let e = element.replace(".","");
  let e2 = e.replace(",",".");
  let e3 = e2.replace("R$","");
  return parseFloat(e3);
}

let adesao = 0;

function setOportunity() {
  let formData = setValForms();
  return {
    "oportunidades": [
      {
        "titulo": formData.nome + " | " + formData.veiculo,
        "valor": adesao,
        "codigo_vendedor":formData.cod_vendedor,
        "codigo_metodologia":10519,
        "codigo_etapa":47976,
        "codigo_canal_venda":formData.canal_vendas,
        "empresa": {
          "nome":formData.nome,
          "cnpj":"",
          "ie":"",
          "segmento":"",
          "endereco_completo": {
            "logradouro":"",
            "numero":"",
            "complemento":"",
            "bairro":"",
            "cidade":"",
            "uf":"",
            "cep":""
          }
        },
        "contato":
        {
          "nome":formData.nome,
          "email":formData.email,
          "telefone1":formData.telefone,
          "telefone2":"",
          "cargo":"",
          "cpf":""
        }
      }
    ]
  }
  
}

let loader = document.querySelector(".loader");

function downloadPdf() {
  let fnGetFileNameFromContentDispostionHeader = function (header) {
    let contentDispostion = header.split(';');
    const fileNameToken = `filename*=UTF-8''`;
    
    let fileName = 'downloaded.pdf';
    for (let thisValue of contentDispostion) {
      if (thisValue.trim().indexOf(fileNameToken) === 0) {
        fileName = decodeURIComponent(thisValue.trim().replace(fileNameToken, ''));
        break;
      }
    }
    
    return fileName;
  };
  
  let postInfo = {
    id: 0,
    name: 'foo'
  };
  
  let headers = new Headers();
  headers.append('Content-Type', 'application/json');
  
  fetch(`https://${location.hostname}/wp-json/orcamento/v1/pdf`, {
  method: 'POST',
  headers: headers,
  body: JSON.stringify( setValForms() )
})
.then(async res => ({
  filename: fnGetFileNameFromContentDispostionHeader(res.headers.get('content-disposition')),
  blob: await res.blob()
}))
.then(resObj => {
  // It is necessary to create a new blob object with mime-type explicitly set for all browsers except Chrome, but it works for Chrome too.
  const newBlob = new Blob([resObj.blob], { type: 'application/pdf' });
  
  // MS Edge and IE don't allow using a blob object directly as link href, instead it is necessary to use msSaveOrOpenBlob
  if (window.navigator && window.navigator.msSaveOrOpenBlob) {
    window.navigator.msSaveOrOpenBlob(newBlob);
  } else {
    // For other browsers: create a link pointing to the ObjectURL containing the blob.
    const objUrl = window.URL.createObjectURL(newBlob);
    
    let link = document.createElement('a');
    link.href = objUrl;
    link.download = resObj.filename;
    link.click();
    
    // For Firefox it is necessary to delay revoking the ObjectURL.
    setTimeout(() => { window.URL.revokeObjectURL(objUrl); }, 250);
    document.querySelector("#cotacao").classList.remove("loader-hidden");
    loader.classList.remove('loader-active');
  }
})
.catch((error) => {
  console.log('DOWNLOAD ERROR', error);
});
}

function sendOportunity() {
  let inter = setInterval(() => {
    if (config_funil != null) {
      clearInterval(inter);
      let url = `https://app.funildevendas.com.br/api/opportunity?IntegrationKey=${config_funil.token}`;
      fetch(url, {
        method: 'POST',
        headers: new Headers({
          'Accept': 'application/json',
          "Content-Type": "application/json"
        }),
        body: JSON.stringify( setOportunity() ),
      }).then(response => {
        response.json();
      });
    }
  }, 200);  
}

function calcOrcamento() {
  let headers = new Headers();
  headers.append('Content-Type', 'application/json');
  fetch(`https://${location.hostname}/wp-json/orcamento/v1/tabela_precos`, {
    method: 'POST',
    headers: headers,
    body: JSON.stringify( setValForms() ),
  }).then(response => {
    response.json().then(data => {
      adesao = data.adesao;
      sendOportunity();
    })
  })
}

document.querySelector("#gera_oportunidade").addEventListener("click", () => {
  loader.st
  calcOrcamento()
  downloadPdf();
  document.querySelector("#cotacao").classList.add("loader-hidden");
  loader.classList.add('loader-active');
})

// mascara telefone
let tel = document.querySelector("#telefone");
tel.onkeyup = function() {
  let value = '';
  for(var i = 0; i < tel.value.length; i++) {
    if(tel.value.charAt(i) != ' ' && tel.value.charAt(i) != '-' && tel.value.charAt(i) != '+'  && tel.value.charAt(i) != '('  && tel.value.charAt(i) != ')') {
      value += tel.value.charAt(i);
    }
  }
  if(value.length <= 11) {
    tel.value = '';
    for(var i = 0; i < value.length; i++) {
      if(i == 0) {
        tel.value += '(';
      }
      if(i == 2) {
        tel.value += ') ';
      }
      if(i == value.length - 4 && i > 2) {
        tel.value += ' ';
      }
      tel.value += value.charAt(i);
    }
  } else if (value.length > 11) {
    tel.value = null;
  }
}
