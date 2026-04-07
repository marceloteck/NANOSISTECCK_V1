<?php

declare(strict_types=1);

function ns_block9_slugs(): array
{
    return [
        'calculadora-13o-salario','calculadora-amortizacao','calculadora-comissao-vendas','calculadora-custo-efetivo-total','calculadora-custo-oportunidade',
        'calculadora-desconto-comercial','calculadora-ferias','calculadora-giro-estoque','calculadora-hora-extra','calculadora-juros-ao-dia',
        'calculadora-lucro-liquido','calculadora-margem-contribuicao','calculadora-meta-poupanca','calculadora-parcela-price','calculadora-parcela-sac',
        'calculadora-payback','calculadora-ponto-equilibrio-unidades','calculadora-preco-venda','calculadora-rentabilidade-acumulada','calculadora-reserva-emergencia',
        'calculadora-ticket-medio','calculadora-tir','calculadora-valor-futuro','calculadora-valor-presente','calculadora-vpl',
        'calculadora-multa-contratual','calculadora-prazo-processual-simples','calculadora-reajuste-contrato','contador-caracteres-documento','desformatador-cep',
        'desformatador-cnpj','desformatador-cpf','desformatador-telefone','formatador-cep','formatador-cnpj','formatador-cpf','formatador-moeda-brl','formatador-telefone',
        'gerador-ata-reuniao','gerador-carta-formal','gerador-chave-pix-aleatoria','gerador-codigo-barras-fake','gerador-contrato-simples','gerador-declaracao-simples',
        'gerador-numero-pedido','gerador-numero-protocolo','gerador-oficio','gerador-orcamento','gerador-procuracao-simples','gerador-recibo'
    ];
}

function ns_render_block9_tool(string $slug): void
{
    if (!in_array($slug, ns_block9_slugs(), true)) { http_response_code(404); echo 'Ferramenta do bloco 9 não encontrada.'; return; }
    $tool = ns_tool($slug); if (!$tool) { http_response_code(404); echo 'Ferramenta inválida.'; return; }

    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    ?>
<main><div class="tool-page">
  <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($tool['name']) ?></span></nav>
  <?php ns_render_ad_slot('leaderboard'); ?>
  <div class="tool-header"><div class="tool-page-icon" style="background:<?= ns_escape($tool['gradient']) ?>"><?= ns_escape($tool['icon']) ?></div><div><h1><?= ns_escape($tool['name']) ?></h1><p><?= ns_escape($tool['lead']) ?></p><span class="tag tag-green">Finanças/Admin</span></div></div>
  <div class="tool-box">
    <div class="form-row"><div class="form-group"><label for="input-a">Valor A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Valor B</label><input id="input-b" class="form-control" type="text" /></div></div>
    <div class="form-row"><div class="form-group"><label for="input-c">Valor C</label><input id="input-c" class="form-control" type="text" /></div><div class="form-group"><label for="input-text">Texto (geradores/formatadores)</label><textarea id="input-text" class="form-control" style="min-height:90px"></textarea></div></div>
    <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
    <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
    <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre></div>
  </div>
  <?php ns_render_ad_slot('rectangle'); ?>
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const v = (id)=> (document.getElementById(id).value||'').trim();
const n = (id)=> parseFloat(v(id).replace(',','.'));
function err(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function out(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}
function runTool(){
  const a=n('input-a'), b=n('input-b'), c=n('input-c'), txt=v('input-text');
  if(slug.startsWith('formatador-')){ if(!txt){err('Informe texto.');return;} if(slug==='formatador-moeda-brl'){const val=parseFloat(txt.replace(',','.')); if(Number.isNaN(val)){err('Valor inválido.');return;} out(new Intl.NumberFormat('pt-BR',{style:'currency',currency:'BRL'}).format(val)); return;} out(txt.replace(/\D+/g,'').replace(/(\d{5})(\d{3})/,'$1-$2').replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,'$1.$2.$3-$4').replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,'$1.$2.$3/$4-$5')); return; }
  if(slug.startsWith('desformatador-')){ if(!txt){err('Informe texto.');return;} out(txt.replace(/\D+/g,'')); return; }
  if(slug.startsWith('gerador-')){
    if(slug==='gerador-chave-pix-aleatoria'){const chars='abcdefghijklmnopqrstuvwxyz0123456789';let k='';for(let i=0;i<32;i++)k+=chars[Math.floor(Math.random()*chars.length)];out(k);return;}
    if(slug==='gerador-codigo-barras-fake'){let c='';for(let i=0;i<44;i++)c+=Math.floor(Math.random()*10);out(c);return;}
    if(slug==='gerador-numero-pedido' || slug==='gerador-numero-protocolo'){out(String(Date.now()));return;}
    if(slug==='gerador-recibo' || slug==='gerador-orcamento' || slug==='gerador-oficio' || slug==='gerador-carta-formal' || slug==='gerador-declaracao-simples' || slug==='gerador-procuracao-simples' || slug==='gerador-ata-reuniao' || slug==='gerador-contrato-simples'){const nome=v('input-a')||'Cliente';const valor=v('input-b')||'0,00';out(`${slug.replace('gerador-','').replace(/-/g,' ').toUpperCase()}\n\nInteressado: ${nome}\nValor: ${valor}\nData: ${new Date().toLocaleDateString('pt-BR')}`);return;}
  }
  if(slug==='contador-caracteres-documento'){out(`Caracteres: ${txt.length}\nSem espaços: ${txt.replace(/\s+/g,'').length}`);return;}
  if(slug==='calculadora-13o-salario'){if(Number.isNaN(a)){err('Informe salário.');return;} out((a).toFixed(2));return;}
  if(slug==='calculadora-amortizacao'){if([a,b].some(Number.isNaN)||b<=0){err('Informe saldo e amortização.');return;} out(`Saldo após amortização: ${(a-b).toFixed(2)}`);return;}
  if(slug==='calculadora-comissao-vendas'){if([a,b].some(Number.isNaN)){err('Informe vendas e taxa %.');return;} out(`Comissão: ${(a*(b/100)).toFixed(2)}`);return;}
  if(slug==='calculadora-custo-efetivo-total'){if([a,b,c].some(Number.isNaN)){err('Informe principal, juros e taxas.');return;} out(`CET estimado: ${(((b+c)/a)*100).toFixed(2)}%`);return;}
  if(slug==='calculadora-custo-oportunidade'){if([a,b].some(Number.isNaN)){err('Informe retorno atual e alternativo.');return;} out(`Custo de oportunidade: ${(b-a).toFixed(2)}`);return;}
  if(slug==='calculadora-desconto-comercial'){if([a,b].some(Number.isNaN)){err('Informe valor e taxa %.');return;} out(`Valor líquido: ${(a-(a*b/100)).toFixed(2)}`);return;}
  if(slug==='calculadora-ferias'){if(Number.isNaN(a)){err('Informe salário.');return;} out(`Férias + 1/3: ${(a*1.333333).toFixed(2)}`);return;}
  if(slug==='calculadora-giro-estoque'){if([a,b].some(Number.isNaN)||b<=0){err('Informe CMV e estoque médio.');return;} out(`Giro de estoque: ${(a/b).toFixed(2)}`);return;}
  if(slug==='calculadora-hora-extra'){if([a,b].some(Number.isNaN)){err('Informe valor hora e quantidade.');return;} out(`Total hora extra: ${(a*b*1.5).toFixed(2)}`);return;}
  if(slug==='calculadora-juros-ao-dia'){if([a,b,c].some(Number.isNaN)){err('Informe principal, taxa diária e dias.');return;} out(`Montante: ${(a*(1+(b/100)*c)).toFixed(2)}`);return;}
  if(slug==='calculadora-lucro-liquido'){if([a,b,c].some(Number.isNaN)){err('Informe receita, custos e impostos.');return;} out(`Lucro líquido: ${(a-b-c).toFixed(2)}`);return;}
  if(slug==='calculadora-margem-contribuicao'){if([a,b].some(Number.isNaN)||a<=0){err('Informe receita e custo variável.');return;} out(`Margem contribuição: ${(((a-b)/a)*100).toFixed(2)}%`);return;}
  if(slug==='calculadora-meta-poupanca'){if([a,b].some(Number.isNaN)||b<=0){err('Informe objetivo e meses.');return;} out(`Aporte mensal: ${(a/b).toFixed(2)}`);return;}
  if(slug==='calculadora-parcela-price'){if([a,b,c].some(Number.isNaN)||c<=0){err('Informe valor, juros% e meses.');return;} const i=b/100; const p=i===0?a/c:(a*i)/(1-Math.pow(1+i,-c)); out(`Parcela Price: ${p.toFixed(2)}`);return;}
  if(slug==='calculadora-parcela-sac'){if([a,b,c].some(Number.isNaN)||c<=0){err('Informe valor, juros% e meses.');return;} const amort=a/c; const primeira=amort+a*(b/100); out(`1ª parcela SAC: ${primeira.toFixed(2)}\nAmortização fixa: ${amort.toFixed(2)}`);return;}
  if(slug==='calculadora-payback'){if([a,b].some(Number.isNaN)||b<=0){err('Informe investimento e retorno mensal.');return;} out(`Payback: ${(a/b).toFixed(1)} meses`);return;}
  if(slug==='calculadora-ponto-equilibrio-unidades'){if([a,b,c].some(Number.isNaN)||b<=c){err('Informe custo fixo, preço e custo variável.');return;} out(`Ponto de equilíbrio: ${(a/(b-c)).toFixed(2)} unidades`);return;}
  if(slug==='calculadora-preco-venda'){if([a,b].some(Number.isNaN)||b>=100){err('Informe custo e margem %.');return;} out(`Preço de venda: ${(a/(1-b/100)).toFixed(2)}`);return;}
  if(slug==='calculadora-rentabilidade-acumulada'){if([a,b].some(Number.isNaN)){err('Informe capital e retorno.');return;} out(`Rentabilidade: ${((b/a-1)*100).toFixed(2)}%`);return;}
  if(slug==='calculadora-reserva-emergencia'){if([a,b].some(Number.isNaN)){err('Informe gasto mensal e meses.');return;} out(`Reserva recomendada: ${(a*b).toFixed(2)}`);return;}
  if(slug==='calculadora-ticket-medio'){if([a,b].some(Number.isNaN)||b<=0){err('Informe faturamento e número de vendas.');return;} out(`Ticket médio: ${(a/b).toFixed(2)}`);return;}
  if(slug==='calculadora-tir'){if([a,b].some(Number.isNaN)||a<=0){err('Informe investimento e retorno.');return;} out(`TIR aproximada: ${(((b-a)/a)*100).toFixed(2)}%`);return;}
  if(slug==='calculadora-valor-futuro'){if([a,b,c].some(Number.isNaN)){err('Informe principal, taxa% e períodos.');return;} out(`Valor futuro: ${(a*Math.pow(1+b/100,c)).toFixed(2)}`);return;}
  if(slug==='calculadora-valor-presente'){if([a,b,c].some(Number.isNaN)){err('Informe futuro, taxa% e períodos.');return;} out(`Valor presente: ${(a/Math.pow(1+b/100,c)).toFixed(2)}`);return;}
  if(slug==='calculadora-vpl'){if([a,b,c].some(Number.isNaN)){err('Informe fluxo, taxa% e períodos.');return;} out(`VPL simplificado: ${(a/Math.pow(1+b/100,c)-a).toFixed(2)}`);return;}
  if(slug==='calculadora-multa-contratual' || slug==='calculadora-reajuste-contrato'){if([a,b].some(Number.isNaN)){err('Informe valor e taxa%.');return;} out(`Resultado: ${(a*(1+b/100)).toFixed(2)}`);return;}
  if(slug==='calculadora-prazo-processual-simples'){if([a,b].some(Number.isNaN)){err('Informe dias iniciais e adicionais.');return;} out(`Prazo total: ${Math.floor(a+b)} dias`);return;}
  err('Preencha os campos necessários para esta ferramenta.');
}
function clearTool(){['input-a','input-b','input-c','input-text'].forEach(id=>document.getElementById(id).value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){err('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
