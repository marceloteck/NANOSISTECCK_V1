<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/conversor-texto');
ns_render_page_start('tool:conversor-texto');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Conversor de Texto</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8f4fd,#b3d9f5)">🔄</div>
      <div>
        <h1>Conversor de Texto</h1>
        <p>Transforme texto em maiúsculas, minúsculas, slug, camelCase e outros formatos úteis para conteúdo e código.</p>
        <span class="tag tag-blue">Texto</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-group"><label for="entrada">Texto Original</label><textarea id="entrada" class="form-control" rows="5" placeholder="Digite ou cole seu texto aqui..."></textarea></div>
      <div style="display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:1.5rem;"><button class="btn btn-outline" onclick="converter('upper')">MAIÚSCULAS</button><button class="btn btn-outline" onclick="converter('lower')">minúsculas</button><button class="btn btn-outline" onclick="converter('title')">Formato Título</button><button class="btn btn-outline" onclick="converter('sentence')">Primeira maiúscula</button><button class="btn btn-outline" onclick="converter('camel')">camelCase</button><button class="btn btn-outline" onclick="converter('pascal')">PascalCase</button><button class="btn btn-outline" onclick="converter('snake')">snake_case</button><button class="btn btn-outline" onclick="converter('slug')">slug-url</button><button class="btn btn-outline" onclick="converter('inverso')">esrever</button><button class="btn btn-outline" onclick="converter('remover-acentos')">Remover Acentos</button><button class="btn btn-outline" onclick="converter('remover-espacos')">Remover Espaços Extras</button><button class="btn btn-outline" onclick="converter('alternar')">aLtErNaDo</button></div>
      <div class="form-group"><label for="saida">Texto Convertido</label><textarea id="saida" class="form-control" rows="5" readonly placeholder="Resultado aparecerá aqui..."></textarea></div>
      <div style="display:flex;gap:.75rem;flex-wrap:wrap;"><button class="copy-btn" id="copy-btn" onclick="copiarResultado()">Copiar Resultado</button><button class="btn btn-outline" style="padding:.4rem .85rem;font-size:.85rem;" onclick="usarComoEntrada()">Usar como Entrada</button><button class="btn btn-outline" style="padding:.4rem .85rem;font-size:.85rem;color:var(--text3);" onclick="limpar()">Limpar</button></div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
  </div>
</main>
<script>
function removerAcentos(s){return s.normalize('NFD').replace(/[\u0300-\u036f]/g,'');}
function converter(tipo){const entrada=document.getElementById('entrada').value;if(!entrada.trim()){alert('Digite algum texto primeiro.');return;}let saida='';switch(tipo){case 'upper':saida=entrada.toUpperCase();break;case 'lower':saida=entrada.toLowerCase();break;case 'title':saida=entrada.toLowerCase().replace(/(?:^|\s)\S/g,l=>l.toUpperCase());break;case 'sentence':saida=entrada.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g,l=>l.toUpperCase());break;case 'inverso':saida=entrada.split('').reverse().join('');break;case 'remover-acentos':saida=removerAcentos(entrada);break;case 'remover-espacos':saida=entrada.replace(/\s+/g,' ').trim();break;case 'alternar':saida=entrada.split('').map((c,i)=>i%2===0?c.toLowerCase():c.toUpperCase()).join('');break;case 'slug':saida=removerAcentos(entrada).toLowerCase().replace(/[^a-z0-9\s-]/g,'').replace(/\s+/g,'-').replace(/-+/g,'-').trim();break;case 'snake':saida=removerAcentos(entrada).toLowerCase().replace(/[^a-z0-9\s_]/g,'').replace(/\s+/g,'_').replace(/_+/g,'_').trim();break;case 'camel':saida=removerAcentos(entrada).toLowerCase().replace(/[^a-z0-9\s]/g,'').replace(/\s+(\w)/g,(_,c)=>c.toUpperCase());break;case 'pascal':saida=removerAcentos(entrada).toLowerCase().replace(/[^a-z0-9\s]/g,'').replace(/(?:^|\s)(\w)/g,(_,c)=>c.toUpperCase()).replace(/\s/g,'');break;default:saida=entrada;}document.getElementById('saida').value=saida;}
function copiarResultado(){const s=document.getElementById('saida').value;if(s)copyToClipboard(s,document.getElementById('copy-btn'));}
function usarComoEntrada(){const s=document.getElementById('saida').value;if(s)document.getElementById('entrada').value=s;}
function limpar(){document.getElementById('entrada').value='';document.getElementById('saida').value='';}
</script>
<?php ns_render_page_end(); ?>
