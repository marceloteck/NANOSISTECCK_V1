from pathlib import Path
import re

root = Path(__file__).resolve().parents[1]
catalog = (root / 'config' / 'catalog.php').read_text(encoding='utf-8', errors='ignore')
slugs = list(dict.fromkeys(re.findall(r"'slug' => '([^']+)'", catalog)))

rows = []
for slug in slugs:
    file_path = root / 'ferramentas' / f'{slug}.php'
    text = file_path.read_text(encoding='utf-8', errors='ignore') if file_path.exists() else ''

    score = 0
    reasons = []

    if any(prefix in slug for prefix in ['calculadora', 'conversor', 'validador', 'gerador', 'parser', 'decoder', 'formatador', 'minificador', 'extrator']):
        score += 2

    if len(text) > 4500:
        score += 2
    elif len(text) > 2500:
        score += 1

    if '<h2>' in text and text.count('<h2>') >= 3:
        score += 2
    elif '<h2>' in text:
        score += 1

    if 'runTool(){' in text and 'const slug=' in text:
        score -= 3
        reasons.append('template_generico')

    if 'Sobre esta ferramenta' in text and 'Preencha os campos, clique em <strong>Executar</strong>' in text:
        score -= 2
        reasons.append('texto_superficial')

    if '�' in text:
        score -= 2
        reasons.append('encoding_quebrado')

    if text.count('\n') < 8:
        score -= 1
        reasons.append('arquivo_compacto')

    if score >= 4:
        quality = 'green'
    elif score >= 1:
        quality = 'yellow'
    else:
        quality = 'red'

    rows.append((slug, quality, score, reasons[:3]))

summary = {'green': 0, 'yellow': 0, 'red': 0}
for _, quality, _, _ in rows:
    summary[quality] += 1

php_lines = [
    '<?php',
    '',
    'return [',
    "  'summary' => [",
    f"    'green' => {summary['green']},",
    f"    'yellow' => {summary['yellow']},",
    f"    'red' => {summary['red']},",
    '  ],',
    "  'tools' => [",
]

for slug, quality, score, reasons in rows:
    reason = ','.join(reasons) if reasons else 'ok'
    php_lines.append(f"    '{slug}' => ['class' => '{quality}', 'score' => {score}, 'reason' => '{reason}'],")

php_lines.extend(['  ],', '];', ''])
(root / 'config' / 'tool-quality.php').write_text('\n'.join(php_lines), encoding='utf-8')

report_lines = [
    '# Classificação de qualidade das ferramentas',
    '',
    'Data: 2026-04-06',
    '',
    f"- 🟢 green: {summary['green']}",
    f"- 🟡 yellow: {summary['yellow']}",
    f"- 🔴 red: {summary['red']}",
    '',
    '## Top 80 páginas prioritárias (🟢)',
    '',
]

for slug, _, score, _ in sorted([row for row in rows if row[1] == 'green'], key=lambda item: item[2], reverse=True)[:80]:
    report_lines.append(f'- {slug} (score {score})')

report_lines.extend(['', '## Páginas em espera (🔴 noindex)', ''])

for slug, _, score, reasons in [row for row in rows if row[1] == 'red']:
    reason = ','.join(reasons) if reasons else 'n/a'
    report_lines.append(f'- {slug} (score {score}; {reason})')

(root / 'docs' / 'classificacao-ferramentas-2026-04-06.md').write_text('\n'.join(report_lines), encoding='utf-8')

print(summary)
