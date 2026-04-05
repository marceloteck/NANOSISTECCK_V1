<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-senhas');
ns_render_page_start('tool:gerador-senhas');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Gerador de Senhas</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8eaff,#c5caff)">🔐</div>
      <div>
        <h1>Gerador de Senhas Fortes</h1>
        <p>Crie senhas seguras com comprimento, tipos de caracteres e quantidade ajustáveis.</p>
        <span class="tag tag-blue">Segurança</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-group"><label>Senha Gerada</label><div style="display:flex;gap:.5rem;align-items:center;"><input type="text" id="senha-output" class="form-control" readonly placeholder="Clique em gerar..." style="font-family:monospace;font-size:1.1rem;font-weight:600;letter-spacing:1px;" /><button class="copy-btn" id="copy-btn" onclick="copiarSenha()" style="flex-shrink:0;padding:.7rem 1rem;">Copiar</button></div></div>
      <div id="forca-container" style="display:none;margin-bottom:1.25rem;"><div style="font-size:.8rem;font-weight:600;color:var(--text3);margin-bottom:.35rem;">Força da Senha: <span id="forca-label">—</span></div><div style="height:6px;background:var(--border);border-radius:50px;overflow:hidden;"><div id="forca-bar" style="height:100%;border-radius:50px;transition:width .3s ease,background .3s ease;width:0%;"></div></div></div>
      <div class="form-group"><label for="tamanho">Tamanho: <span id="tamanho-label">16</span> caracteres</label><input type="range" id="tamanho" min="4" max="64" value="16" oninput="atualizarTamanho()" style="width:100%;accent-color:var(--primary);cursor:pointer;" /></div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1.25rem;"><label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;"><input type="checkbox" id="maiusculas" checked /> Letras Maiúsculas</label><label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;"><input type="checkbox" id="minusculas" checked /> Letras Minúsculas</label><label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;"><input type="checkbox" id="numeros" checked /> Números</label><label style="display:flex;align-items:center;gap:.5rem;font-size:.9rem;"><input type="checkbox" id="simbolos" /> Símbolos</label></div>
      <div class="form-group"><label for="qtd-senhas">Quantidade</label><select id="qtd-senhas" class="form-control"><option value="1" selected>1 senha</option><option value="5">5 senhas</option><option value="10">10 senhas</option></select></div>
      <button class="btn btn-primary btn-block btn-lg" onclick="gerarSenhas()">Gerar Senha</button>
      <div id="lista-senhas" style="display:none;margin-top:1.25rem;"></div>
    </div>
    <div class="notice notice-success"><span>🔒</span><span>Todas as senhas são geradas localmente no navegador.</span></div>
    <?php ns_render_ad_slot('rectangle'); ?>
  </div>
</main>
<script>
const CHARS={mai:'ABCDEFGHIJKLMNOPQRSTUVWXYZ',min:'abcdefghijklmnopqrstuvwxyz',num:'0123456789',sim:'!@#$%^&*()_+-=[]{}|;:,.<>?'};
function atualizarTamanho(){document.getElementById('tamanho-label').textContent=document.getElementById('tamanho').value;}
function calcularForca(senha){let score=0;if(senha.length>=8)score++;if(senha.length>=12)score++;if(senha.length>=16)score++;if(/[A-Z]/.test(senha))score++;if(/[a-z]/.test(senha))score++;if(/[0-9]/.test(senha))score++;if(/[^A-Za-z0-9]/.test(senha))score++;return score;}
function gerarUmaSenha(){const tamanho=parseInt(document.getElementById('tamanho').value,10);let charset='';if(document.getElementById('maiusculas').checked)charset+=CHARS.mai;if(document.getElementById('minusculas').checked)charset+=CHARS.min;if(document.getElementById('numeros').checked)charset+=CHARS.num;if(document.getElementById('simbolos').checked)charset+=CHARS.sim;if(!charset){alert('Selecione ao menos um tipo de caractere.');return null;}let senha='';const arr=new Uint32Array(tamanho);window.crypto.getRandomValues(arr);for(let k=0;k<tamanho;k++){senha+=charset[arr[k]%charset.length];}return senha;}
function gerarSenhas(){const qtd=parseInt(document.getElementById('qtd-senhas').value,10);if(qtd===1){const s=gerarUmaSenha();if(!s)return;const score=calcularForca(s);const niveis=['','Muito Fraca','Fraca','Razoável','Boa','Forte','Muito Forte','Excelente'];const cores=['','#e53e3e','#e53e3e','#e67e22','#f1c40f','#2ecc71','#27ae60','#1a7fcf'];const pct=Math.round((score/7)*100);document.getElementById('senha-output').value=s;document.getElementById('forca-container').style.display='block';document.getElementById('forca-label').textContent=niveis[score]||'Forte';document.getElementById('forca-bar').style.width=pct+'%';document.getElementById('forca-bar').style.background=cores[score]||'#1a73e8';document.getElementById('lista-senhas').style.display='none';return;}const senhas=Array.from({length:qtd},()=>gerarUmaSenha()).filter(Boolean);const lista=document.getElementById('lista-senhas');lista.innerHTML=`<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.75rem;"><span style="font-size:.85rem;font-weight:600;color:var(--text3);">${senhas.length} senhas geradas</span><button class="copy-btn" onclick="copyToClipboard([...document.querySelectorAll('.senha-text')].map(e=>e.textContent).join('\\n'), this)">Copiar Todas</button></div>${senhas.map(s=>`<div class="senha-item" style="display:flex;align-items:center;gap:.5rem;padding:.55rem .85rem;background:var(--surface2);border-radius:var(--radius-sm);margin-bottom:.4rem;"><span class="senha-text" style="flex:1;font-family:monospace;font-size:.9rem;font-weight:600;letter-spacing:.5px;word-break:break-all;">${s}</span><button class="copy-btn" onclick="copyToClipboard('${s}', this)" style="flex-shrink:0;">Copiar</button></div>`).join('')}`;lista.style.display='block';document.getElementById('senha-output').value=senhas[0]||'';document.getElementById('forca-container').style.display='none';}
function copiarSenha(){const senha=document.getElementById('senha-output').value;if(senha)copyToClipboard(senha,document.getElementById('copy-btn'));}
</script>
<?php ns_render_page_end(); ?>
