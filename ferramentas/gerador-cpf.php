<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-cpf');
ns_render_page_start('tool:gerador-cpf');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Gerador de CPF</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#fde8e8,#ffbbbb)">🪪</div>
      <div>
        <h1>Gerador de CPF</h1>
        <p>Crie CPFs válidos para testes de software, QA, formulários e ambientes educacionais.</p>
        <span class="tag tag-orange">Dev / Teste</span>
      </div>
    </div>
    <div class="notice notice-warn" style="margin-bottom:1.5rem;"><span>⚠️</span><span><strong>Aviso:</strong> uso exclusivo para fins técnicos, educacionais e de desenvolvimento.</span></div>
    <div class="tool-box">
      <div class="form-row"><div class="form-group"><label for="quantidade">Quantidade de CPFs</label><select id="quantidade" class="form-control"><option value="1">1 CPF</option><option value="5" selected>5 CPFs</option><option value="10">10 CPFs</option><option value="20">20 CPFs</option></select></div><div class="form-group"><label for="formato">Formato</label><select id="formato" class="form-control"><option value="formatado">Formatado (000.000.000-00)</option><option value="numeros">Somente Números</option></select></div></div>
      <button class="btn btn-primary btn-block btn-lg" onclick="gerarCPFs()">Gerar CPF</button>
      <div id="resultado-cpf" style="display:none;margin-top:1.5rem;"><div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.75rem;"><span style="font-size:.85rem;font-weight:600;color:var(--text3);">CPFs gerados</span><button class="copy-btn" id="copy-all-btn" onclick="copiarTodos()">Copiar Todos</button></div><div id="lista-cpfs"></div></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
  </div>
</main>
<script>
function gerarDigito(cpfParcial,pesos){let soma=0;for(let i=0;i<pesos.length;i++){soma+=parseInt(cpfParcial[i],10)*pesos[i];}const resto=soma%11;return resto<2?0:11-resto;}
function gerarCPF(formatado){let nums=[];for(let i=0;i<9;i++)nums.push(Math.floor(Math.random()*10));if(nums.every(n=>n===nums[0]))nums[0]=(nums[0]+1)%10;const d1=gerarDigito(nums,[10,9,8,7,6,5,4,3,2]);nums.push(d1);const d2=gerarDigito(nums,[11,10,9,8,7,6,5,4,3,2]);nums.push(d2);const raw=nums.join('');return formatado?`${raw.slice(0,3)}.${raw.slice(3,6)}.${raw.slice(6,9)}-${raw.slice(9,11)}`:raw;}
let cpfsGerados=[];
function gerarCPFs(){const qtd=parseInt(document.getElementById('quantidade').value,10);const fmt=document.getElementById('formato').value==='formatado';cpfsGerados=Array.from({length:qtd},()=>gerarCPF(fmt));document.getElementById('lista-cpfs').innerHTML=cpfsGerados.map(cpf=>`<div style="display:flex;align-items:center;gap:.5rem;padding:.6rem .9rem;background:var(--surface2);border-radius:var(--radius-sm);margin-bottom:.4rem;"><span style="flex:1;font-family:monospace;font-size:1rem;font-weight:700;letter-spacing:1px;">${cpf}</span><button class="copy-btn" onclick="copyToClipboard('${cpf}', this)" style="flex-shrink:0;">Copiar</button></div>`).join('');document.getElementById('resultado-cpf').style.display='block';}
function copiarTodos(){copyToClipboard(cpfsGerados.join('\n'),document.getElementById('copy-all-btn'));}
</script>
<?php ns_render_page_end(); ?>
