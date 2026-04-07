<?php

declare(strict_types=1);

function ns_block3b_tool_defs(): array
{
    static $defs = null;
    if ($defs !== null) return $defs;

    $defs = [
        'gerador-dados-json-fake' => ['title' => 'Gerador de Dados JSON Fake', 'lead' => 'Gere dados fictícios em JSON.', 'icon' => '🧪', 'type' => 'fake_json'],
        'gerador-dados-sql-fake' => ['title' => 'Gerador de Dados SQL Fake', 'lead' => 'Gere inserts SQL com dados fictícios.', 'icon' => '🧪', 'type' => 'fake_sql'],
        'gerador-hash-md5' => ['title' => 'Gerador Hash MD5', 'lead' => 'Gere hash MD5.', 'icon' => '🔐', 'type' => 'hash_md5'],
        'gerador-hash-sha1' => ['title' => 'Gerador Hash SHA1', 'lead' => 'Gere hash SHA1.', 'icon' => '🔐', 'type' => 'hash_sha1'],
        'gerador-hmac-sha256' => ['title' => 'Gerador HMAC SHA256', 'lead' => 'Gere HMAC SHA256 com chave secreta.', 'icon' => '🔐', 'type' => 'hmac_sha256'],
        'gerador-ie-simples' => ['title' => 'Gerador IE Simples', 'lead' => 'Gere inscrição estadual sintética para testes.', 'icon' => '🏢', 'type' => 'gen_ie'],
        'gerador-jwt-payload' => ['title' => 'Gerador JWT Payload', 'lead' => 'Gere payload JSON para JWT de teste.', 'icon' => '🔐', 'type' => 'jwt_payload'],
        'gerador-lorem-codigo' => ['title' => 'Gerador Lorem Código', 'lead' => 'Gere blocos de texto para mock de código.', 'icon' => '📄', 'type' => 'lorem_code'],
        'gerador-nanoid' => ['title' => 'Gerador NanoID', 'lead' => 'Gere IDs curtos aleatórios.', 'icon' => '🆔', 'type' => 'nanoid'],
        'gerador-pis' => ['title' => 'Gerador PIS', 'lead' => 'Gere PIS válido para testes.', 'icon' => '🪪', 'type' => 'gen_pis'],
        'gerador-renavam' => ['title' => 'Gerador RENAVAM', 'lead' => 'Gere RENAVAM sintético.', 'icon' => '🚗', 'type' => 'gen_renavam'],
        'gerador-senha-lote' => ['title' => 'Gerador Senha em Lote', 'lead' => 'Gere múltiplas senhas fortes.', 'icon' => '🔑', 'type' => 'password_batch'],
        'gerador-telefone-fake' => ['title' => 'Gerador Telefone Fake', 'lead' => 'Gere telefones brasileiros sintéticos.', 'icon' => '📱', 'type' => 'gen_phone'],
        'gerador-token-base64' => ['title' => 'Gerador Token Base64', 'lead' => 'Gere token aleatório em Base64.', 'icon' => '🎟️', 'type' => 'token_base64'],
        'gerador-token-hex' => ['title' => 'Gerador Token HEX', 'lead' => 'Gere token aleatório em hexadecimal.', 'icon' => '🎟️', 'type' => 'token_hex'],
        'gerador-usuarios-fake' => ['title' => 'Gerador Usuários Fake', 'lead' => 'Gere lista de usuários fictícios.', 'icon' => '👤', 'type' => 'fake_users'],
        'gerador-uuid-v4-lote' => ['title' => 'Gerador UUID v4 em Lote', 'lead' => 'Gere UUIDs v4 para testes.', 'icon' => '🆔', 'type' => 'uuid_batch'],
        'minificador-css' => ['title' => 'Minificador CSS', 'lead' => 'Remova espaços e quebras no CSS.', 'icon' => '🗜️', 'type' => 'minify_css'],
        'minificador-js' => ['title' => 'Minificador JS', 'lead' => 'Remova espaços e quebras no JavaScript.', 'icon' => '🗜️', 'type' => 'minify_js'],
        'minificador-sql' => ['title' => 'Minificador SQL', 'lead' => 'Compacte consultas SQL.', 'icon' => '🗜️', 'type' => 'minify_sql'],
        'minificador-xml' => ['title' => 'Minificador XML', 'lead' => 'Compacte XML removendo espaços.', 'icon' => '🗜️', 'type' => 'minify_xml'],
        'validador-cnpj' => ['title' => 'Validador CNPJ', 'lead' => 'Valide CNPJ com cálculo dos dígitos.', 'icon' => '✅', 'type' => 'validate_cnpj'],
        'validador-cpf' => ['title' => 'Validador CPF', 'lead' => 'Valide CPF com cálculo dos dígitos.', 'icon' => '✅', 'type' => 'validate_cpf'],
        'validador-luhn' => ['title' => 'Validador Luhn', 'lead' => 'Valide números por algoritmo Luhn.', 'icon' => '✅', 'type' => 'validate_luhn'],
        'validador-pis' => ['title' => 'Validador PIS', 'lead' => 'Valide PIS pelo dígito verificador.', 'icon' => '✅', 'type' => 'validate_pis'],
        'validador-renavam' => ['title' => 'Validador RENAVAM', 'lead' => 'Valide RENAVAM simplificado.', 'icon' => '✅', 'type' => 'validate_renavam'],
        'validador-xml' => ['title' => 'Validador XML', 'lead' => 'Valide estrutura XML básica.', 'icon' => '✅', 'type' => 'validate_xml'],
    ];

    return $defs;
}

function ns_render_block3b_tool(string $slug): void
{
    $defs = ns_block3b_tool_defs();
    if (!isset($defs[$slug])) {
        http_response_code(404);
        echo 'Ferramenta do bloco 3B não encontrada.';
        return;
    }
    $def = $defs[$slug];
    ns_redirect_legacy_url('/ferramentas/' . $slug);
    ns_render_page_start('tool:' . $slug);
    $tool = ns_tool($slug);
    ?>
<main><div class="tool-page">
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
</div></main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function v(id){const el=document.getElementById(id);return el?el.value.trim():'';}
function setResult(txt){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=txt;document.getElementById('tool-detail').textContent='Resultado gerado com base nas entradas informadas.';showResult('tool-result');}
function showError(msg){document.getElementById('tool-error-text').textContent=msg;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function digits(text){return (text||'').replace(/\D+/g,'');}
function runTool(){
  const input=v('input-text');
  const a=v('input-a');
  if(slug==='gerador-dados-json-fake'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const arr=[];for(let i=1;i<=qtd;i++){arr.push({id:i,nome:`Usuario ${i}`,email:`usuario${i}@exemplo.com`});}setResult(JSON.stringify(arr,null,2));return;}
  if(slug==='gerador-dados-sql-fake'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const out=[];for(let i=1;i<=qtd;i++){out.push(`INSERT INTO usuarios (id,nome,email) VALUES (${i}, 'Usuario ${i}', 'usuario${i}@exemplo.com');`);}setResult(out.join('\n'));return;}
  if(slug==='gerador-hash-md5' || slug==='gerador-hash-sha1' || slug==='gerador-hmac-sha256'){showError('Hash/HMAC dependem de Web Crypto no navegador de execução final.');return;}
  if(slug==='gerador-ie-simples'){setResult(String(Math.floor(100000000+Math.random()*899999999)));return;}
  if(slug==='gerador-jwt-payload'){const sub=a||'user_123';const role=v('input-b')||'admin';setResult(JSON.stringify({sub,role,iat:Math.floor(Date.now()/1000)},null,2));return;}
  if(slug==='gerador-lorem-codigo'){const qtd=Math.min(Math.max(parseInt(a||'8',10),1),100);const lines=[];for(let i=1;i<=qtd;i++){lines.push(`// bloco ${i}: TODO implementar lógica específica`);}setResult(lines.join('\n'));return;}
  if(slug==='gerador-nanoid'){const len=Math.min(Math.max(parseInt(a||'21',10),6),64);const chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';let out='';for(let i=0;i<len;i++)out+=chars[Math.floor(Math.random()*chars.length)];setResult(out);return;}
  if(slug==='gerador-pis'){let n='';for(let i=0;i<10;i++)n+=Math.floor(Math.random()*10);const w=[3,2,9,8,7,6,5,4,3,2];const s=n.split('').reduce((acc,d,i)=>acc+Number(d)*w[i],0);const r=11-(s%11);const dv=(r===10||r===11)?0:r;setResult(n+dv);return;}
  if(slug==='gerador-renavam'){let n='';for(let i=0;i<10;i++)n+=Math.floor(Math.random()*10);setResult(n+Math.floor(Math.random()*10));return;}
  if(slug==='gerador-senha-lote'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const len=Math.min(Math.max(parseInt(v('input-b')||'12',10),8),64);const chars='ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%*';const out=[];for(let j=0;j<qtd;j++){let p='';for(let i=0;i<len;i++)p+=chars[Math.floor(Math.random()*chars.length)];out.push(p);}setResult(out.join('\n'));return;}
  if(slug==='gerador-telefone-fake'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const out=[];for(let i=0;i<qtd;i++){const ddd=Math.floor(11+Math.random()*88);const n=Math.floor(900000000+Math.random()*99999999);out.push(`(${ddd}) ${String(n).slice(0,5)}-${String(n).slice(5)}`);}setResult(out.join('\n'));return;}
  if(slug==='gerador-token-base64'){const len=Math.min(Math.max(parseInt(a||'32',10),8),256);let raw='';for(let i=0;i<len;i++)raw+=String.fromCharCode(Math.floor(Math.random()*256));setResult(btoa(raw));return;}
  if(slug==='gerador-token-hex'){const len=Math.min(Math.max(parseInt(a||'32',10),8),256);let out='';for(let i=0;i<len;i++)out+=Math.floor(Math.random()*16).toString(16);setResult(out);return;}
  if(slug==='gerador-usuarios-fake'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const arr=[];for(let i=1;i<=qtd;i++){arr.push(`Usuario ${i};usuario${i}@exemplo.com;ativo`);}setResult(arr.join('\n'));return;}
  if(slug==='gerador-uuid-v4-lote'){const qtd=Math.min(Math.max(parseInt(a||'10',10),1),200);const u=()=> 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,c=>{const r=Math.random()*16|0,vv=c==='x'?r:(r&0x3|0x8);return vv.toString(16);});setResult(Array.from({length:qtd},u).join('\n'));return;}
  if(slug==='minificador-css' || slug==='minificador-js' || slug==='minificador-sql' || slug==='minificador-xml'){if(!input){showError('Informe conteúdo.');return;}setResult(input.replace(/\/\*[\s\S]*?\*\//g,'').replace(/\s+/g,' ').replace(/\s*([{};:,()<>+=-])\s*/g,'$1').trim());return;}
  if(slug==='validador-cnpj'){const c=digits(input);if(c.length!==14){showError('CNPJ deve ter 14 dígitos.');return;}const calc=(arr,w)=>{let s=0;for(let i=0;i<w.length;i++)s+=Number(arr[i])*w[i];const r=s%11;return r<2?0:11-r;};const d1=calc(c,[5,4,3,2,9,8,7,6,5,4,3,2]);const d2=calc(c,[6,5,4,3,2,9,8,7,6,5,4,3,2]);setResult((d1===Number(c[12])&&d2===Number(c[13]))?'CNPJ válido':'CNPJ inválido');return;}
  if(slug==='validador-cpf'){const c=digits(input);if(c.length!==11){showError('CPF deve ter 11 dígitos.');return;}const calc=(arr,f)=>{let s=0;for(let i=0;i<f-1;i++)s+=Number(arr[i])*(f-i);let r=(s*10)%11;return r===10?0:r;};const d1=calc(c,10),d2=calc(c,11);setResult((d1===Number(c[9])&&d2===Number(c[10]))?'CPF válido':'CPF inválido');return;}
  if(slug==='validador-luhn'){const c=digits(input);if(!c){showError('Informe número.');return;}let sum=0;let alt=false;for(let i=c.length-1;i>=0;i--){let n=Number(c[i]);if(alt){n*=2;if(n>9)n-=9;}sum+=n;alt=!alt;}setResult(sum%10===0?'Válido pelo Luhn':'Inválido pelo Luhn');return;}
  if(slug==='validador-pis'){const c=digits(input);if(c.length!==11){showError('PIS deve ter 11 dígitos.');return;}const w=[3,2,9,8,7,6,5,4,3,2];const s=c.slice(0,10).split('').reduce((acc,d,i)=>acc+Number(d)*w[i],0);const r=11-(s%11);const dv=(r===10||r===11)?0:r;setResult(dv===Number(c[10])?'PIS válido':'PIS inválido');return;}
  if(slug==='validador-renavam'){const c=digits(input);setResult(c.length>=10&&c.length<=11?'RENAVAM em formato válido (checagem estrutural)':'RENAVAM inválido');return;}
  if(slug==='validador-xml'){if(!input){showError('Informe XML.');return;}const open=(input.match(/<([a-zA-Z0-9_:-]+)(\s|>)/g)||[]).length;const close=(input.match(/<\/[a-zA-Z0-9_:-]+>/g)||[]).length;setResult(open>0&&open===close?'XML estruturalmente consistente':'XML com possível inconsistência de tags');return;}
  showError('Operação não mapeada.');
}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent;if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;}copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
