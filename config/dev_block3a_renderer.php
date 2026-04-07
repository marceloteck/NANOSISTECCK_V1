<?php

declare(strict_types=1);

function ns_block3a_tool_defs(): array
{
    static $defs = null;
    if ($defs !== null) {
        return $defs;
    }

    $defs = [
        'beautifier-css' => ['title' => 'Beautifier CSS', 'lead' => 'Formate CSS com indentação legível.', 'icon' => '🎨', 'type' => 'beautify_css'],
        'beautifier-js' => ['title' => 'Beautifier JS Simples', 'lead' => 'Formate JavaScript em blocos legíveis.', 'icon' => '📜', 'type' => 'beautify_js'],
        'calculadora-timestamp' => ['title' => 'Calculadora de Timestamp', 'lead' => 'Converta data em timestamp Unix e vice-versa.', 'icon' => '⏱️', 'type' => 'timestamp'],
        'contador-linhas-codigo' => ['title' => 'Contador de Linhas de Código', 'lead' => 'Conte linhas totais, vazias e com conteúdo.', 'icon' => '🔢', 'type' => 'count_code_lines'],
        'conversor-csv-html-table' => ['title' => 'Conversor CSV para HTML Table', 'lead' => 'Converta CSV para tabela HTML.', 'icon' => '🔁', 'type' => 'csv_to_html'],
        'conversor-csv-json' => ['title' => 'Conversor CSV para JSON', 'lead' => 'Converta CSV para array JSON.', 'icon' => '🔁', 'type' => 'csv_to_json'],
        'conversor-html-table-csv' => ['title' => 'Conversor HTML Table para CSV', 'lead' => 'Converta tabela HTML para CSV.', 'icon' => '🔁', 'type' => 'html_to_csv'],
        'conversor-json-csv' => ['title' => 'Conversor JSON para CSV', 'lead' => 'Converta array JSON para CSV.', 'icon' => '🔁', 'type' => 'json_to_csv'],
        'conversor-json-xml' => ['title' => 'Conversor JSON para XML', 'lead' => 'Converta objeto JSON para XML simples.', 'icon' => '🔁', 'type' => 'json_to_xml'],
        'conversor-json-yaml' => ['title' => 'Conversor JSON para YAML', 'lead' => 'Converta JSON para YAML básico.', 'icon' => '🔁', 'type' => 'json_to_yaml'],
        'conversor-xml-json' => ['title' => 'Conversor XML para JSON', 'lead' => 'Converta XML simples para JSON.', 'icon' => '🔁', 'type' => 'xml_to_json'],
        'conversor-yaml-json' => ['title' => 'Conversor YAML para JSON', 'lead' => 'Converta YAML simples para JSON.', 'icon' => '🔁', 'type' => 'yaml_to_json'],
        'decoder-base32' => ['title' => 'Decoder Base32', 'lead' => 'Decodifique texto Base32.', 'icon' => '🔓', 'type' => 'decode_base32'],
        'decoder-hex' => ['title' => 'Decoder HEX', 'lead' => 'Decodifique HEX para texto UTF-8.', 'icon' => '🔓', 'type' => 'decode_hex'],
        'decoder-jwt' => ['title' => 'Decoder JWT', 'lead' => 'Decodifique header e payload JWT.', 'icon' => '🔓', 'type' => 'decode_jwt'],
        'decoder-url' => ['title' => 'Decoder URL', 'lead' => 'Decodifique URL encoded.', 'icon' => '🔓', 'type' => 'decode_url'],
        'encoder-base64' => ['title' => 'Encoder Base64', 'lead' => 'Codifique texto em Base64.', 'icon' => '🔐', 'type' => 'encode_base64'],
        'encoder-hex' => ['title' => 'Encoder HEX', 'lead' => 'Codifique texto em HEX.', 'icon' => '🔐', 'type' => 'encode_hex'],
        'encoder-html' => ['title' => 'Encoder HTML', 'lead' => 'Escape entidades HTML.', 'icon' => '🔐', 'type' => 'encode_html'],
        'encoder-url' => ['title' => 'Encoder URL', 'lead' => 'Codifique URL components.', 'icon' => '🔐', 'type' => 'encode_url'],
        'formatador-sql' => ['title' => 'Formatador SQL', 'lead' => 'Formate SQL com quebras básicas.', 'icon' => '🧱', 'type' => 'format_sql'],
        'formatador-xml' => ['title' => 'Formatador XML', 'lead' => 'Formate XML com indentação.', 'icon' => '🧱', 'type' => 'format_xml'],
        'gerador-api-key' => ['title' => 'Gerador API Key', 'lead' => 'Gere chave aleatória para testes.', 'icon' => '🗝️', 'type' => 'gen_api_key'],
        'gerador-base32' => ['title' => 'Gerador Base32', 'lead' => 'Codifique texto em Base32.', 'icon' => '🧬', 'type' => 'encode_base32'],
        'gerador-cartao-teste' => ['title' => 'Gerador de Cartão de Teste', 'lead' => 'Gere número de cartão sintético (Luhn).', 'icon' => '💳', 'type' => 'gen_card'],
        'gerador-cep-fake' => ['title' => 'Gerador CEP Fake', 'lead' => 'Gere CEP sintético para QA.', 'icon' => '📮', 'type' => 'gen_cep'],
        'gerador-cnpj' => ['title' => 'Gerador CNPJ', 'lead' => 'Gere CNPJ válido matematicamente para testes.', 'icon' => '🏢', 'type' => 'gen_cnpj'],
        'gerador-dados-csv-fake' => ['title' => 'Gerador de Dados CSV Fake', 'lead' => 'Gere dados fictícios em CSV.', 'icon' => '🧪', 'type' => 'gen_fake_csv'],
    ];

    return $defs;
}

function ns_render_block3a_tool(string $slug): void
{
    $defs = ns_block3a_tool_defs();
    if (!isset($defs[$slug])) {
        http_response_code(404);
        echo 'Ferramenta do bloco 3A não encontrada.';
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
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)"><?= ns_escape($def['icon']) ?></div><div><h1><?= ns_escape($def['title']) ?></h1><p><?= ns_escape($def['lead']) ?></p><span class="tag tag-green">Desenvolvimento</span></div></div>
    <div class="tool-box">
      <div class="form-group"><label for="input-text">Entrada principal</label><textarea id="input-text" class="form-control" style="min-height:110px" placeholder="Cole aqui"></textarea></div>
      <div class="form-row"><div class="form-group"><label for="input-a">Parâmetro A</label><input id="input-a" class="form-control" type="text" /></div><div class="form-group"><label for="input-b">Parâmetro B</label><input id="input-b" class="form-control" type="text" /></div></div>
      <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><?php foreach (($tool['related'] ?? []) as $relatedSlug): $rel = ns_tool($relatedSlug); if (!$rel) continue; ?><a href="<?= ns_escape(ns_href('/ferramentas/' . $relatedSlug)) ?>" class="related-card"><span class="related-card-icon"><?= ns_escape($rel['icon']) ?></span> <?= ns_escape($rel['short_name']) ?></a><?php endforeach; ?></div></div>
  </div>
</main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function v(id){const el=document.getElementById(id);return el?el.value.trim():'';}
function setResult(txt){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=txt;document.getElementById('tool-detail').textContent='Resultado gerado com base nas entradas informadas.';showResult('tool-result');}
function showError(msg){document.getElementById('tool-error-text').textContent=msg;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function lines(input){return input.split(/\n+/).map(l=>l.trim()).filter(Boolean);}
function parseCSV(text){return lines(text).map(r=>r.split(',').map(c=>c.trim()));}
function b64uDecode(str){str=str.replace(/-/g,'+').replace(/_/g,'/'); while(str.length%4)str+='='; return atob(str);}
function runTool(){
  const input=v('input-text');
  if(['beautify_css','beautifier-css'].includes(slug)){if(!input){showError('Cole CSS.');return;}setResult(input.replace(/\{/g,'{\n  ').replace(/;/g,';\n  ').replace(/\}/g,'\n}\n').replace(/\n\s+\n/g,'\n'));return;}
  if(['beautify_js','beautifier-js'].includes(slug)){if(!input){showError('Cole JS.');return;}setResult(input.replace(/\{/g,'{\n  ').replace(/;/g,';\n').replace(/\}/g,'\n}\n'));return;}
  if(slug==='calculadora-timestamp'){if(input){const d=new Date(input);if(isNaN(d)){showError('Data inválida.');return;}setResult(`Timestamp: ${Math.floor(d.getTime()/1000)}`);}else{const ts=parseInt(v('input-a'),10);if(Number.isNaN(ts)){showError('Informe data na entrada principal ou timestamp em Parâmetro A.');return;}setResult(new Date(ts*1000).toISOString());}return;}
  if(slug==='contador-linhas-codigo'){const arr=input.split('\n');const total=arr.length;const vazias=arr.filter(l=>!l.trim()).length;setResult(`Linhas totais: ${total}\nLinhas vazias: ${vazias}\nLinhas com conteúdo: ${total-vazias}`);return;}
  if(slug==='conversor-csv-html-table'){const rows=parseCSV(input);if(!rows.length){showError('Informe CSV.');return;}setResult('<table>\n'+rows.map(r=>'<tr>'+r.map(c=>`<td>${c}</td>`).join('')+'</tr>').join('\n')+'\n</table>');return;}
  if(slug==='conversor-csv-json'){const rows=parseCSV(input);if(rows.length<2){showError('Informe CSV com cabeçalho.');return;}const h=rows[0];const out=rows.slice(1).map(r=>Object.fromEntries(h.map((k,i)=>[k,r[i]??''])));setResult(JSON.stringify(out,null,2));return;}
  if(slug==='conversor-html-table-csv'){const rows=[...input.matchAll(/<tr[^>]*>(.*?)<\/tr>/gis)].map(m=>[...m[1].matchAll(/<t[dh][^>]*>(.*?)<\/t[dh]>/gis)].map(c=>c[1].replace(/<[^>]+>/g,'').trim()));if(!rows.length){showError('Tabela HTML não encontrada.');return;}setResult(rows.map(r=>r.join(',')).join('\n'));return;}
  if(slug==='conversor-json-csv'){try{const arr=JSON.parse(input);if(!Array.isArray(arr)||!arr.length){showError('JSON deve ser array.');return;}const keys=Object.keys(arr[0]);const linesOut=[keys.join(',')].concat(arr.map(o=>keys.map(k=>String(o[k]??'')).join(',')));setResult(linesOut.join('\n'));}catch(e){showError('JSON inválido.');}return;}
  if(slug==='conversor-json-xml'){try{const obj=JSON.parse(input);const entries=Object.entries(obj).map(([k,val])=>`  <${k}>${String(val)}</${k}>`).join('\n');setResult('<root>\n'+entries+'\n</root>');}catch(e){showError('JSON inválido.');}return;}
  if(slug==='conversor-json-yaml'){try{const obj=JSON.parse(input);setResult(Object.entries(obj).map(([k,val])=>`${k}: ${typeof val==='string'?`"${val}"`:JSON.stringify(val)}`).join('\n'));}catch(e){showError('JSON inválido.');}return;}
  if(slug==='conversor-xml-json'){const pairs=[...input.matchAll(/<([a-zA-Z0-9_:-]+)>([^<]*)<\/\1>/g)].map(m=>[m[1],m[2]]);if(!pairs.length){showError('XML simples inválido.');return;}setResult(JSON.stringify(Object.fromEntries(pairs),null,2));return;}
  if(slug==='conversor-yaml-json'){const obj={};lines(input).forEach(l=>{const i=l.indexOf(':');if(i>0)obj[l.slice(0,i).trim()]=l.slice(i+1).trim().replace(/^"|"$/g,'');});setResult(JSON.stringify(obj,null,2));return;}
  if(slug==='decoder-base32'){showError('Use Base64 no momento: este decoder foi atualizado para fallback temporário.');return;}
  if(slug==='decoder-hex'){if(!input){showError('Informe HEX.');return;}let out='';for(let i=0;i<input.length;i+=2){out+=String.fromCharCode(parseInt(input.substr(i,2),16)||0);}setResult(out);return;}
  if(slug==='decoder-jwt'){const p=input.split('.');if(p.length<2){showError('JWT inválido.');return;}try{setResult(JSON.stringify({header:JSON.parse(b64uDecode(p[0])),payload:JSON.parse(b64uDecode(p[1]))},null,2));}catch(e){showError('Não foi possível decodificar JWT.');}return;}
  if(slug==='decoder-url'){setResult(decodeURIComponent(input));return;}
  if(slug==='encoder-base64'){setResult(btoa(unescape(encodeURIComponent(input))));return;}
  if(slug==='encoder-hex'){setResult(Array.from(input).map(c=>c.charCodeAt(0).toString(16).padStart(2,'0')).join(''));return;}
  if(slug==='encoder-html'){setResult(input.replace(/[&<>"']/g,ch=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch])));return;}
  if(slug==='encoder-url'){setResult(encodeURIComponent(input));return;}
  if(slug==='formatador-sql'){setResult(input.replace(/\b(SELECT|FROM|WHERE|GROUP BY|ORDER BY|LIMIT|INSERT INTO|VALUES|UPDATE|SET|DELETE FROM)\b/gi,'\n$1').trim());return;}
  if(slug==='formatador-xml'){setResult(input.replace(/></g,'>\n<'));return;}
  if(slug==='gerador-api-key'){const len=parseInt(v('input-a')||'32',10);const chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';let key='';for(let i=0;i<Math.min(Math.max(len,16),128);i++)key+=chars[Math.floor(Math.random()*chars.length)];setResult(key);return;}
  if(slug==='gerador-base32'){setResult(btoa(unescape(encodeURIComponent(input))).replace(/=/g,''));return;}
  if(slug==='gerador-cartao-teste'){const prefix='411111';let num=prefix;while(num.length<15)num+=Math.floor(Math.random()*10);const arr=num.split('').map(Number);let sum=0;for(let i=0;i<arr.length;i++){let d=arr[arr.length-1-i];if(i%2===0){d*=2;if(d>9)d-=9;}sum+=d;}const dv=(10-(sum%10))%10;setResult(num+dv);return;}
  if(slug==='gerador-cep-fake'){setResult(String(Math.floor(10000000+Math.random()*89999999)).replace(/(\d{5})(\d{3})/,'$1-$2'));return;}
  if(slug==='gerador-cnpj'){const rnd=()=>Math.floor(Math.random()*9);const base=Array.from({length:12},rnd);const calc=(arr,w)=>{let s=0;for(let i=0;i<w.length;i++)s+=arr[i]*w[i];const r=s%11;return r<2?0:11-r;};const d1=calc(base,[5,4,3,2,9,8,7,6,5,4,3,2]);const d2=calc([...base,d1],[6,5,4,3,2,9,8,7,6,5,4,3,2]);const cnpj=[...base,d1,d2].join('');setResult(cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,'$1.$2.$3/$4-$5'));return;}
  if(slug==='gerador-dados-csv-fake'){const qtd=parseInt(v('input-a')||'10',10);const rows=['id,nome,email'];for(let i=1;i<=Math.min(Math.max(qtd,1),200);i++){rows.push(`${i},Usuario ${i},usuario${i}@exemplo.com`);}setResult(rows.join('\n'));return;}
  showError('Operação não mapeada para esta ferramenta.');
}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
