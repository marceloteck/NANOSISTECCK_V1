<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/config/bootstrap.php';
ns_redirect_legacy_url('/ferramentas/gerador-nomes');
ns_render_page_start('tool:gerador-nomes');
?>
<main>
  <div class="tool-page">
    <nav class="breadcrumb" aria-label="Navegação breadcrumb">
      <a href="<?= ns_escape(ns_href('/')) ?>">Início</a><span class="sep">›</span>
      <a href="<?= ns_escape(ns_href('/ferramentas')) ?>">Ferramentas</a><span class="sep">›</span>
      <span>Gerador de Nomes</span>
    </nav>
    <?php ns_render_ad_slot('leaderboard'); ?>
    <div class="tool-header">
      <div class="tool-page-icon" style="background:linear-gradient(135deg,#e8f5e9,#c8e6c9)">👤</div>
      <div>
        <h1>Gerador de Nomes Aleatórios</h1>
        <p>Gere nomes para personagens, perfis, protótipos e ideias de projeto em poucos segundos.</p>
        <span class="tag tag-green">Criatividade</span>
      </div>
    </div>
    <div class="tool-box">
      <div class="form-row">
        <div class="form-group"><label for="genero">Gênero</label><select id="genero" class="form-control"><option value="m">Masculino</option><option value="f">Feminino</option><option value="a">Aleatório</option></select></div>
        <div class="form-group"><label for="quantidade">Quantidade</label><select id="quantidade" class="form-control"><option value="1">1 nome</option><option value="5" selected>5 nomes</option><option value="10">10 nomes</option><option value="20">20 nomes</option></select></div>
        <div class="form-group"><label for="sobrenome">Incluir Sobrenome?</label><select id="sobrenome" class="form-control"><option value="sim">Sim</option><option value="nao">Não</option></select></div>
      </div>
      <button class="btn btn-primary btn-block btn-lg" onclick="gerarNomes()">Gerar Nomes</button>
      <div class="result-box" id="resultado" style="display:none">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.85rem;">
          <div class="result-label" style="margin:0">Nomes Gerados</div>
          <button class="copy-btn" id="copy-btn" onclick="copiarNomes()">Copiar Todos</button>
        </div>
        <div id="lista-nomes" style="display:grid;gap:.4rem;"></div>
      </div>
    </div>
    <?php ns_render_ad_slot('rectangle'); ?>
    <div class="related-tools">
      <h2>Ferramentas relacionadas</h2>
      <div class="related-grid">
        <a href="<?= ns_escape(ns_href('/ferramentas/gerador-senhas')) ?>" class="related-card"><span class="related-card-icon">🔐</span> Gerador de Senhas</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/gerador-cpf')) ?>" class="related-card"><span class="related-card-icon">🪪</span> Gerador de CPF</a>
        <a href="<?= ns_escape(ns_href('/ferramentas/contador-caracteres')) ?>" class="related-card"><span class="related-card-icon">🔢</span> Contador de Caracteres</a>
      </div>
    </div>
  </div>
</main>
<script>
const nM=['Lucas','Mateus','Pedro','Gabriel','Rafael','Felipe','Bruno','Eduardo','Henrique','Diego','Thiago','Rodrigo','Leonardo','Andre','Carlos','Fabio','Igor','Jonas','Leandro','Marcelo','Nathan','Otavio','Paulo','Renato','Sergio','Tiago','Victor','Wagner','Yuri','Alexandre','Bernardo','Caio','Danilo','Enzo','Fernando','Gustavo','Helio','Ivan','Julio','Kevin','Luis','Miguel','Nicolas','Patrick','Ricardo','Samuel','Tales'];
const nF=['Ana','Maria','Julia','Isabela','Fernanda','Beatriz','Camila','Amanda','Leticia','Larissa','Natalia','Patricia','Renata','Sabrina','Tatiana','Vanessa','Yasmin','Aline','Bruna','Carla','Daniela','Elisa','Fabiana','Gisele','Helena','Ingrid','Juliana','Karina','Livia','Mariana','Nathalia','Olivia','Paula','Roberta','Sandra','Thaina','Viviane','Alice','Carolina','Diana','Eliana','Gabriela','Heloisa','Iara','Jaqueline','Keila'];
const sob=['Silva','Santos','Oliveira','Souza','Rodrigues','Ferreira','Alves','Pereira','Lima','Gomes','Costa','Ribeiro','Martins','Carvalho','Almeida','Lopes','Sousa','Fernandes','Vieira','Barbosa','Rocha','Dias','Nascimento','Andrade','Moreira','Nunes','Marques','Machado','Mendes','Freitas','Cardoso','Ramos','Araujo','Teixeira','Correia','Melo','Pinto','Fonseca','Monteiro','Moura','Leite'];
let nomesGerados=[];
function gerarNomes(){const genero=document.getElementById('genero').value;const qtd=parseInt(document.getElementById('quantidade').value,10);const comSob=document.getElementById('sobrenome').value==='sim';nomesGerados=[];for(let k=0;k<qtd;k++){const pool=genero==='m'?nM:genero==='f'?nF:(Math.random()>0.5?nM:nF);const prim=pool[Math.floor(Math.random()*pool.length)];const sobrenome=sob[Math.floor(Math.random()*sob.length)];nomesGerados.push(comSob?prim+' '+sobrenome:prim);}document.getElementById('lista-nomes').innerHTML=nomesGerados.map(nome=>`<div style="padding:.55rem .9rem;background:var(--surface2);border-radius:var(--radius-sm);font-weight:600;font-size:.95rem;">${nome}</div>`).join('');document.getElementById('resultado').classList.add('show');document.getElementById('resultado').style.display='block';}
function copiarNomes(){copyToClipboard(nomesGerados.join('\n'),document.getElementById('copy-btn'));}
</script>
<?php ns_render_page_end(); ?>
