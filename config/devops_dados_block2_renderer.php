<?php

declare(strict_types=1);

function ns_block2_tool_defs(): array
{
    static $defs = null;
    if ($defs !== null) {
        return $defs;
    }

    $defs = [
        'analisador-user-agent' => ['title' => 'Analisador de User-Agent', 'lead' => 'Identifique navegador, sistema operacional e dispositivo a partir do user-agent.', 'icon' => '🧪', 'category' => 'DevOps', 'type' => 'ua_parse'],
        'comparador-csv' => ['title' => 'Comparador de CSV', 'lead' => 'Compare linhas entre dois CSVs e encontre diferenças.', 'icon' => '📊', 'category' => 'DevOps', 'type' => 'compare_lists'],
        'comparador-json' => ['title' => 'Comparador de JSON', 'lead' => 'Compare JSON A x JSON B com diff textual.', 'icon' => '🧪', 'category' => 'DevOps', 'type' => 'compare_json'],
        'comparador-listas' => ['title' => 'Comparador de Listas', 'lead' => 'Compare duas listas e identifique itens exclusivos e em comum.', 'icon' => '📋', 'category' => 'DevOps', 'type' => 'compare_lists'],
        'contador-registros' => ['title' => 'Contador de Registros', 'lead' => 'Conte registros de um conteúdo em linhas.', 'icon' => '🔢', 'category' => 'Dados', 'type' => 'count_lines'],
        'conversor-chave-valor-json' => ['title' => 'Conversor Chave=Valor para JSON', 'lead' => 'Converta pares chave=valor em objeto JSON.', 'icon' => '🔁', 'category' => 'Dados', 'type' => 'kv_to_json'],
        'conversor-json-chave-valor' => ['title' => 'Conversor JSON para Chave=Valor', 'lead' => 'Converta JSON simples em pares chave=valor.', 'icon' => '🔁', 'category' => 'Dados', 'type' => 'json_to_kv'],
        'csv-para-tabela-html' => ['title' => 'CSV para Tabela HTML', 'lead' => 'Converta CSV em tabela HTML.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'csv_to_html'],
        'desescapador-json' => ['title' => 'Desescapador de JSON', 'lead' => 'Desescape strings JSON escapadas.', 'icon' => '🧩', 'category' => 'DevOps', 'type' => 'json_unescape'],
        'diff-texto-lado-a-lado' => ['title' => 'Diff de Texto Lado a Lado', 'lead' => 'Compare dois textos linha a linha.', 'icon' => '🧾', 'category' => 'DevOps', 'type' => 'compare_lists'],
        'escapador-json' => ['title' => 'Escapador de JSON', 'lead' => 'Escape strings para uso seguro em JSON.', 'icon' => '🧩', 'category' => 'DevOps', 'type' => 'json_escape'],
        'extrator-colunas-csv' => ['title' => 'Extrator de Colunas CSV', 'lead' => 'Extraia colunas específicas de um CSV.', 'icon' => '📊', 'category' => 'Dados', 'type' => 'csv_extract_columns'],
        'gerador-axios-js' => ['title' => 'Gerador de Código Axios', 'lead' => 'Gere snippet Axios para requisição HTTP.', 'icon' => '⚙️', 'category' => 'DevOps', 'type' => 'gen_http_snippet', 'mode' => 'axios'],
        'gerador-cookie' => ['title' => 'Gerador de Cookie', 'lead' => 'Gere cabeçalho Set-Cookie.', 'icon' => '🍪', 'category' => 'DevOps', 'type' => 'gen_cookie'],
        'gerador-cron-basico' => ['title' => 'Gerador de Cron Básico', 'lead' => 'Monte expressão cron simples.', 'icon' => '⏱️', 'category' => 'DevOps', 'type' => 'gen_cron'],
        'gerador-curl' => ['title' => 'Gerador de Comando cURL', 'lead' => 'Gere comando cURL para API.', 'icon' => '⚙️', 'category' => 'DevOps', 'type' => 'gen_http_snippet', 'mode' => 'curl'],
        'gerador-fetch-js' => ['title' => 'Gerador de Código fetch()', 'lead' => 'Gere snippet fetch para requisição HTTP.', 'icon' => '⚙️', 'category' => 'DevOps', 'type' => 'gen_http_snippet', 'mode' => 'fetch'],
        'gerador-htaccess-basico' => ['title' => 'Gerador de .htaccess Básico', 'lead' => 'Gere regras básicas de redirecionamento e segurança.', 'icon' => '🛡️', 'category' => 'DevOps', 'type' => 'gen_htaccess'],
        'gerador-indice-array-js' => ['title' => 'Gerador de Array JS', 'lead' => 'Converta lista em array JavaScript.', 'icon' => '🧱', 'category' => 'Dados', 'type' => 'list_to_js_array'],
        'gerador-indice-array-php' => ['title' => 'Gerador de Array PHP', 'lead' => 'Converta lista em array PHP.', 'icon' => '🧱', 'category' => 'Dados', 'type' => 'list_to_php_array'],
        'gerador-markdown-table' => ['title' => 'Gerador de Tabela Markdown', 'lead' => 'Gere tabela Markdown a partir de linhas CSV.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'csv_to_md'],
        'gerador-matriz-aleatoria' => ['title' => 'Gerador de Matriz Aleatória', 'lead' => 'Gere matriz numérica aleatória por dimensão.', 'icon' => '🎲', 'category' => 'Dados', 'type' => 'gen_matrix'],
        'gerador-objeto-json' => ['title' => 'Gerador de Objeto JSON', 'lead' => 'Converta pares chave=valor em JSON formatado.', 'icon' => '🔁', 'category' => 'Dados', 'type' => 'kv_to_json'],
        'gerador-postman-body' => ['title' => 'Gerador de Body para Postman', 'lead' => 'Converta pares chave=valor para JSON body.', 'icon' => '⚙️', 'category' => 'DevOps', 'type' => 'kv_to_json'],
        'gerador-query-string' => ['title' => 'Gerador de Query String', 'lead' => 'Converta pares chave=valor em query string.', 'icon' => '🔗', 'category' => 'DevOps', 'type' => 'kv_to_query'],
        'gerador-regex-email' => ['title' => 'Gerador de Regex para Email', 'lead' => 'Gere regex base para validação de e-mail.', 'icon' => '🔍', 'category' => 'DevOps', 'type' => 'gen_regex_email'],
        'gerador-regex-url' => ['title' => 'Gerador de Regex para URL', 'lead' => 'Gere regex base para validação de URL.', 'icon' => '🔍', 'category' => 'DevOps', 'type' => 'gen_regex_url'],
        'gerador-tabela-html' => ['title' => 'Gerador de Tabela HTML', 'lead' => 'Converta CSV em tabela HTML semântica.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'csv_to_html'],
        'gerador-user-agent-fake' => ['title' => 'Gerador de User-Agent Fake', 'lead' => 'Gere user-agent de teste para QA.', 'icon' => '🧪', 'category' => 'DevOps', 'type' => 'gen_ua_fake'],
        'gerador-webhook-payload' => ['title' => 'Gerador de Payload de Webhook', 'lead' => 'Monte payload JSON para testes de webhook.', 'icon' => '⚙️', 'category' => 'DevOps', 'type' => 'gen_webhook'],
        'html-para-markdown-table' => ['title' => 'HTML para Markdown Table', 'lead' => 'Converta tabela HTML para Markdown.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'html_to_md'],
        'inversor-linhas-colunas' => ['title' => 'Inversor de Linhas e Colunas', 'lead' => 'Transponha tabela textual (CSV).', 'icon' => '🔁', 'category' => 'Dados', 'type' => 'transpose_csv'],
        'json-para-tabela-html' => ['title' => 'JSON para Tabela HTML', 'lead' => 'Converta array JSON em tabela HTML.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'json_to_html_table'],
        'leitor-cron' => ['title' => 'Leitor de Expressão Cron', 'lead' => 'Interprete expressão cron em linguagem simples.', 'icon' => '⏱️', 'category' => 'DevOps', 'type' => 'read_cron'],
        'leitor-csv-basico' => ['title' => 'Leitor CSV Básico', 'lead' => 'Inspecione CSV e conte linhas/colunas.', 'icon' => '📊', 'category' => 'Dados', 'type' => 'read_csv'],
        'leitor-json-basico' => ['title' => 'Leitor JSON Básico', 'lead' => 'Valide JSON e exiba estrutura básica.', 'icon' => '🧪', 'category' => 'Dados', 'type' => 'read_json'],
        'leitor-xml-basico' => ['title' => 'Leitor XML Básico', 'lead' => 'Valide XML e exiba tags principais.', 'icon' => '🧪', 'category' => 'Dados', 'type' => 'read_xml'],
        'markdown-table-para-html' => ['title' => 'Markdown Table para HTML', 'lead' => 'Converta tabela Markdown para HTML.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'md_to_html'],
        'media-colunas' => ['title' => 'Média de Colunas', 'lead' => 'Calcule média de valores por coluna.', 'icon' => '📈', 'category' => 'Dados', 'type' => 'avg_columns'],
        'parser-chave-valor' => ['title' => 'Parser de Chave=Valor', 'lead' => 'Analise pares chave=valor.', 'icon' => '🧩', 'category' => 'Dados', 'type' => 'parse_kv'],
        'parser-cookie' => ['title' => 'Parser de Cookie', 'lead' => 'Parseie string de cookie para pares.', 'icon' => '🍪', 'category' => 'DevOps', 'type' => 'parse_cookie'],
        'parser-jwt-claims' => ['title' => 'Parser de Claims JWT', 'lead' => 'Decodifique payload JWT (sem validar assinatura).', 'icon' => '🔐', 'category' => 'DevOps', 'type' => 'parse_jwt'],
        'parser-query-string' => ['title' => 'Parser de Query String', 'lead' => 'Converta query string em pares chave=valor.', 'icon' => '🔗', 'category' => 'DevOps', 'type' => 'parse_query'],
        'removedor-colunas-csv' => ['title' => 'Removedor de Colunas CSV', 'lead' => 'Remova colunas específicas de um CSV.', 'icon' => '✂️', 'category' => 'Dados', 'type' => 'csv_remove_columns'],
        'somador-colunas' => ['title' => 'Somador de Colunas', 'lead' => 'Some valores numéricos por coluna.', 'icon' => '➕', 'category' => 'Dados', 'type' => 'sum_columns'],
        'tabela-html-para-csv' => ['title' => 'Tabela HTML para CSV', 'lead' => 'Converta tabela HTML para CSV.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'html_to_csv'],
        'tabela-html-para-json' => ['title' => 'Tabela HTML para JSON', 'lead' => 'Converta tabela HTML para JSON.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'html_to_json'],
        'verificador-cabecalhos-http-manual' => ['title' => 'Verificador de Cabeçalhos HTTP Manual', 'lead' => 'Valide formato de cabeçalhos HTTP inseridos manualmente.', 'icon' => '🛡️', 'category' => 'DevOps', 'type' => 'check_headers'],
        'verificador-regex' => ['title' => 'Verificador de Regex', 'lead' => 'Teste regex em um texto de entrada.', 'icon' => '🔍', 'category' => 'DevOps', 'type' => 'check_regex'],
        'xml-para-tabela-html' => ['title' => 'XML para Tabela HTML', 'lead' => 'Converta XML simples em tabela HTML.', 'icon' => '📑', 'category' => 'Dados', 'type' => 'xml_to_html'],
    ];

    return $defs;
}

function ns_block2_fields(): string
{
    return '<div class="form-group"><label for="input-text">Entrada principal</label><textarea id="input-text" class="form-control" placeholder="Cole aqui"></textarea></div><div class="form-group"><label for="input-extra">Entrada adicional (opcional)</label><textarea id="input-extra" class="form-control" placeholder="Opcional"></textarea></div><div class="form-group"><label for="input-cols">Colunas (índices separados por vírgula)</label><input id="input-cols" class="form-control" type="text" placeholder="0,2" /></div><div class="form-group"><label for="input-a">Parâmetro A (opcional)</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Parâmetro B (opcional)</label><input id="input-b" class="form-control" type="text" /></div>';
}

function ns_render_block2_tool(string $slug): void
{
    $defs = ns_block2_tool_defs();
    if (!isset($defs[$slug])) {
        http_response_code(404);
        echo 'Ferramenta do bloco 2 não encontrada.';
        return;
    }

    $def = $defs[$slug];
    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    $tool = ns_tool($slug);
    ?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span><?= ns_escape($def['title']) ?></span></nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)"><?= ns_escape($def['icon']) ?></div><div><h1><?= ns_escape($def['title']) ?></h1><p><?= ns_escape($def['lead']) ?></p><span class="tag tag-green"><?= ns_escape($def['category']) ?></span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{min-height:100px}</style>
      <?= ns_block2_fields() ?>
      <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Utilitário de DevOps/Dados para transformar, validar ou gerar artefatos técnicos com rapidez e padronização.</p><h2>Como usar</h2><p>Cole a entrada principal, ajuste campos opcionais e execute para obter saída pronta para uso técnico.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><?php foreach (($tool['related'] ?? []) as $relatedSlug): $rel = ns_tool($relatedSlug); if (!$rel) { continue; } ?><a href="<?= ns_escape(ns_href('/ferramentas/' . $relatedSlug)) ?>" class="related-card"><span class="related-card-icon"><?= ns_escape($rel['icon']) ?></span> <?= ns_escape($rel['short_name']) ?></a><?php endforeach; ?></div></div>
  </div>
</main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const mode = <?= json_encode((string) ($def['mode'] ?? ''), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function v(id){const el=document.getElementById(id);return el?el.value.trim():'';}
function showError(message){document.getElementById('tool-error-text').textContent=message;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function setResult(text){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=text;document.getElementById('tool-detail').textContent='Saída gerada com base nas entradas informadas.';showResult('tool-result');}
function lines(input){return input.split(/\n+/).map(s=>s.trim()).filter(Boolean);}
function parseCSV(text){return lines(text).map(row=>row.split(',').map(c=>c.trim()));}
function toKVObject(text){const obj={}; lines(text).forEach(l=>{const idx=l.indexOf('='); if(idx>0){obj[l.slice(0,idx).trim()]=l.slice(idx+1).trim();}}); return obj;}
function runTool(){
  const input=v('input-text');
  const extra=v('input-extra');
  if(['gen_regex_email'].includes(slug)){setResult('^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$');return;}
  if(['gen_regex_url'].includes(slug)){setResult('^https?:\\/\\/.+$');return;}
  if(slug==='ua_parse'){if(!input){showError('Informe o user-agent.');return;}const ua=input.toLowerCase();const browser=ua.includes('chrome')?'Chrome':(ua.includes('firefox')?'Firefox':(ua.includes('safari')?'Safari':'Outro'));const os=ua.includes('windows')?'Windows':(ua.includes('linux')?'Linux':(ua.includes('android')?'Android':(ua.includes('iphone')?'iOS':'Outro')));setResult(`Browser: ${browser}\nSistema: ${os}`);return;}
  if(['compare_lists','comparador-csv','diff-texto-lado-a-lado'].includes(slug)){const a=lines(input),b=lines(extra);if(!a.length||!b.length){showError('Informe conteúdo nos dois campos.');return;}const onlyA=a.filter(x=>!b.includes(x));const onlyB=b.filter(x=>!a.includes(x));const common=a.filter(x=>b.includes(x));setResult(`Somente A (${onlyA.length}):\n${onlyA.join('\n')}\n\nSomente B (${onlyB.length}):\n${onlyB.join('\n')}\n\nEm comum (${common.length}):\n${common.join('\n')}`);return;}
  if(slug==='compare_json'){try{const a=JSON.stringify(JSON.parse(input),null,2);const b=JSON.stringify(JSON.parse(extra),null,2);setResult(a===b?'JSONs idênticos':'JSONs diferentes\n\nA:\n'+a+'\n\nB:\n'+b);}catch(e){showError('JSON inválido em um dos campos.');}return;}
  if(slug==='count_lines'){setResult(`Registros: ${lines(input).length}`);return;}
  if(['kv_to_json','conversor-chave-valor-json','gerador-objeto-json','gerador-postman-body'].includes(slug)){setResult(JSON.stringify(toKVObject(input),null,2));return;}
  if(['json_to_kv','conversor-json-chave-valor'].includes(slug)){try{const obj=JSON.parse(input);setResult(Object.entries(obj).map(([k,val])=>`${k}=${typeof val==='string'?val:JSON.stringify(val)}`).join('\n'));}catch(e){showError('JSON inválido.');}return;}
  if(['csv_to_html','gerador-tabela-html','csv-para-tabela-html'].includes(slug)){const rows=parseCSV(input);if(!rows.length){showError('Informe CSV.');return;}const html='<table>\n'+rows.map(r=>'  <tr>'+r.map(c=>`<td>${c}</td>`).join('')+'</tr>').join('\n')+'\n</table>';setResult(html);return;}
  if(slug==='json_escape'){setResult(JSON.stringify(input).slice(1,-1));return;}
  if(slug==='json_unescape'){try{setResult(JSON.parse('"'+input.replace(/"/g,'\\"')+'"'));}catch(e){showError('Texto inválido para desescape.');}return;}
  if(slug==='csv_extract_columns'){const idx=v('input-cols').split(',').map(s=>parseInt(s.trim(),10)).filter(n=>!Number.isNaN(n));const rows=parseCSV(input);if(!rows.length||!idx.length){showError('Informe CSV e índices de coluna.');return;}setResult(rows.map(r=>idx.map(i=>r[i]??'').join(',')).join('\n'));return;}
  if(slug==='gen_http_snippet' || ['gerador-axios-js','gerador-fetch-js','gerador-curl'].includes(slug)){const url=v('input-a')||'https://api.exemplo.com/recurso';const method=(v('input-b')||'GET').toUpperCase();if((mode||slug).includes('axios')){setResult(`axios({ method: '${method}', url: '${url}' })\n  .then(res => console.log(res.data))\n  .catch(console.error);`);}else if((mode||slug).includes('fetch')){setResult(`fetch('${url}', { method: '${method}' })\n  .then(r => r.json())\n  .then(console.log)\n  .catch(console.error);`);}else{setResult(`curl -X ${method} '${url}'`);}return;}
  if(slug==='gen_cookie' || slug==='gerador-cookie'){const name=v('input-a')||'session_id';const val=v('input-b')||'abc123';setResult(`Set-Cookie: ${name}=${val}; Path=/; HttpOnly; Secure; SameSite=Lax`);return;}
  if(slug==='gen_cron' || slug==='gerador-cron-basico'){const min=v('input-a')||'0';const hour=v('input-b')||'*';setResult(`${min} ${hour} * * *`);return;}
  if(slug==='gen_htaccess' || slug==='gerador-htaccess-basico'){setResult('RewriteEngine On\nRewriteCond %{HTTPS} off\nRewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\nHeader always set X-Frame-Options "SAMEORIGIN"');return;}
  if(slug==='list_to_js_array' || slug==='gerador-indice-array-js'){setResult('[\n  '+lines(input).map(i=>JSON.stringify(i)).join(',\n  ')+'\n]');return;}
  if(slug==='list_to_php_array' || slug==='gerador-indice-array-php'){setResult('[\n  '+lines(input).map(i=>"'"+i.replace(/'/g,"\\'")+"'").join(',\n  ')+'\n];');return;}
  if(slug==='csv_to_md' || slug==='gerador-markdown-table'){const rows=parseCSV(input);if(rows.length<1){showError('Informe CSV.');return;}const header='| '+rows[0].join(' | ')+' |';const sep='| '+rows[0].map(()=> '---').join(' | ')+' |';const body=rows.slice(1).map(r=>'| '+r.join(' | ')+' |').join('\n');setResult([header,sep,body].filter(Boolean).join('\n'));return;}
  if(slug==='gen_matrix' || slug==='gerador-matriz-aleatoria'){const l=parseInt(v('input-a')||'3',10);const c=parseInt(v('input-b')||'3',10);if(l<1||c<1||l>20||c>20){showError('Use dimensões entre 1 e 20.');return;}const out=[];for(let i=0;i<l;i++){const row=[];for(let j=0;j<c;j++)row.push(Math.floor(Math.random()*100));out.push(row.join(','));}setResult(out.join('\n'));return;}
  if(slug==='kv_to_query' || slug==='gerador-query-string'){const obj=toKVObject(input);const query=Object.entries(obj).map(([k,val])=>`${encodeURIComponent(k)}=${encodeURIComponent(val)}`).join('&');setResult(query);return;}
  if(slug==='gen_ua_fake' || slug==='gerador-user-agent-fake'){setResult('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36');return;}
  if(slug==='gen_webhook' || slug==='gerador-webhook-payload'){const event=v('input-a')||'order.created';const id=v('input-b')||String(Date.now());setResult(JSON.stringify({event,event_id:id,timestamp:new Date().toISOString(),payload:toKVObject(input)},null,2));return;}
  if(slug==='html_to_md' || slug==='html-para-markdown-table'){const rows=[...input.matchAll(/<tr[^>]*>(.*?)<\/tr>/gis)].map(m=>[...m[1].matchAll(/<t[dh][^>]*>(.*?)<\/t[dh]>/gis)].map(c=>c[1].replace(/<[^>]+>/g,'').trim()));if(!rows.length){showError('Tabela HTML não encontrada.');return;}const header='| '+rows[0].join(' | ')+' |';const sep='| '+rows[0].map(()=> '---').join(' | ')+' |';const body=rows.slice(1).map(r=>'| '+r.join(' | ')+' |').join('\n');setResult([header,sep,body].join('\n'));return;}
  if(slug==='transpose_csv' || slug==='inversor-linhas-colunas'){const rows=parseCSV(input);if(!rows.length){showError('Informe CSV.');return;}const max=Math.max(...rows.map(r=>r.length));const trans=[];for(let i=0;i<max;i++){trans.push(rows.map(r=>r[i]??'').join(','));}setResult(trans.join('\n'));return;}
  if(slug==='json_to_html_table' || slug==='json-para-tabela-html'){try{const arr=JSON.parse(input);if(!Array.isArray(arr)||!arr.length){showError('JSON deve ser array de objetos.');return;}const keys=Object.keys(arr[0]);const head='<tr>'+keys.map(k=>`<th>${k}</th>`).join('')+'</tr>';const body=arr.map(it=>'<tr>'+keys.map(k=>`<td>${it[k]??''}</td>`).join('')+'</tr>').join('\n');setResult('<table>\n'+head+'\n'+body+'\n</table>');}catch(e){showError('JSON inválido.');}return;}
  if(slug==='read_cron' || slug==='leitor-cron'){const p=input.split(/\s+/).filter(Boolean);if(p.length!==5){showError('Cron deve ter 5 campos.');return;}setResult(`Minuto: ${p[0]}\nHora: ${p[1]}\nDia mês: ${p[2]}\nMês: ${p[3]}\nDia semana: ${p[4]}`);return;}
  if(slug==='read_csv' || slug==='leitor-csv-basico'){const rows=parseCSV(input);if(!rows.length){showError('Informe CSV.');return;}setResult(`Linhas: ${rows.length}\nColunas (linha 1): ${rows[0].length}`);return;}
  if(slug==='read_json' || slug==='leitor-json-basico'){try{const obj=JSON.parse(input);setResult(`JSON válido\nTipo raiz: ${Array.isArray(obj)?'array':typeof obj}\nTamanho: ${Array.isArray(obj)?obj.length:Object.keys(obj||{}).length}`);}catch(e){showError('JSON inválido.');}return;}
  if(slug==='read_xml' || slug==='leitor-xml-basico'){const tags=[...input.matchAll(/<([a-zA-Z0-9_:-]+)(\s|>)/g)].map(m=>m[1]);if(!tags.length){showError('XML inválido ou vazio.');return;}const uniq=[...new Set(tags)];setResult(`Tags encontradas (${uniq.length}):\n${uniq.join('\n')}`);return;}
  if(slug==='md_to_html' || slug==='markdown-table-para-html'){const rows=lines(input).filter(l=>l.startsWith('|')).map(l=>l.split('|').slice(1,-1).map(c=>c.trim()));if(rows.length<2){showError('Tabela markdown inválida.');return;}const head='<tr>'+rows[0].map(c=>`<th>${c}</th>`).join('')+'</tr>';const body=rows.slice(2).map(r=>'<tr>'+r.map(c=>`<td>${c}</td>`).join('')+'</tr>').join('\n');setResult('<table>\n'+head+'\n'+body+'\n</table>');return;}
  if(slug==='avg_columns' || slug==='media-colunas' || slug==='sum_columns' || slug==='somador-colunas'){const rows=parseCSV(input);if(!rows.length){showError('Informe CSV numérico.');return;}const cols=Math.max(...rows.map(r=>r.length));const totals=Array(cols).fill(0);const count=Array(cols).fill(0);rows.forEach(r=>r.forEach((v,i)=>{const n=parseFloat(v);if(!Number.isNaN(n)){totals[i]+=n;count[i]++;}}));if(slug==='sum_columns' || slug==='somador-colunas'){setResult(totals.map((v,i)=>`Coluna ${i}: ${fmtNum(v,6)}`).join('\n'));}else{setResult(totals.map((v,i)=>`Coluna ${i}: ${count[i]?fmtNum(v/count[i],6):'-'}`).join('\n'));}return;}
  if(slug==='parse_kv' || slug==='parser-chave-valor'){const obj=toKVObject(input);setResult(JSON.stringify(obj,null,2));return;}
  if(slug==='parse_cookie' || slug==='parser-cookie'){const pairs=input.split(';').map(v=>v.trim()).filter(Boolean).map(v=>{const i=v.indexOf('=');return [v.slice(0,i),v.slice(i+1)];});setResult(pairs.map(([k,val])=>`${k} = ${val}`).join('\n'));return;}
  if(slug==='parse_jwt' || slug==='parser-jwt-claims'){const token=input.split('.');if(token.length<2){showError('JWT inválido.');return;}try{const payload=JSON.parse(atob(token[1].replace(/-/g,'+').replace(/_/g,'/')));setResult(JSON.stringify(payload,null,2));}catch(e){showError('Não foi possível decodificar payload JWT.');}return;}
  if(slug==='parse_query' || slug==='parser-query-string'){const query=input.startsWith('?')?input.slice(1):input;const params=new URLSearchParams(query);const out=[];for(const [k,val] of params.entries()){out.push(`${k} = ${val}`);}setResult(out.join('\n')||'Sem parâmetros.');return;}
  if(slug==='csv_remove_columns' || slug==='removedor-colunas-csv'){const idx=v('input-cols').split(',').map(s=>parseInt(s.trim(),10)).filter(n=>!Number.isNaN(n));const rows=parseCSV(input);if(!rows.length||!idx.length){showError('Informe CSV e colunas para remover.');return;}setResult(rows.map(r=>r.filter((_,i)=>!idx.includes(i)).join(',')).join('\n'));return;}
  if(slug==='html_to_csv' || slug==='tabela-html-para-csv' || slug==='html_to_json' || slug==='tabela-html-para-json'){const rows=[...input.matchAll(/<tr[^>]*>(.*?)<\/tr>/gis)].map(m=>[...m[1].matchAll(/<t[dh][^>]*>(.*?)<\/t[dh]>/gis)].map(c=>c[1].replace(/<[^>]+>/g,'').trim()));if(!rows.length){showError('Tabela HTML não encontrada.');return;}if(slug==='html_to_json' || slug==='tabela-html-para-json'){const keys=rows[0];const arr=rows.slice(1).map(r=>Object.fromEntries(keys.map((k,i)=>[k,r[i]??''])));setResult(JSON.stringify(arr,null,2));}else{setResult(rows.map(r=>r.join(',')).join('\n'));}return;}
  if(slug==='check_headers' || slug==='verificador-cabecalhos-http-manual'){const hs=lines(input);if(!hs.length){showError('Informe cabeçalhos.');return;}const invalid=hs.filter(h=>!/^[-A-Za-z0-9]+\s*:\s*.+$/.test(h));setResult(invalid.length?`Inválidos (${invalid.length}):\n${invalid.join('\n')}`:'Todos os cabeçalhos parecem válidos.');return;}
  if(slug==='check_regex' || slug==='verificador-regex'){const pattern=v('input-a');const flags=v('input-b')||'g';if(!pattern){showError('Informe o padrão regex em Parâmetro A.');return;}try{const re=new RegExp(pattern,flags);const matches=[...input.matchAll(re)].map(m=>m[0]);setResult(matches.length?matches.join('\n'):'Sem correspondências.');}catch(e){showError('Regex inválida.');}return;}
  if(slug==='xml_to_html' || slug==='xml-para-tabela-html'){const rows=[...input.matchAll(/<([a-zA-Z0-9_:-]+)>([^<]*)<\/\1>/g)].map(m=>[m[1],m[2]]);if(!rows.length){showError('XML simples não encontrado.');return;}setResult('<table>\n<tr><th>Tag</th><th>Valor</th></tr>\n'+rows.map(r=>`<tr><td>${r[0]}</td><td>${r[1]}</td></tr>`).join('\n')+'\n</table>');return;}
  showError('Operação não mapeada para esta ferramenta.');
}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
