<?php

declare(strict_types=1);

function ns_block1_tool_defs(): array
{
    static $defs = null;
    if ($defs !== null) {
        return $defs;
    }

    $defs = [
        'analisador-comprimento-url' => ['title' => 'Analisador de Comprimento de URL', 'lead' => 'Analise tamanho total da URL e limites recomendados para SEO.', 'icon' => '🔎', 'category' => 'SEO', 'type' => 'url_length'],
        'analisador-slug' => ['title' => 'Analisador de Slug', 'lead' => 'Valide legibilidade e estrutura do slug para SEO on-page.', 'icon' => '🔎', 'category' => 'SEO', 'type' => 'slug_check'],
        'calculadora-ctr' => ['title' => 'Calculadora de CTR', 'lead' => 'Calcule click-through rate a partir de cliques e impressões.', 'icon' => '📈', 'category' => 'SEO', 'type' => 'ratio_percent', 'a' => 'Cliques', 'b' => 'Impressões'],
        'calculadora-taxa-conversao' => ['title' => 'Calculadora de Taxa de Conversão', 'lead' => 'Calcule taxa de conversão de páginas e campanhas.', 'icon' => '📈', 'category' => 'SEO', 'type' => 'ratio_percent', 'a' => 'Conversões', 'b' => 'Visitas'],
        'calculadora-taxa-rejeicao' => ['title' => 'Calculadora de Taxa de Rejeição', 'lead' => 'Calcule bounce rate com base em sessões rejeitadas.', 'icon' => '📉', 'category' => 'SEO', 'type' => 'ratio_percent', 'a' => 'Sessões rejeitadas', 'b' => 'Sessões totais'],
        'contador-palavras-seo' => ['title' => 'Contador de Palavras SEO', 'lead' => 'Conte palavras, caracteres e densidade básica de palavra-chave.', 'icon' => '📝', 'category' => 'SEO', 'type' => 'word_count'],
        'extrator-headings-html' => ['title' => 'Extrator de Headings do HTML', 'lead' => 'Extraia H1-H6 de um HTML para auditoria rápida.', 'icon' => '🧩', 'category' => 'SEO', 'type' => 'extract_headings'],
        'extrator-meta-description' => ['title' => 'Extrator de Meta Description', 'lead' => 'Extraia e valide meta description em código HTML.', 'icon' => '🧩', 'category' => 'SEO', 'type' => 'extract_meta_description'],
        'extrator-titulos-seo' => ['title' => 'Extrator de Titles', 'lead' => 'Extraia a tag <title> de um HTML para revisão de snippet.', 'icon' => '🧩', 'category' => 'SEO', 'type' => 'extract_title'],
        'gerador-breadcrumb-schema' => ['title' => 'Gerador de Breadcrumb Schema', 'lead' => 'Crie JSON-LD BreadcrumbList para dados estruturados.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_breadcrumb'],
        'gerador-canonical-tag' => ['title' => 'Gerador de Canonical Tag', 'lead' => 'Gere tag canonical para consolidar versões duplicadas.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_canonical'],
        'gerador-cpf' => ['title' => 'Gerador de CPF', 'lead' => 'Gere CPF válido para testes de formulário e QA.', 'icon' => '🪪', 'category' => 'Geradores', 'type' => 'gen_cpf'],
        'gerador-meta-description' => ['title' => 'Gerador de Meta Description', 'lead' => 'Crie meta descriptions objetivas com tamanho recomendado.', 'icon' => '✍️', 'category' => 'SEO', 'type' => 'gen_meta_description'],
        'gerador-open-graph' => ['title' => 'Gerador de Open Graph', 'lead' => 'Gere tags Open Graph para compartilhamento social.', 'icon' => '🌐', 'category' => 'SEO', 'type' => 'gen_og'],
        'gerador-schema-article' => ['title' => 'Gerador de Schema Article', 'lead' => 'Gere JSON-LD Article para rich results.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'Article'],
        'gerador-schema-event' => ['title' => 'Gerador de Schema Event', 'lead' => 'Gere JSON-LD Event para rich results.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'Event'],
        'gerador-schema-howto' => ['title' => 'Gerador de Schema HowTo', 'lead' => 'Gere JSON-LD HowTo para rich results.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'HowTo'],
        'gerador-schema-local-business' => ['title' => 'Gerador de Schema Local Business', 'lead' => 'Gere JSON-LD LocalBusiness para SEO local.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'LocalBusiness'],
        'gerador-schema-organization' => ['title' => 'Gerador de Schema Organization', 'lead' => 'Gere JSON-LD Organization para entidade do site.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'Organization'],
        'gerador-schema-person' => ['title' => 'Gerador de Schema Person', 'lead' => 'Gere JSON-LD Person para perfis de autor.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'Person'],
        'gerador-schema-product' => ['title' => 'Gerador de Schema Product', 'lead' => 'Gere JSON-LD Product para páginas de produto.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'Product'],
        'gerador-schema-video' => ['title' => 'Gerador de Schema Video', 'lead' => 'Gere JSON-LD VideoObject para conteúdo em vídeo.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'VideoObject'],
        'gerador-schema-webpage' => ['title' => 'Gerador de Schema WebPage', 'lead' => 'Gere JSON-LD WebPage para página informativa.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'WebPage'],
        'gerador-schema-website' => ['title' => 'Gerador de Schema Website', 'lead' => 'Gere JSON-LD WebSite para entidade do domínio.', 'icon' => '🧱', 'category' => 'SEO', 'type' => 'gen_schema', 'schema_type' => 'WebSite'],
        'gerador-sitemap-html' => ['title' => 'Gerador de Sitemap HTML', 'lead' => 'Converta lista de URLs em sitemap HTML navegável.', 'icon' => '🗺️', 'category' => 'SEO', 'type' => 'gen_sitemap_html'],
        'gerador-sitemap-xml' => ['title' => 'Gerador de Sitemap XML', 'lead' => 'Converta lista de URLs em sitemap XML.', 'icon' => '🗺️', 'category' => 'SEO', 'type' => 'gen_sitemap_xml'],
        'gerador-title-seo' => ['title' => 'Gerador de Title SEO', 'lead' => 'Crie title tags com foco em CTR e limite de caracteres.', 'icon' => '✍️', 'category' => 'SEO', 'type' => 'gen_title'],
        'gerador-twitter-cards' => ['title' => 'Gerador de Twitter Cards', 'lead' => 'Gere meta tags Twitter Card para compartilhamento.', 'icon' => '🐦', 'category' => 'SEO', 'type' => 'gen_twitter'],
        'verificador-tamanho-titulo' => ['title' => 'Verificador de Tamanho de Título', 'lead' => 'Verifique risco de truncamento do title em SERP.', 'icon' => '📏', 'category' => 'SEO', 'type' => 'check_title'],
    ];

    return $defs;
}

function ns_block1_fields(array $def): string
{
    switch ($def['type']) {
        case 'url_length':
        case 'gen_canonical':
            return '<div class="form-group"><label for="input-url">URL</label><input id="input-url" type="url" class="form-control" placeholder="https://site.com/pagina" /></div>';
        case 'slug_check':
        case 'check_title':
            $label = $def['type'] === 'slug_check' ? 'Slug' : 'Título';
            return '<div class="form-group"><label for="input-text">' . ns_escape($label) . '</label><input id="input-text" type="text" class="form-control" placeholder="Digite aqui" /></div>';
        case 'ratio_percent':
            return '<div class="form-row"><div class="form-group"><label for="input-a">' . ns_escape((string) $def['a']) . '</label><input id="input-a" type="number" class="form-control" min="0" step="any" /></div><div class="form-group"><label for="input-b">' . ns_escape((string) $def['b']) . '</label><input id="input-b" type="number" class="form-control" min="1" step="any" /></div></div>';
        case 'word_count':
            return '<div class="form-group"><label for="input-text">Texto</label><textarea id="input-text" class="form-control" placeholder="Cole o texto"></textarea></div><div class="form-group"><label for="input-keyword">Palavra-chave (opcional)</label><input id="input-keyword" type="text" class="form-control" /></div>';
        case 'extract_headings':
        case 'extract_meta_description':
        case 'extract_title':
        case 'gen_sitemap_html':
        case 'gen_sitemap_xml':
            return '<div class="form-group"><label for="input-text">Conteúdo</label><textarea id="input-text" class="form-control" placeholder="Cole o conteúdo"></textarea></div>';
        case 'gen_breadcrumb':
            return '<div class="form-row"><div class="form-group"><label for="input-url">URL</label><input id="input-url" type="url" class="form-control" /></div><div class="form-group"><label for="input-name">Nome final da página</label><input id="input-name" type="text" class="form-control" /></div></div>';
        case 'gen_cpf':
            return '<div class="form-row"><div class="form-group"><label for="input-a">Quantidade</label><input id="input-a" type="number" class="form-control" min="1" max="20" step="1" value="1" /></div><div class="form-group"><label for="input-format">Com pontuação</label><select id="input-format" class="form-control"><option value="1">Sim</option><option value="0">Não</option></select></div></div>';
        case 'gen_meta_description':
        case 'gen_title':
            return '<div class="form-row"><div class="form-group"><label for="input-a">Palavra-chave</label><input id="input-a" type="text" class="form-control" /></div><div class="form-group"><label for="input-b">Contexto/benefício</label><input id="input-b" type="text" class="form-control" /></div></div>';
        case 'gen_og':
        case 'gen_twitter':
            return '<div class="form-row"><div class="form-group"><label for="input-a">Título</label><input id="input-a" type="text" class="form-control" /></div><div class="form-group"><label for="input-b">Descrição</label><input id="input-b" type="text" class="form-control" /></div></div><div class="form-row"><div class="form-group"><label for="input-url">URL (opcional no Twitter)</label><input id="input-url" type="url" class="form-control" /></div><div class="form-group"><label for="input-image">Imagem</label><input id="input-image" type="url" class="form-control" /></div></div>';
        case 'gen_schema':
            return '<div class="form-row"><div class="form-group"><label for="input-name">Nome</label><input id="input-name" type="text" class="form-control" /></div><div class="form-group"><label for="input-url">URL</label><input id="input-url" type="url" class="form-control" /></div></div><div class="form-group"><label for="input-text">Descrição (opcional)</label><textarea id="input-text" class="form-control"></textarea></div>';
        default:
            return '<div class="form-group"><label for="input-text">Entrada</label><textarea id="input-text" class="form-control"></textarea></div>';
    }
}

function ns_render_block1_tool(string $slug): void
{
    $defs = ns_block1_tool_defs();
    if (!isset($defs[$slug])) {
        http_response_code(404);
        echo 'Ferramenta de bloco não encontrada.';
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
      <style>.tool-box textarea.form-control{min-height:110px}</style>
      <?= ns_block1_fields($def) ?>
      <div class="form-row"><button type="button" class="btn btn-primary" onclick="runTool()">Executar</button><button type="button" class="btn btn-outline" onclick="clearTool()">Limpar</button><button type="button" class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="seo-content"><h2>O que esta ferramenta resolve</h2><p>Ferramenta focada em rotina prática de SEO técnico com resposta imediata e interpretação direta do resultado.</p><h2>Como usar</h2><p>Preencha os campos solicitados, execute e valide o resultado conforme o objetivo da página (indexação, snippet, schema ou auditoria).</p><h2>Boas práticas</h2><p>Sempre revise o resultado no contexto real do projeto antes de publicar alterações em produção.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid"><?php foreach (($tool['related'] ?? []) as $relatedSlug): $rel = ns_tool($relatedSlug); if (!$rel) { continue; } ?><a href="<?= ns_escape(ns_href('/ferramentas/' . $relatedSlug)) ?>" class="related-card"><span class="related-card-icon"><?= ns_escape($rel['icon']) ?></span> <?= ns_escape($rel['short_name']) ?></a><?php endforeach; ?></div></div>
  </div>
</main>
<script>
const slug = <?= json_encode($slug, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const schemaType = <?= json_encode((string) ($def['schema_type'] ?? ''), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
function value(id){const el=document.getElementById(id);return el?el.value.trim():'';}
function showError(message){document.getElementById('tool-error-text').textContent=message;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}
function setResult(text){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=text;document.getElementById('tool-detail').textContent='Resultado gerado com base nas entradas informadas.';showResult('tool-result');}
function safeText(html){return html.replace(/[&<>"']/g,(ch)=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));}
function runTool(){
  if(slug==='analisador-comprimento-url'){
    const raw=value('input-url'); if(!raw){showError('Informe uma URL.');return;}
    let u; try{u=new URL(raw);}catch(e){showError('URL inválida.');return;}
    const total=u.href.length; const path=u.pathname.length; const query=u.search?u.search.length-1:0;
    setResult(`Comprimento total: ${total} caracteres\nPath: ${path}\nQuery string: ${query}\nStatus SEO: ${total<=75?'Ótimo':(total<=115?'Atenção':'Muito longa')}`); return;
  }
  if(slug==='analisador-slug'){
    const raw=value('input-text'); if(!raw){showError('Informe um slug.');return;}
    const clean=raw.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'').replace(/[^a-z0-9\-\s]/g,'').trim().replace(/\s+/g,'-').replace(/-+/g,'-');
    setResult(`Slug normalizado: ${clean}\nTamanho: ${clean.length}\nFaixa recomendada: até 60 caracteres`); return;
  }
  if(['calculadora-ctr','calculadora-taxa-conversao','calculadora-taxa-rejeicao'].includes(slug)){
    const a=parseFloat(value('input-a')); const b=parseFloat(value('input-b')); if(Number.isNaN(a)||Number.isNaN(b)||b<=0||a<0){showError('Informe valores válidos.');return;}
    setResult(`Resultado: ${fmtNum((a/b)*100,2)}%`); return;
  }
  if(slug==='contador-palavras-seo'){
    const txt=value('input-text'); if(!txt){showError('Cole um texto.');return;}
    const words=(txt.match(/\S+/g)||[]).length; const chars=txt.length; const kw=value('input-keyword').toLowerCase();
    let dens='-'; if(kw){const escaped=kw.replace(/[.*+?^${}()|[\]\\]/g,'\\$&'); const hits=(txt.toLowerCase().match(new RegExp(escaped,'g'))||[]).length; dens=fmtNum((hits/Math.max(words,1))*100,2)+'%';}
    setResult(`Palavras: ${words}\nCaracteres: ${chars}\nDensidade da keyword: ${dens}`); return;
  }
  if(slug==='extrator-headings-html'){
    const html=value('input-text'); if(!html){showError('Cole o HTML.');return;}
    const matches=[...html.matchAll(/<(h[1-6])[^>]*>(.*?)<\/\1>/gis)]; if(!matches.length){setResult('Nenhum heading encontrado.');return;}
    setResult(matches.map((m,i)=>`${i+1}. ${m[1].toUpperCase()}: ${m[2].replace(/<[^>]+>/g,'').trim()}`).join('\n')); return;
  }
  if(slug==='extrator-meta-description'){
    const html=value('input-text'); if(!html){showError('Cole o HTML.');return;}
    const m=html.match(/<meta[^>]*name=["']description["'][^>]*content=["']([^"']*)["'][^>]*>/i)||html.match(/<meta[^>]*content=["']([^"']*)["'][^>]*name=["']description["'][^>]*>/i);
    if(!m){setResult('Meta description não encontrada.');return;}
    setResult(`Meta description: ${m[1]}\nTamanho: ${m[1].length}`); return;
  }
  if(slug==='extrator-titulos-seo'){
    const html=value('input-text'); if(!html){showError('Cole o HTML.');return;}
    const m=html.match(/<title[^>]*>(.*?)<\/title>/is); if(!m){setResult('Tag <title> não encontrada.');return;}
    const title=m[1].replace(/<[^>]+>/g,'').trim(); setResult(`Title: ${title}\nTamanho: ${title.length}`); return;
  }
  if(slug==='gerador-breadcrumb-schema'){
    const raw=value('input-url'); const name=value('input-name'); if(!raw||!name){showError('Preencha URL e nome.');return;}
    let u; try{u=new URL(raw);}catch(e){showError('URL inválida.');return;}
    const parts=u.pathname.split('/').filter(Boolean); const items=[{"@type":"ListItem",position:1,name:'Início',item:u.origin+'/'}];
    let acc=''; parts.forEach((p,i)=>{acc+='/'+p;items.push({"@type":"ListItem",position:i+2,name:decodeURIComponent(p).replace(/-/g,' '),item:u.origin+acc});});
    if(items.length>1){items[items.length-1].name=name;}
    setResult(JSON.stringify({"@context":"https://schema.org","@type":"BreadcrumbList",itemListElement:items},null,2)); return;
  }
  if(slug==='gerador-canonical-tag'){
    const url=value('input-url'); if(!url){showError('Informe a URL canônica.');return;} setResult(`<link rel=\"canonical\" href=\"${url}\" />`); return;
  }
  if(slug==='gerador-cpf'){
    const qtd=parseInt(value('input-a'),10); const fmt=value('input-format')==='1'; if(Number.isNaN(qtd)||qtd<1||qtd>20){showError('Quantidade entre 1 e 20.');return;}
    const dv=(arr,f)=>{let s=0;for(let i=0;i<arr.length;i++)s+=arr[i]*(f-i);const r=(s*10)%11;return r===10?0:r;};
    const out=[]; for(let k=0;k<qtd;k++){const n=Array.from({length:9},()=>Math.floor(Math.random()*10)); n.push(dv(n,10)); n.push(dv(n,11)); let cpf=n.join(''); if(fmt)cpf=cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,'$1.$2.$3-$4'); out.push(cpf);} setResult(out.join('\n')); return;
  }
  if(slug==='gerador-meta-description'){
    const a=value('input-a'); const b=value('input-b'); if(!a||!b){showError('Preencha palavra-chave e benefício.');return;}
    let desc=`${a}: ${b}. Use a ferramenta online e resolva em minutos.`; if(desc.length>160){desc=desc.slice(0,157)+'...';}
    setResult(`Meta description: ${desc}\nTamanho: ${desc.length}`); return;
  }
  if(slug==='gerador-open-graph'){
    const t=value('input-a'),d=value('input-b'),u=value('input-url'),i=value('input-image'); if(!t||!d||!u||!i){showError('Preencha todos os campos.');return;}
    setResult(`<meta property=\"og:type\" content=\"website\" />\n<meta property=\"og:title\" content=\"${safeText(t)}\" />\n<meta property=\"og:description\" content=\"${safeText(d)}\" />\n<meta property=\"og:url\" content=\"${u}\" />\n<meta property=\"og:image\" content=\"${i}\" />`); return;
  }
  if(slug.startsWith('gerador-schema-')){
    const name=value('input-name'),url=value('input-url'),desc=value('input-text'); if(!name||!url){showError('Preencha nome e URL.');return;}
    const schema={"@context":"https://schema.org","@type":schemaType,name:name,url:url}; if(desc){schema.description=desc;} setResult(JSON.stringify(schema,null,2)); return;
  }
  if(slug==='gerador-sitemap-html' || slug==='gerador-sitemap-xml'){
    const lines=(value('input-text')||'').split(/\n+/).map(v=>v.trim()).filter(Boolean); if(!lines.length){showError('Informe ao menos uma URL.');return;}
    if(slug==='gerador-sitemap-html'){setResult('<ul>\n'+lines.map(u=>`  <li><a href="${u}">${u}</a></li>`).join('\n')+'\n</ul>'); return;}
    setResult('<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'+lines.map(u=>`  <url>\n    <loc>${u}</loc>\n  </url>`).join('\n')+'\n</urlset>'); return;
  }
  if(slug==='gerador-title-seo'){
    const a=value('input-a'),b=value('input-b'); if(!a||!b){showError('Preencha palavra-chave e contexto.');return;} let title=`${a} | ${b}`; if(title.length>60)title=title.slice(0,57)+'...'; setResult(`Title sugerido: ${title}\nTamanho: ${title.length}`); return;
  }
  if(slug==='gerador-twitter-cards'){
    const t=value('input-a'),d=value('input-b'),img=value('input-image'); if(!t||!d||!img){showError('Preencha título, descrição e imagem.');return;}
    const url=value('input-url'); setResult(`<meta name=\"twitter:card\" content=\"summary_large_image\" />\n<meta name=\"twitter:title\" content=\"${safeText(t)}\" />\n<meta name=\"twitter:description\" content=\"${safeText(d)}\" />\n<meta name=\"twitter:image\" content=\"${img}\" />${url?`\n<meta name=\"twitter:url\" content=\"${url}\" />`:''}`); return;
  }
  if(slug==='verificador-tamanho-titulo'){
    const t=value('input-text'); if(!t){showError('Informe o título.');return;} const len=t.length; const px=Math.round(len*8.2);
    setResult(`Caracteres: ${len}\nLargura estimada: ${px}px\nFaixa recomendada: 45-60 caracteres`); return;
  }
  showError('Operação não configurada para esta ferramenta.');
}
function clearTool(){document.querySelectorAll('.tool-box input,.tool-box textarea,.tool-box select').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}
function copyTool(btn){const t=document.getElementById('result-text').textContent; if(!t||t==='-'){showError('Gere um resultado antes de copiar.');return;} copyToClipboard(t,btn);}
</script>
<?php ns_render_page_end();
}
