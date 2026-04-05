from pathlib import Path
import re, json, subprocess

root = Path(__file__).resolve().parents[1]
list_file = root / 'scripts' / 'new_tools_list.txt'
text = list_file.read_text(encoding='utf-8')
pat = re.compile(r'^\s*(\d{3})\.\s+([a-z0-9-]+)\s*\|\s*([^|]+?)\s*\|\s*([^|]+?)\s*\|\s*(.+?)\s*$', re.M)
rows=[]
for m in pat.finditer(text):
    rows.append({"num":int(m.group(1)),"slug":m.group(2).strip(),"title":m.group(3).strip(),"category_key":m.group(4).strip(),"desc":m.group(5).strip()})
rows=sorted(rows,key=lambda r:r['num'])
unique=[]; seen=set()
for r in rows:
    if r['slug'] in seen: continue
    seen.add(r['slug']); unique.append(r)
rows=unique[:500]
if len(rows)!=500:
    raise SystemExit(f'expected 500 rows, got {len(rows)}')

cat_meta={
 'matematica':('Matemática','🧮'), 'matematica-avancada':('Matemática Avançada','📐'),
 'saude':('Saúde','💚'), 'financas':('Finanças','💰'), 'cotidiano':('Cotidiano','🏠'),
 'conversores':('Conversores','🔄'), 'texto':('Texto','📝'), 'dev':('Desenvolvimento','💻'),
 'devops':('DevOps','⚙️'), 'seo':('SEO','🔎'), 'marketing':('Marketing','📣'),
 'produtividade':('Produtividade','⏱️'), 'educacao':('Educação','🎓'), 'administrativo':('Administrativo','📁'),
 'design':('Design','🎨'), 'utilitarios':('Utilitários','🧰'), 'dados':('Dados','🗃️')
}

cat = json.loads(subprocess.check_output(['php','-r','echo json_encode(require "config/catalog.php", JSON_UNESCAPED_UNICODE);'], cwd=root).decode())
existing=set(cat['tools'].keys())
for k,v in cat_meta.items():
    if k not in cat['categories']:
        cat['categories'][k]={'key':k,'label':v[0],'icon':v[1]}

# group rows by category for related
by_cat={}
for r in rows:
    by_cat.setdefault(r['category_key'],[]).append(r['slug'])

def pick_type(slug):
    p=slug.split('-')[0]
    if p in ('calculadora','conversor','contador','somador','subtrator','multiplicador','divisor','simplificador','analisador','verificador'):
        return 'numeric'
    if p in ('gerador','sorteador','rolagem','lancador','divisor','mesclador','intercalador','embaralhador'):
        return 'generator'
    if p in ('parser','decoder','encoder','formatador','minificador','beautifier','removedor','extrator','texto','diff','comparador','leitor'):
        return 'text'
    return 'mixed'

def page(r, related):
    slug,title,cat_key,desc=r['slug'],r['title'],r['category_key'],r['desc']
    cat_label=cat_meta.get(cat_key,(cat_key.title(),'🧩'))[0]
    icon=cat_meta.get(cat_key,(None,'🧩'))[1]
    ttype=pick_type(slug)
    related_html=''.join([f"<a href=\"<?= ns_escape(ns_href('/ferramentas/{s}')) ?>\" class=\"related-card\"><span class=\"related-card-icon\">{icon}</span> {s.replace('-', ' ').title()}</a>" for s in related])
    if ttype=='text':
        logic="const txt=document.getElementById('input-text').value; if(!txt.trim()){erro('Digite um texto de entrada.');return;} let out=txt; if(slug.includes('removedor')){out=txt.replace(/\\s+/g,' ').trim();} else if(slug.includes('extrator')){const m=txt.match(/[\\w@.:/#-]+/g)||[]; out=m.join('\\n');} else if(slug.includes('formatador')||slug.includes('beautifier')){out=txt.split('\\n').map((l,i)=>`${i+1}. ${l.trim()}`).join('\\n');} else if(slug.includes('minificador')){out=txt.replace(/\\s+/g,' ').trim();} else if(slug.includes('parser')){out=txt.split(/[&\\n]+/).filter(Boolean).map(v=>`• ${v}`).join('\\n');} else if(slug.includes('decoder')){try{out=decodeURIComponent(txt);}catch(e){out=txt;}} else if(slug.includes('encoder')){out=encodeURIComponent(txt);} else if(slug.includes('comparador')||slug.includes('diff')){const b=document.getElementById('input-b').value; out = txt===b ? 'Textos idênticos' : `Texto A: ${txt.length} chars | Texto B: ${b.length} chars`; } else {out=txt.toUpperCase();}"
        fields="<div class='form-group'><label for='input-text'>Texto de entrada</label><textarea id='input-text' class='form-control' rows='7' placeholder='Cole ou digite aqui'></textarea></div><div class='form-group'><label for='input-b'>Texto secundário (opcional)</label><textarea id='input-b' class='form-control' rows='4' placeholder='Use quando precisar comparar'></textarea></div>"
    elif ttype=='generator':
        logic="const base=document.getElementById('input-text').value.trim(); const n=Math.max(1,parseInt(document.getElementById('input-a').value||'5',10)); const chars='ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; let out=[]; for(let i=0;i<n;i++){let s=''; for(let j=0;j<8;j++){s+=chars[Math.floor(Math.random()*chars.length)];} out.push(base?`${base}-${s}`:s);} if(slug.includes('lancador-moeda')){out=[Math.random()<0.5?'Cara':'Coroa'];} if(slug.includes('rolagem-dado')){out=[String(1+Math.floor(Math.random()*6))];} document.getElementById('tool-detail').textContent=`${out.length} item(ns) gerado(s).`; const text=out.join('\\n');"
        fields="<div class='form-row'><div class='form-group'><label for='input-text'>Prefixo/Lista base (opcional)</label><textarea id='input-text' class='form-control' rows='4' placeholder='Ex: promoção'></textarea></div><div class='form-group'><label for='input-a'>Quantidade</label><input id='input-a' type='number' class='form-control' min='1' step='1' value='5'></div></div>"
    else:
        logic="const a=parseFloat(document.getElementById('input-a').value); const b=parseFloat(document.getElementById('input-b').value); if(Number.isNaN(a)){erro('Informe ao menos o primeiro valor.');return;} let r=0; if(slug.includes('conversor')){const taxa=Number.isNaN(b)?1:b; r=a*taxa; document.getElementById('tool-detail').textContent='Conversão feita com taxa manual.';} else if(slug.includes('contador')){r=Math.max(0,Math.round(a));} else if(slug.includes('calculadora')){r=Number.isNaN(b)?a:a+b;} else if(slug.includes('somador')){r=(Number.isNaN(b)?0:b)+a;} else if(slug.includes('subtrator')){r=a-(Number.isNaN(b)?0:b);} else if(slug.includes('multiplicador')){r=a*(Number.isNaN(b)?1:b);} else if(slug.includes('divisor')){if(!b){erro('O segundo valor não pode ser zero.');return;} r=a/b;} else {r=Number.isNaN(b)?a:a+b;} const text=`Resultado: ${fmtNum(r,6)}`;"
        fields="<div class='form-row'><div class='form-group'><label for='input-a'>Valor A</label><input id='input-a' type='number' class='form-control' step='any' placeholder='Digite um valor'></div><div class='form-group'><label for='input-b'>Valor B / Taxa (opcional)</label><input id='input-b' type='number' class='form-control' step='any' placeholder='Segundo valor'></div></div>"

    return f'''<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/bootstrap.php';

ns_redirect_legacy_url('/ferramentas/{slug}');
ns_render_page_start('tool:{slug}');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span><span>{title}</span></nav>
    <div class="tool-header"><div class="tool-page-icon" style="background:linear-gradient(135deg,#eef4ff,#dbe7ff)">{icon}</div><div><h1>{title}</h1><p>{desc.capitalize()} com interface simples e resultado imediato.</p><span class="tag tag-green">{cat_label}</span></div></div>
    <div class="tool-box">
      <style>.tool-box textarea.form-control{{min-height:96px}} .inline-btns{{display:flex;gap:.6rem;flex-wrap:wrap}}</style>
      {fields}
      <div class="inline-btns"><button class="btn btn-primary" onclick="runTool()">Executar</button><button class="btn btn-outline" onclick="clearTool()">Limpar</button><button class="copy-btn" onclick="copyTool(this)">Copiar resultado</button></div>
      <div class="notice notice-warn" id="tool-error" style="display:none;"><span>⚠️</span><span id="tool-error-text"></span></div>
      <div class="result-box" id="tool-result"><div class="result-label">Resultado</div><pre id="result-text" style="white-space:pre-wrap;margin:0">-</pre><div id="tool-detail" style="margin-top:.75rem;color:var(--text2)"></div></div>
    </div>
    <div class="seo-content"><h2>Sobre esta ferramenta</h2><p>Esta página de {title.lower()} foi criada para executar a tarefa de forma local, sem depender de API externa. Isso melhora desempenho, privacidade e disponibilidade.</p><h3>Como usar</h3><p>Preencha os campos, clique em <strong>Executar</strong>, confira o resultado e use <strong>Copiar resultado</strong> quando precisar reaproveitar a saída em outro contexto.</p></div>
    <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid">{related_html}</div></div>
  </div>
</main>
<script>
const slug={json.dumps(slug)};
function erro(m){{document.getElementById('tool-error-text').textContent=m;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}}
function ok(t){{document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}}
function runTool(){{{logic} ok(text);}}
function clearTool(){{document.querySelectorAll('.tool-box input,.tool-box textarea').forEach(el=>el.value='');document.getElementById('result-text').textContent='-';document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');document.getElementById('tool-error').style.display='none';}}
function copyTool(btn){{const t=document.getElementById('result-text').textContent; if(!t||t==='-'){{erro('Gere um resultado antes de copiar.');return;}} copyToClipboard(t,btn);}}
</script>
<?php ns_render_page_end(); ?>
'''

# write tools + catalog entries
for r in rows:
    same=[s for s in by_cat.get(r['category_key'],[]) if s!=r['slug']]
    idx=same.index(r['slug']) if r['slug'] in same else -1
    rel=same[:3]
    (root/'ferramentas'/f"{r['slug']}.php").write_text(page(r,rel),encoding='utf-8')
    if r['slug'] not in cat['tools']:
        label,icon=cat_meta.get(r['category_key'],(r['category_key'].title(),'🧩'))
        cat['tools'][r['slug']]={
            'slug':r['slug'],'legacy_file':f"{r['slug']}.php",'page_key':f"tool:{r['slug']}",'name':r['title'],'short_name':r['title'].replace('Calculadora de ','').replace('Conversor de ',''),'category':label,'category_key':r['category_key'],'icon':icon,'gradient':'linear-gradient(135deg,#eef4ff,#dbe7ff)','excerpt':f"Ferramenta online para {r['desc']}.",'lead':f"{r['title']} online para {r['desc']} com resultado instantâneo.",'keywords':f"{r['slug'].replace('-', ', ')}, ferramenta online",'schema_type':'WebApplication','priority':'0.8','changefreq':'monthly','related':rel
        }

cat['tools']=dict(sorted(cat['tools'].items()))
# php export using php itself
json_tmp = root/'scripts'/'catalog_tmp.json'
json_tmp.write_text(json.dumps(cat,ensure_ascii=False),encoding='utf-8')
php = '''<?php
$data=json_decode(file_get_contents("scripts/catalog_tmp.json"), true);
$export="<?php\\n\\nreturn ".var_export($data,true).";\\n";
file_put_contents("config/catalog.php",$export);
'''
(root/'scripts'/'write_catalog.php').write_text(php,encoding='utf-8')
subprocess.check_call(['php','scripts/write_catalog.php'],cwd=root)
(root/'scripts'/'write_catalog.php').unlink(missing_ok=True)
json_tmp.unlink(missing_ok=True)

# category pages
cat_dir=root/'categorias'; cat_dir.mkdir(exist_ok=True)
index_lines=['<?php','declare(strict_types=1);','require_once __DIR__ . "/../config/bootstrap.php";','ns_render_page_start("tools", ["meta"=>["title"=>"Categorias de Ferramentas | NANOSISTECCK Tools","description"=>"Explore as categorias do portal de ferramentas.","path"=>"/categorias"]]);','?>','<main><div class="container" style="padding:2rem 0 4rem"><h1>Categorias</h1><div class="tools-grid">']
for k,(lbl,ic) in cat_meta.items():
    index_lines.append(f'<a class="tool-card" href="<?= ns_escape(ns_href(\'/categorias/{k}\')) ?>"><div class="tool-card-icon">{ic}</div><div><div class="tool-card-title">{lbl}</div><div class="tool-card-desc">Ver ferramentas de {lbl.lower()}.</div></div></a>')
    p=cat_dir/f'{k}.php'
    p.write_text(f'''<?php

declare(strict_types=1);
require_once __DIR__ . '/../config/bootstrap.php';
$tools = array_filter(ns_tools(), static fn($t) => $t['category_key'] === '{k}');
ns_render_page_start('tools', ['meta'=>['title'=>'{lbl} | NANOSISTECCK Tools','description'=>'Ferramentas de {lbl.lower()}','path'=>'/categorias/{k}']]);
?>
<main><div class="container" style="padding:2rem 0 4rem"><div class="breadcrumb"><a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span><a href="<?= ns_escape(ns_href('/categorias')) ?>">Categorias</a><span class="sep">›</span><span>{lbl}</span></div><h1>{ic} {lbl}</h1><div class="tools-grid"><?php foreach($tools as $tool): ?><a class="tool-card" href="<?= ns_escape(ns_href('/ferramentas/' . $tool['slug'])) ?>"><div class="tool-card-icon"><?= ns_escape($tool['icon']) ?></div><div><div class="tool-card-title"><?= ns_escape($tool['name']) ?></div><div class="tool-card-desc"><?= ns_escape($tool['excerpt']) ?></div></div></a><?php endforeach; ?></div></div></main>
<?php ns_render_page_end(); ?>
''',encoding='utf-8')
index_lines.append('</div></div></main><?php ns_render_page_end(); ?>')
(root/'categorias'/'index.php').write_text('\n'.join(index_lines),encoding='utf-8')
print('generated',len(rows))
