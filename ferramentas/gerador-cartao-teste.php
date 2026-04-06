<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/gerador-cartao-teste');
ns_render_page_start('tool:gerador-cartao-teste');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>Gerador de Cartão de Teste</span></nav>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)">💻</div><div><h1>Gerador de Cartão de Teste</h1><p>Números para testes com interface simples e resultado imediato.</p><span class="tag tag-green">Desenvolvimento</span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{min-height:96px} .inline-btns{display:flex;gap:.6rem;flex-wrap:wrap}</style>
      <div class='form-row'><div class='form-group'><label for='input-text'>Prefixo/Lista base (opcional)</label><textarea id='input-text' class='form-control' rows='4' placeholder='Ex: promoção'></textarea></div><div class='form-group'><label for='input-a'>Quantidade</label><input id='input-a' type='number' class='form-control' min='1' step='1' value='5'></div></div>
      <div class="inline-btns"><button class="btn btn-primary" onclick="runTool()">Executar</button><button class="btn btn-outline" onclick="clearTool()">Limpar</button><button class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Gerador de Cartão de Teste foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. Números para testes com interface simples e resultado imediato.</p><h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p><h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p><h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul><h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p><h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p></div><div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><a href="<?= ns_escape(ns_href('/ferramentas/gerador-cnpj')) ?>" class="related-card"><span class="related-card-icon">💻</span> Gerador Cnpj</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-cpf')) ?>" class="related-card"><span class="related-card-icon">💻</span> Validador Cpf</a><a href="<?= ns_escape(ns_href('/ferramentas/validador-cnpj')) ?>" class="related-card"><span class="related-card-icon">💻</span> Validador Cnpj</a></div></div>
  </div>
</main>
<script>
const slug="gerador-cartao-teste";
function erro(m){document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;const detail=document.getElementById('tool-detail');if(detail && !detail.textContent){detail.textContent='Resultado gerado. Revise o contexto antes de aplicar em decisão final.';}showResult('tool-result');}
function runTool(){const base=document.getElementById('input-text').value.trim(); const n=Math.max(1,parseInt(document.getElementById('input-a').value||'5',10)); if(n>200){erro('Limite de 200 itens por execução para manter performance.');return;} const chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; let out=[]; for(let i=0;i<n;i++){let s=''; for(let j=0;j<8;j++){s+=chars[Math.floor(Math.random()*chars.length)];} out.push(base?`${base}-${s}`:s);} if(slug.includes('lancador-moeda')){out=[Math.random()<0.5?'Cara':'Coroa'];} if(slug.includes('rolagem-dado')){out=[String(1+Math.floor(Math.random()*6))];} document.getElementById('tool-detail').textContent=`${out.length} item(ns) gerado(s).`; const text=out.join('\n'); ok(text);}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent; if(!t||t==='-'){erro('Gere um resultado antes de copiar.');return;} copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end(); ?>
