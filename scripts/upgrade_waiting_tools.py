from pathlib import Path
import re

root = Path(__file__).resolve().parents[1]
quality = (root / 'config' / 'tool-quality.php').read_text(encoding='utf-8', errors='ignore')
waiting = set(re.findall(r"'([^']+)' => \['class' => '(?:red|yellow)'", quality))

for slug in sorted(waiting):
    file_path = root / 'ferramentas' / f'{slug}.php'
    if not file_path.exists():
        continue

    text = file_path.read_text(encoding='utf-8', errors='ignore')

    h1_match = re.search(r'<h1>(.*?)</h1>', text, re.S)
    title = h1_match.group(1).strip() if h1_match else slug.replace('-', ' ').title()

    intro_match = re.search(r'<p>(.*?)</p><span class="tag', text, re.S)
    intro = intro_match.group(1).strip() if intro_match else f'Use {title} para executar a tarefa com rapidez.'

    enhanced = (
        '<div class="seo-content">'
        f'<h2>O que esta ferramenta resolve</h2><p>{title} foi estruturada para resolver uma tarefa prática com execução rápida no navegador, sem instalação. {intro}</p>'
        '<h2>Quando usar</h2><p>Use quando você precisa de uma resposta imediata para trabalho, estudo, operação ou validação técnica e quer reduzir retrabalho.</p>'
        '<h2>Quando NÃO usar</h2><p>Não use como única base para decisões críticas sem revisão humana, validação de contexto e conferência de unidades/entradas.</p>'
        '<h2>Erros comuns</h2><ul><li>Preencher campos com unidade errada.</li><li>Interpretar resultado sem contexto do problema real.</li><li>Copiar saída sem validar premissas e limites.</li></ul>'
        '<h2>Exemplo prático</h2><p>Preencha os campos com dados reais, execute, valide a interpretação exibida na tela e só então use o resultado em relatório, orçamento ou documentação.</p>'
        '<h2>Boas práticas de qualidade</h2><p>Revise dados de entrada, mantenha rastreabilidade da origem dos números e faça dupla checagem quando o resultado impactar finanças, saúde, jurídico ou compliance.</p>'
        '</div>'
    )

    pattern = re.compile(r'<div class="seo-content">.*?</div>\s*<div class="related-tools">', re.S)
    if pattern.search(text):
        text = pattern.sub(enhanced + '<div class="related-tools">', text, count=1)

    # Improve default JS feedback for generated templates
    text = text.replace(
        "function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;showResult('tool-result');}",
        "function ok(t){document.getElementById('tool-error').style.display='none';document.getElementById('result-text').textContent=t;const detail=document.getElementById('tool-detail');if(detail && !detail.textContent){detail.textContent='Resultado gerado. Revise o contexto antes de aplicar em decisão final.';}showResult('tool-result');}"
    )

    # Stronger empty-check for generic text input
    text = text.replace(
        "const base=document.getElementById('input-text').value.trim(); const n=Math.max(1,parseInt(document.getElementById('input-a').value||'5',10));",
        "const base=document.getElementById('input-text').value.trim(); const n=Math.max(1,parseInt(document.getElementById('input-a').value||'5',10)); if(n>200){erro('Limite de 200 itens por execução para manter performance.');return;}"
    )

    file_path.write_text(text, encoding='utf-8')

print(f'upgraded {len(waiting)} waiting tools')
