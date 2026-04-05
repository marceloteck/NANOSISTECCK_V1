<?php
declare(strict_types=1);

$root = dirname(__DIR__);
$toolsDir = $root . '/ferramentas';
$catalogFile = $root . '/config/catalog.php';
$catalog = require $catalogFile;
$tools = [];

function add_tool(array &$tools, array $tool): void
{
    $tools[] = $tool;
}

function seo_block(array $tool): string
{
    return '<div class="seo-content">'
        . '<h2>O que é essa ferramenta</h2><p>' . $tool['what'] . '</p>'
        . '<p>O cálculo roda em JavaScript puro no navegador, o que ajuda a manter a página rápida, leve e fácil de usar em qualquer dispositivo. A estrutura também foi pensada para SEO, com conteúdo explicativo, headings claros e foco em intenção de busca real.</p>'
        . '<h2>Como usar</h2><p>' . $tool['how'] . '</p>'
        . '<p>Se algum campo estiver vazio ou com valor inválido, a ferramenta mostra uma mensagem amigável antes de liberar o resultado. Depois, você pode copiar a resposta ou limpar tudo para uma nova simulação.</p>'
        . '<h2>Exemplo de uso</h2><p>' . $tool['example'] . '</p>'
        . '<p>Esse contexto adicional torna a página mais útil para visitantes que chegam pela busca orgânica e precisam de uma resposta prática, mas também querem entender como aplicar o resultado.</p>'
        . '<h2>Perguntas frequentes</h2>'
        . '<h3>' . $tool['faq'][0][0] . '</h3><p>' . $tool['faq'][0][1] . '</p>'
        . '<h3>' . $tool['faq'][1][0] . '</h3><p>' . $tool['faq'][1][1] . '</p>'
        . '<h3>' . $tool['faq'][2][0] . '</h3><p>' . $tool['faq'][2][1] . '</p>'
        . '</div>';
}

function related_block(array $tool): string
{
    if (empty($tool['related'])) {
        return '';
    }

    $cards = [];
    foreach ($tool['related'] as $related) {
        $cards[] = '<a href="<?= ns_escape(ns_href(\'/ferramentas/' . $related[0] . '\')) ?>" class="related-card"><span class="related-card-icon">' . $related[1] . '</span> ' . $related[2] . '</a>';
    }

    return '  <div class="related-tools"><h2>Ferramentas relacionadas</h2><div class="related-grid">' . implode('', $cards) . '</div></div>';
}

function render_tool(array $tool): string
{
    $fields = '';
    foreach ($tool['fields'] as $field) {
        $fields .= '<div class="form-group"><label for="' . $field[0] . '">' . $field[1] . '</label><input type="number" id="' . $field[0] . '" class="form-control" min="' . $field[2] . '" step="' . $field[3] . '" placeholder="' . $field[4] . '" /></div>';
    }

    $results = '';
    foreach ($tool['results'] as $result) {
        $results .= '<div class="result-item"><div class="label">' . $result[1] . '</div><div class="value" id="' . $result[0] . '">-</div></div>';
    }

    return "<?php\ndeclare(strict_types=1);\nrequire_once dirname(__DIR__) . '/config/bootstrap.php';\nns_redirect_legacy_url('/ferramentas/{$tool['slug']}');\nns_render_page_start('tool:{$tool['slug']}');\n?>\n<main><div class=\"tool-page\">\n  <nav class=\"breadcrumb\" aria-label=\"Navegação breadcrumb\"><a href=\"<?= ns_escape(ns_href('/')) ?>\">Início</a><span class=\"sep\">›</span><a href=\"<?= ns_escape(ns_href('/ferramentas')) ?>\">Ferramentas</a><span class=\"sep\">›</span><span>{$tool['title']}</span></nav>\n  <?php ns_render_ad_slot('leaderboard'); ?>\n  <div class=\"tool-header\"><div class=\"tool-page-icon\" style=\"background:{$tool['gradient']};\">{$tool['icon']}</div><div><h1>{$tool['title']}</h1><p>{$tool['lead']}</p><span class=\"tag tag-green\">{$tool['category']}</span></div></div>\n  <div class=\"tool-box\">\n    <div class=\"form-row\">{$fields}</div>\n    <div class=\"form-row\"><button type=\"button\" class=\"btn btn-primary\" onclick=\"runTool()\">{$tool['button']}</button><button type=\"button\" class=\"btn btn-outline\" onclick=\"clearTool()\">Limpar</button><button type=\"button\" class=\"copy-btn\" onclick=\"copyTool(this)\">Copiar resultado</button></div>\n    <div class=\"notice notice-warn\" id=\"tool-error\" style=\"display:none;\"><span>⚠️</span><span id=\"tool-error-text\"></span></div>\n    <div class=\"result-box\" id=\"tool-result\"><div class=\"result-label\">{$tool['result_title']}</div><div class=\"result-grid\">{$results}</div><div id=\"tool-detail\" style=\"margin-top:1rem;color:var(--text2);\"></div></div>\n  </div>\n  <?php ns_render_ad_slot('rectangle'); ?>\n" . seo_block($tool) . "\n" . related_block($tool) . "\n</div></main>\n<script>\nfunction showError(message){document.getElementById('tool-error-text').textContent=message;document.getElementById('tool-error').style.display='flex';document.getElementById('tool-result').classList.remove('show');}\nfunction clearError(){document.getElementById('tool-error').style.display='none';}\n{$tool['js']}\n</script>\n<?php ns_render_page_end(); ?>\n";
}

add_tool($tools, [
    'slug' => 'calculadora-imposto-renda',
    'title' => 'Calculadora de Imposto de Renda',
    'short' => 'Imposto de Renda',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '🧾',
    'gradient' => 'linear-gradient(135deg,#eef8ff,#d6ebff)',
    'lead' => 'Estime o imposto de renda mensal a partir do salário bruto e das deduções informadas.',
    'button' => 'Calcular imposto',
    'result_title' => 'Estimativa do imposto',
    'keywords' => 'calculadora imposto de renda, irrf online, imposto de renda salário',
    'fields' => [['ir-salario','Salário bruto mensal (R$)','0','0.01','Ex: 6000'],['ir-inss','Desconto de INSS (R$)','0','0.01','Ex: 700'],['ir-dependentes','Número de dependentes','0','1','Ex: 1']],
    'results' => [['ir-base','Base de cálculo'],['ir-valor','Imposto estimado']],
    'what' => 'A calculadora de imposto de renda ajuda a estimar quanto pode ser descontado do salário mensal após considerar base tributável, INSS e dependentes. Ela é útil para planejamento financeiro, conferência de holerite e comparação de renda líquida.',
    'how' => 'Informe o salário bruto, o valor de INSS e a quantidade de dependentes. A ferramenta calcula uma base simplificada de IR mensal e apresenta a estimativa do imposto com linguagem clara.',
    'example' => 'Se uma pessoa recebe R$ 6.000 por mês, paga R$ 700 de INSS e possui 1 dependente, a ferramenta estima a base tributável e o imposto mensal correspondente.',
    'faq' => [['Esse cálculo substitui a tabela oficial?','Não. Ele é uma estimativa prática para apoio financeiro e conferência inicial.'],['Serve para autônomos?','Serve como referência básica, mas não substitui apuração oficial para outros regimes.'],['A dedução por dependente é considerada?','Sim. A ferramenta aplica uma dedução simplificada por dependente informado.']],
    'related' => [['calculadora-inss','🏛️','INSS'],['calculadora-salario-liquido','💼','Salário Líquido'],['calculadora-fgts','📦','FGTS']],
    'js' => "function runTool(){const salario=parseFloat(document.getElementById('ir-salario').value);const inss=parseFloat(document.getElementById('ir-inss').value)||0;const dependentes=parseInt(document.getElementById('ir-dependentes').value||'0',10);clearError();if(isNaN(salario)||salario<=0||isNaN(inss)||inss<0||isNaN(dependentes)||dependentes<0){showError('Preencha salário, INSS e dependentes com valores válidos.');return;}const deducaoDependente=189.59*dependentes;const base=Math.max(0,salario-inss-deducaoDependente);let imposto=0;if(base<=2259.20){imposto=0;}else if(base<=2826.65){imposto=(base*0.075)-169.44;}else if(base<=3751.05){imposto=(base*0.15)-381.44;}else if(base<=4664.68){imposto=(base*0.225)-662.77;}else{imposto=(base*0.275)-896.00;}imposto=Math.max(0,imposto);document.getElementById('ir-base').textContent='R$ '+fmtBRL(base);document.getElementById('ir-valor').textContent='R$ '+fmtBRL(imposto);document.getElementById('tool-detail').textContent='Estimativa simplificada de IR mensal para apoio de planejamento.';showResult('tool-result');}function clearTool(){['ir-salario','ir-inss','ir-dependentes'].forEach(id=>document.getElementById(id).value='');['ir-base','ir-valor'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o imposto antes de copiar o resultado.');return;}copyToClipboard('Base: '+document.getElementById('ir-base').textContent+'\\nImposto estimado: '+document.getElementById('ir-valor').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-emprestimo',
    'title' => 'Calculadora de Empréstimo',
    'short' => 'Empréstimo',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '💳',
    'gradient' => 'linear-gradient(135deg,#fff5ef,#ffe0c8)',
    'lead' => 'Simule parcelas e valor total de um empréstimo usando taxa de juros e prazo.',
    'button' => 'Calcular empréstimo',
    'result_title' => 'Simulação do empréstimo',
    'keywords' => 'calculadora empréstimo, parcela empréstimo, simular empréstimo',
    'fields' => [['emp-valor','Valor do empréstimo (R$)','0','0.01','Ex: 10000'],['emp-juros','Juros ao mês (%)','0','0.01','Ex: 2.5'],['emp-meses','Prazo em meses','1','1','Ex: 24']],
    'results' => [['emp-parcela','Parcela estimada'],['emp-total','Total pago']],
    'what' => 'A calculadora de empréstimo ajuda a estimar quanto pode ficar a parcela de um crédito com base no valor principal, na taxa de juros mensal e no prazo de pagamento. Ela é útil para comparação de propostas e análise de capacidade de pagamento.',
    'how' => 'Informe o valor do empréstimo, os juros mensais e o número de meses. A ferramenta calcula uma parcela estimada e mostra o total pago ao final do contrato.',
    'example' => 'Se uma pessoa quer contratar R$ 10.000 com juros de 2,5% ao mês por 24 meses, a calculadora ajuda a entender o peso da parcela e o custo total do crédito.',
    'faq' => [['Esse cálculo é igual ao do banco?','É uma simulação útil para comparação inicial, mas o contrato oficial pode ter custos extras.'],['Serve para crédito pessoal?','Sim. É especialmente útil para esse tipo de análise.'],['Posso testar vários prazos?','Sim. É uma boa forma de comparar cenários.']],
    'related' => [['simulador-financiamento','🏠','Financiamento'],['calculadora-cartao-credito','💳','Cartão de Crédito'],['calculadora-juros-atraso','📅','Juros por Atraso']],
    'js' => "function runTool(){const pv=parseFloat(document.getElementById('emp-valor').value);const juros=parseFloat(document.getElementById('emp-juros').value)/100;const meses=parseInt(document.getElementById('emp-meses').value,10);clearError();if(isNaN(pv)||isNaN(juros)||isNaN(meses)||pv<=0||juros<0||meses<=0){showError('Preencha valor, juros e prazo com números válidos.');return;}const parcela=juros===0?pv/meses:(pv*juros)/(1-Math.pow(1+juros,-meses));const total=parcela*meses;document.getElementById('emp-parcela').textContent='R$ '+fmtBRL(parcela);document.getElementById('emp-total').textContent='R$ '+fmtBRL(total);document.getElementById('tool-detail').textContent='Simulação com prestação constante para apoio de análise.';showResult('tool-result');}function clearTool(){['emp-valor','emp-juros','emp-meses'].forEach(id=>document.getElementById(id).value='');['emp-parcela','emp-total'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o empréstimo antes de copiar o resultado.');return;}copyToClipboard('Parcela: '+document.getElementById('emp-parcela').textContent+'\\nTotal pago: '+document.getElementById('emp-total').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-cartao-credito',
    'title' => 'Calculadora de Cartão de Crédito',
    'short' => 'Cartão de Crédito',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '💳',
    'gradient' => 'linear-gradient(135deg,#fff7f0,#ffe4cc)',
    'lead' => 'Simule juros de cartão de crédito a partir do valor da fatura, juros mensais e quantidade de meses.',
    'button' => 'Calcular fatura',
    'result_title' => 'Simulação do cartão',
    'keywords' => 'calculadora cartão de crédito, juros fatura, parcelamento cartão',
    'fields' => [['cc-valor','Valor da fatura (R$)','0','0.01','Ex: 2500'],['cc-juros','Juros ao mês (%)','0','0.01','Ex: 12'],['cc-meses','Meses','1','1','Ex: 6']],
    'results' => [['cc-parcela','Parcela estimada'],['cc-total','Total final']],
    'what' => 'A calculadora de cartão de crédito ajuda a estimar o impacto dos juros sobre uma fatura ou saldo parcelado. Ela é útil para planejamento financeiro, renegociação e comparação entre pagar à vista, parcelar ou buscar alternativas de crédito.',
    'how' => 'Informe o valor da fatura, os juros mensais e o número de meses desejado. A ferramenta simula uma parcela estimada e mostra o total pago ao fim do período.',
    'example' => 'Quem deseja parcelar uma fatura de R$ 2.500 com juros elevados pode usar a calculadora para entender rapidamente o peso real do parcelamento.',
    'faq' => [['Serve para rotativo?','Sim. A ferramenta é útil para simular cenários com juros altos.'],['Posso comparar com empréstimo?','Sim. Essa é uma das melhores formas de usar a ferramenta.'],['A parcela é exata?','É uma estimativa prática para análise e comparação.']],
    'related' => [['calculadora-emprestimo','💳','Empréstimo'],['calculadora-juros-atraso','📅','Juros por Atraso'],['juros-compostos','📈','Juros Compostos']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('cc-valor').value);const juros=parseFloat(document.getElementById('cc-juros').value)/100;const meses=parseInt(document.getElementById('cc-meses').value,10);clearError();if(isNaN(valor)||isNaN(juros)||isNaN(meses)||valor<=0||juros<0||meses<=0){showError('Preencha valor, juros e meses com dados válidos.');return;}const parcela=juros===0?valor/meses:(valor*juros)/(1-Math.pow(1+juros,-meses));const total=parcela*meses;document.getElementById('cc-parcela').textContent='R$ '+fmtBRL(parcela);document.getElementById('cc-total').textContent='R$ '+fmtBRL(total);document.getElementById('tool-detail').textContent='Simulação útil para análise de parcelamento e comparação financeira.';showResult('tool-result');}function clearTool(){['cc-valor','cc-juros','cc-meses'].forEach(id=>document.getElementById(id).value='');['cc-parcela','cc-total'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule a fatura antes de copiar o resultado.');return;}copyToClipboard('Parcela estimada: '+document.getElementById('cc-parcela').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-raiz-quadrada',
    'title' => 'Calculadora de Raiz Quadrada',
    'short' => 'Raiz Quadrada',
    'category' => 'Matemática',
    'category_key' => 'matematica',
    'icon' => '√',
    'gradient' => 'linear-gradient(135deg,#eefaf7,#d9f4ea)',
    'lead' => 'Calcule a raiz quadrada de um número com resposta imediata e interpretação simples.',
    'button' => 'Calcular raiz',
    'result_title' => 'Resultado da raiz quadrada',
    'keywords' => 'calculadora raiz quadrada, raiz quadrada online, calcular raiz',
    'fields' => [['raiz-numero','Número','0','0.01','Ex: 144']],
    'results' => [['raiz-valor','Raiz quadrada'],['raiz-verificacao','Verificação']],
    'what' => 'A calculadora de raiz quadrada ajuda a descobrir qual valor multiplicado por ele mesmo gera o número informado. Ela é útil em matemática escolar, física, engenharia, estatística e conferências rápidas de cálculos.',
    'how' => 'Digite um número maior ou igual a zero e clique em calcular. A ferramenta mostra a raiz quadrada e ainda resume uma verificação da operação para facilitar entendimento.',
    'example' => 'Se você informar 144, a calculadora retorna 12 e também deixa claro que 12 multiplicado por 12 gera 144.',
    'faq' => [['Aceita número decimal?','Sim. A calculadora aceita números com casas decimais.'],['Posso usar número negativo?','Nesta versão, a ferramenta trabalha com raízes reais e usa valores a partir de zero.'],['Serve para estudo?','Sim. Ela é muito útil para conferência e aprendizado.']],
    'related' => [['calculadora-potencia','xʸ','Potência'],['calculadora-porcentagem','%','Porcentagem'],['calculadora-regra-de-tres','📐','Regra de Três']],
    'js' => "function runTool(){const numero=parseFloat(document.getElementById('raiz-numero').value);clearError();if(isNaN(numero)||numero<0){showError('Informe um número válido maior ou igual a zero.');return;}const raiz=Math.sqrt(numero);document.getElementById('raiz-valor').textContent=fmtNum(raiz,6);document.getElementById('raiz-verificacao').textContent=fmtNum(raiz*raiz,6);document.getElementById('tool-detail').textContent='A verificação mostra o valor da raiz multiplicado por ele mesmo.';showResult('tool-result');}function clearTool(){document.getElementById('raiz-numero').value='';['raiz-valor','raiz-verificacao'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule a raiz antes de copiar o resultado.');return;}copyToClipboard('Raiz quadrada: '+document.getElementById('raiz-valor').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-potencia',
    'title' => 'Calculadora de Potência',
    'short' => 'Potência',
    'category' => 'Matemática',
    'category_key' => 'matematica',
    'icon' => 'xʸ',
    'gradient' => 'linear-gradient(135deg,#f7f3ff,#e3d9ff)',
    'lead' => 'Eleve uma base a um expoente com cálculo rápido e resposta imediata no navegador.',
    'button' => 'Calcular potência',
    'result_title' => 'Resultado da potência',
    'keywords' => 'calculadora de potência, potência online, elevar número',
    'fields' => [['pot-base','Base','-999999','0.01','Ex: 2'],['pot-exp','Expoente','-999999','0.01','Ex: 8']],
    'results' => [['pot-valor','Potência'],['pot-baseinfo','Resumo']],
    'what' => 'A calculadora de potência mostra o resultado de uma base elevada a um expoente. Ela é útil em matemática, física, programação, eletrônica e cálculos financeiros.',
    'how' => 'Digite base e expoente nos campos indicados e clique em calcular. A ferramenta processa a conta rapidamente e mostra o resultado com uma breve explicação da operação.',
    'example' => 'Ao elevar 2 a 8, o resultado é 256. Esse tipo de cálculo é muito comum em exercícios, análises técnicas e comparações de crescimento exponencial.',
    'faq' => [['Aceita expoente decimal?','Sim. A ferramenta aceita valores decimais para base e expoente.'],['Posso usar base negativa?','Sim, desde que a operação resulte em valor numérico válido no navegador.'],['Serve para estudo?','Sim. É excelente para praticar e conferir contas.']],
    'related' => [['calculadora-raiz-quadrada','√','Raiz Quadrada'],['calculadora-area-quadrado','⬜','Área do Quadrado'],['calculadora-regra-de-tres','📐','Regra de Três']],
    'js' => "function runTool(){const base=parseFloat(document.getElementById('pot-base').value);const exp=parseFloat(document.getElementById('pot-exp').value);clearError();if(isNaN(base)||isNaN(exp)){showError('Preencha base e expoente com valores válidos.');return;}const valor=Math.pow(base,exp);if(!isFinite(valor)){showError('O resultado não pode ser exibido com os valores informados.');return;}document.getElementById('pot-valor').textContent=fmtNum(valor,6);document.getElementById('pot-baseinfo').textContent=fmtNum(base,6)+' ^ '+fmtNum(exp,6);document.getElementById('tool-detail').textContent='A conta representa a base multiplicada por ela mesma conforme o expoente.';showResult('tool-result');}function clearTool(){['pot-base','pot-exp'].forEach(id=>document.getElementById(id).value='');['pot-valor','pot-baseinfo'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule a potência antes de copiar o resultado.');return;}copyToClipboard('Potência: '+document.getElementById('pot-valor').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-horas-trabalho',
    'title' => 'Calculadora de Horas de Trabalho',
    'short' => 'Horas de Trabalho',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '🕒',
    'gradient' => 'linear-gradient(135deg,#f0f5ff,#d8e4ff)',
    'lead' => 'Calcule o total de horas trabalhadas usando horário de entrada, saída e intervalo.',
    'button' => 'Calcular horas',
    'result_title' => 'Jornada calculada',
    'keywords' => 'calculadora horas de trabalho, horas trabalhadas online, jornada trabalho',
    'fields' => [['ht-entrada','Hora de entrada (08.00)','0','0.01','Ex: 08.00'],['ht-saida','Hora de saída (17.30)','0','0.01','Ex: 17.30'],['ht-intervalo','Intervalo em horas','0','0.01','Ex: 1']],
    'results' => [['ht-horas','Horas líquidas'],['ht-minutos','Minutos']],
    'what' => 'A calculadora de horas de trabalho ajuda a descobrir a jornada líquida diária com base em entrada, saída e intervalo. Ela é útil para controle pessoal, conferência de rotina profissional, prestação de serviço e produtividade.',
    'how' => 'Digite a hora de entrada, a hora de saída e o intervalo em horas. A ferramenta calcula o tempo líquido trabalhado e mostra o resultado em horas e minutos.',
    'example' => 'Se uma pessoa entra às 08.00, sai às 17.30 e faz 1 hora de intervalo, a calculadora mostra a jornada líquida, o que facilita organização e conferência.',
    'faq' => [['Aceita meia hora?','Sim. Você pode informar valores com decimais no formato usado na página.'],['Serve para autônomos?','Sim. É útil para qualquer rotina baseada em horas.'],['O cálculo considera intervalo?','Sim. O intervalo informado é descontado da jornada.']],
    'related' => [['calculadora-salario-liquido','💼','Salário Líquido'],['calculadora-roi','📈','ROI'],['contador-palavras','📄','Contador de Palavras']],
    'js' => "function toMinutes(value){const horas=Math.floor(value);const minutos=Math.round((value-horas)*100);return (horas*60)+minutos;}function runTool(){const entrada=parseFloat(document.getElementById('ht-entrada').value);const saida=parseFloat(document.getElementById('ht-saida').value);const intervalo=parseFloat(document.getElementById('ht-intervalo').value);clearError();if(isNaN(entrada)||isNaN(saida)||isNaN(intervalo)||intervalo<0){showError('Preencha entrada, saída e intervalo com valores válidos.');return;}const total=toMinutes(saida)-toMinutes(entrada)-(intervalo*60);if(total<=0){showError('A jornada líquida precisa ser maior que zero.');return;}document.getElementById('ht-horas').textContent=fmtNum(total/60,2)+' h';document.getElementById('ht-minutos').textContent=fmtNum(total,0)+' min';document.getElementById('tool-detail').textContent='O cálculo desconta o intervalo da diferença entre entrada e saída.';showResult('tool-result');}function clearTool(){['ht-entrada','ht-saida','ht-intervalo'].forEach(id=>document.getElementById(id).value='');['ht-horas','ht-minutos'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule as horas antes de copiar o resultado.');return;}copyToClipboard('Horas trabalhadas: '+document.getElementById('ht-horas').textContent,button);}",
]);

if (false) {
foreach ($tools as $tool) {
    file_put_contents($toolsDir . '/' . $tool['slug'] . '.php', render_tool($tool) . PHP_EOL);
    $catalog['tools'][$tool['slug']] = [
        'slug' => $tool['slug'],
        'legacy_file' => $tool['slug'] . '.php',
        'page_key' => 'tool:' . $tool['slug'],
        'name' => $tool['title'],
        'short_name' => $tool['short'],
        'category' => $tool['category'],
        'category_key' => $tool['category_key'],
        'icon' => $tool['icon'],
        'gradient' => $tool['gradient'],
        'excerpt' => 'Ferramenta online para usar ' . $tool['title'] . ' com rapidez e praticidade.',
        'lead' => $tool['lead'],
        'keywords' => $tool['keywords'],
        'schema_type' => 'WebApplication',
        'priority' => '0.8',
        'changefreq' => 'monthly',
        'related' => array_map(static fn(array $item): string => $item[0], $tool['related']),
    ];
}

ksort($catalog['tools']);
file_put_contents($catalogFile, "<?php\n\nreturn " . var_export($catalog, true) . ";\n");
echo 'generated=' . count($tools) . PHP_EOL;
}

add_tool($tools, [
    'slug' => 'calculadora-salario-liquido',
    'title' => 'Calculadora de Salário Líquido',
    'short' => 'Salário Líquido',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '💼',
    'gradient' => 'linear-gradient(135deg,#eef9f2,#d8f0e0)',
    'lead' => 'Estime o salário líquido usando salário bruto, INSS, imposto e desconto adicional.',
    'button' => 'Calcular salário',
    'result_title' => 'Estimativa do salário líquido',
    'keywords' => 'calculadora salário líquido, salário líquido online, desconto salário',
    'fields' => [['sl-bruto','Salário bruto (R$)','0','0.01','Ex: 5000'],['sl-inss','INSS (R$)','0','0.01','Ex: 550'],['sl-ir','Imposto de renda (R$)','0','0.01','Ex: 320'],['sl-outros','Outros descontos (R$)','0','0.01','Ex: 150']],
    'results' => [['sl-liquido','Salário líquido'],['sl-descontos','Total de descontos']],
    'what' => 'A calculadora de salário líquido mostra quanto sobra do salário bruto depois dos principais descontos informados. Ela é útil para conferência de holerite, comparação de propostas e organização financeira.',
    'how' => 'Digite o salário bruto e os descontos conhecidos, como INSS, imposto de renda e outros abatimentos. A ferramenta soma os descontos e exibe o valor líquido final.',
    'example' => 'Se uma pessoa recebe R$ 5.000 brutos e tem R$ 1.020 em descontos totais, a calculadora mostra o salário líquido estimado e ajuda na organização do orçamento.',
    'faq' => [['Posso usar valores reais do holerite?','Sim. A ferramenta funciona muito bem quando você já conhece os descontos.'],['Serve para planejamento de renda?','Sim. Ela ajuda a visualizar quanto realmente entra no mês.'],['Substitui folha oficial?','Não. É uma ferramenta de apoio e conferência.']],
    'related' => [['calculadora-imposto-renda','🧾','Imposto de Renda'],['calculadora-inss','🏛️','INSS'],['calculadora-fgts','📦','FGTS']],
    'js' => "function runTool(){const bruto=parseFloat(document.getElementById('sl-bruto').value);const inss=parseFloat(document.getElementById('sl-inss').value)||0;const ir=parseFloat(document.getElementById('sl-ir').value)||0;const outros=parseFloat(document.getElementById('sl-outros').value)||0;clearError();if(isNaN(bruto)||bruto<=0||isNaN(inss)||inss<0||isNaN(ir)||ir<0||isNaN(outros)||outros<0){showError('Preencha salário e descontos com valores válidos.');return;}const descontos=inss+ir+outros;const liquido=bruto-descontos;document.getElementById('sl-liquido').textContent='R$ '+fmtBRL(liquido);document.getElementById('sl-descontos').textContent='R$ '+fmtBRL(descontos);document.getElementById('tool-detail').textContent='Estimativa direta com base nos descontos informados pelo usuário.';showResult('tool-result');}function clearTool(){['sl-bruto','sl-inss','sl-ir','sl-outros'].forEach(id=>document.getElementById(id).value='');['sl-liquido','sl-descontos'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o salário líquido antes de copiar o resultado.');return;}copyToClipboard('Salário líquido: '+document.getElementById('sl-liquido').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-inflacao',
    'title' => 'Calculadora de Inflação',
    'short' => 'Inflação',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '📈',
    'gradient' => 'linear-gradient(135deg,#fff4f1,#ffd7ce)',
    'lead' => 'Atualize um valor aplicando uma taxa de inflação para estimar perda de poder de compra ou reajuste.',
    'button' => 'Calcular inflação',
    'result_title' => 'Valor ajustado',
    'keywords' => 'calculadora inflação, valor corrigido pela inflação, reajuste inflação',
    'fields' => [['inflacao-valor','Valor inicial (R$)','0','0.01','Ex: 1000'],['inflacao-taxa','Inflação (%)','0','0.01','Ex: 5.2']],
    'results' => [['inflacao-total','Valor ajustado'],['inflacao-aumento','Variação']],
    'what' => 'A calculadora de inflação ajuda a simular como um valor muda depois da aplicação de uma taxa inflacionária. Ela é útil para comparar preços, revisar orçamento e entender perda de poder de compra.',
    'how' => 'Digite o valor inicial e a taxa de inflação desejada. A ferramenta calcula a variação em reais e mostra o valor ajustado com resposta imediata.',
    'example' => 'Se um produto custava R$ 1.000 e a inflação considerada foi de 5,2%, a ferramenta mostra o novo valor aproximado e quanto isso representa de aumento.',
    'faq' => [['Posso usar qualquer taxa?','Sim. A ferramenta aplica a taxa percentual informada pelo usuário.'],['Serve para reajuste contratual?','Sim, como apoio de simulação e conferência.'],['É diferente de correção monetária?','Na prática podem se relacionar, mas aqui o foco é a taxa inflacionária informada.']],
    'related' => [['calculadora-correcao-monetaria','📊','Correção Monetária'],['calculadora-aluguel-reajuste','🏠','Reajuste de Aluguel'],['calculadora-rendimento-poupanca','🏦','Rendimento da Poupança']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('inflacao-valor').value);const taxa=parseFloat(document.getElementById('inflacao-taxa').value);clearError();if(isNaN(valor)||isNaN(taxa)||valor<0||taxa<0){showError('Informe valor e inflação com números válidos.');return;}const aumento=valor*(taxa/100);const total=valor+aumento;document.getElementById('inflacao-total').textContent='R$ '+fmtBRL(total);document.getElementById('inflacao-aumento').textContent='R$ '+fmtBRL(aumento);document.getElementById('tool-detail').textContent='Ajuste baseado na taxa inflacionária informada.';showResult('tool-result');}function clearTool(){['inflacao-valor','inflacao-taxa'].forEach(id=>document.getElementById(id).value='');['inflacao-total','inflacao-aumento'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule a inflação antes de copiar o resultado.');return;}copyToClipboard('Valor ajustado: '+document.getElementById('inflacao-total').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-cdi',
    'title' => 'Calculadora de CDI',
    'short' => 'CDI',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '💹',
    'gradient' => 'linear-gradient(135deg,#f2f8ff,#dce9ff)',
    'lead' => 'Simule rendimento atrelado ao CDI usando valor investido, percentual do CDI e prazo.',
    'button' => 'Calcular CDI',
    'result_title' => 'Simulação de rendimento',
    'keywords' => 'calculadora cdi, rendimento cdi, investimento cdi',
    'fields' => [['cdi-valor','Valor investido (R$)','0','0.01','Ex: 5000'],['cdi-taxa','CDI anual (%)','0','0.01','Ex: 10.65'],['cdi-percentual','% do CDI','0','0.01','Ex: 100'],['cdi-meses','Prazo em meses','1','1','Ex: 12']],
    'results' => [['cdi-total','Saldo final'],['cdi-rendimento','Rendimento']],
    'what' => 'A calculadora de CDI ajuda a projetar o rendimento de aplicações atreladas a esse indicador, usando valor investido, percentual contratado e prazo da aplicação. Ela é útil para comparar produtos financeiros e planejar decisões de investimento.',
    'how' => 'Informe o valor inicial, a taxa anual de CDI, o percentual do CDI aplicado pelo investimento e o número de meses. A ferramenta faz uma simulação educacional e mostra saldo final e rendimento.',
    'example' => 'Quem quer comparar um investimento de 100% do CDI com outro de 110% do CDI pode usar a calculadora para visualizar a diferença estimada no período desejado.',
    'faq' => [['O cálculo é exato?','É uma simulação prática, útil para comparação e planejamento inicial.'],['Serve para CDB?','Sim. É especialmente útil para produtos atrelados ao CDI.'],['O prazo precisa estar em meses?','Nesta versão, sim. A simulação foi padronizada em meses para facilitar o uso.']],
    'related' => [['calculadora-rendimento-poupanca','🏦','Rendimento da Poupança'],['calculadora-investimento-mensal','📅','Investimento Mensal'],['juros-compostos','📈','Juros Compostos']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('cdi-valor').value);const taxa=parseFloat(document.getElementById('cdi-taxa').value);const percentual=parseFloat(document.getElementById('cdi-percentual').value);const meses=parseInt(document.getElementById('cdi-meses').value,10);clearError();if(isNaN(valor)||isNaN(taxa)||isNaN(percentual)||isNaN(meses)||valor<0||taxa<0||percentual<0||meses<=0){showError('Preencha todos os campos com valores válidos.');return;}const taxaMensal=((taxa*(percentual/100))/100)/12;const total=valor*Math.pow(1+taxaMensal,meses);document.getElementById('cdi-total').textContent='R$ '+fmtBRL(total);document.getElementById('cdi-rendimento').textContent='R$ '+fmtBRL(total-valor);document.getElementById('tool-detail').textContent='Simulação educacional com conversão simplificada de taxa anual para mensal.';showResult('tool-result');}function clearTool(){['cdi-valor','cdi-taxa','cdi-percentual','cdi-meses'].forEach(id=>document.getElementById(id).value='');['cdi-total','cdi-rendimento'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o CDI antes de copiar o resultado.');return;}copyToClipboard('Saldo final: '+document.getElementById('cdi-total').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-rendimento-poupanca',
    'title' => 'Calculadora de Rendimento da Poupança',
    'short' => 'Rendimento da Poupança',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '🏦',
    'gradient' => 'linear-gradient(135deg,#eef8f0,#d7efdb)',
    'lead' => 'Simule o rendimento da poupança usando valor investido, taxa mensal e prazo da aplicação.',
    'button' => 'Calcular rendimento',
    'result_title' => 'Simulação da poupança',
    'keywords' => 'calculadora rendimento poupança, poupança online, simulação poupança',
    'fields' => [['poupanca-valor','Valor aplicado (R$)','0','0.01','Ex: 1000'],['poupanca-taxa','Taxa mensal (%)','0','0.01','Ex: 0.5'],['poupanca-meses','Prazo em meses','1','1','Ex: 12']],
    'results' => [['poupanca-total','Saldo final'],['poupanca-rendimento','Rendimento']],
    'what' => 'A calculadora de rendimento da poupança ajuda a estimar quanto um valor aplicado pode render ao longo dos meses. Ela é útil para planejamento financeiro, comparação com outros investimentos e organização de metas.',
    'how' => 'Digite o valor aplicado, a taxa mensal desejada e a quantidade de meses. A ferramenta calcula o saldo final e o rendimento acumulado em uma simulação simples e prática.',
    'example' => 'Se uma pessoa investir R$ 1.000 com taxa mensal de 0,5% durante 12 meses, a calculadora mostra o saldo final estimado e quanto foi ganho no período.',
    'faq' => [['A taxa já vem preenchida?','Não. Você informa a taxa que deseja usar na simulação.'],['Serve para comparar com CDI?','Sim. É útil para comparar cenários de investimento.'],['A conta usa juros compostos?','Sim. A simulação usa capitalização mensal sobre o valor acumulado.']],
    'related' => [['calculadora-cdi','💹','CDI'],['calculadora-investimento-mensal','📅','Investimento Mensal'],['juros-compostos','📈','Juros Compostos']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('poupanca-valor').value);const taxa=parseFloat(document.getElementById('poupanca-taxa').value);const meses=parseInt(document.getElementById('poupanca-meses').value,10);clearError();if(isNaN(valor)||isNaN(taxa)||isNaN(meses)||valor<0||taxa<0||meses<=0){showError('Preencha valor, taxa e prazo com dados válidos.');return;}const total=valor*Math.pow(1+(taxa/100),meses);document.getElementById('poupanca-total').textContent='R$ '+fmtBRL(total);document.getElementById('poupanca-rendimento').textContent='R$ '+fmtBRL(total-valor);document.getElementById('tool-detail').textContent='Simulação com capitalização mensal para apoio educacional e financeiro.';showResult('tool-result');}function clearTool(){['poupanca-valor','poupanca-taxa','poupanca-meses'].forEach(id=>document.getElementById(id).value='');['poupanca-total','poupanca-rendimento'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o rendimento antes de copiar o resultado.');return;}copyToClipboard('Saldo final: '+document.getElementById('poupanca-total').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-investimento-mensal',
    'title' => 'Calculadora de Investimento Mensal',
    'short' => 'Investimento Mensal',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '📅',
    'gradient' => 'linear-gradient(135deg,#f1f8ff,#dce8ff)',
    'lead' => 'Simule o acúmulo de aportes mensais com rentabilidade e prazo definidos.',
    'button' => 'Calcular investimento',
    'result_title' => 'Resultado do investimento',
    'keywords' => 'calculadora investimento mensal, aporte mensal, acumular investimento',
    'fields' => [['inv-aporte','Aporte mensal (R$)','0','0.01','Ex: 500'],['inv-taxa','Rentabilidade mensal (%)','0','0.01','Ex: 0.8'],['inv-meses','Período em meses','1','1','Ex: 36']],
    'results' => [['inv-total','Valor acumulado'],['inv-aplicado','Total investido']],
    'what' => 'A calculadora de investimento mensal ajuda a simular quanto um conjunto de aportes periódicos pode acumular ao longo do tempo. Ela é útil para metas financeiras, reserva e planejamento patrimonial.',
    'how' => 'Informe o valor do aporte mensal, a rentabilidade esperada por mês e o número de meses. A ferramenta projeta o valor acumulado e mostra quanto foi efetivamente aportado no período.',
    'example' => 'Se uma pessoa investe R$ 500 por mês por 36 meses com uma rentabilidade mensal estimada, a ferramenta mostra o saldo projetado e permite comparar diferentes cenários.',
    'faq' => [['Serve para metas de longo prazo?','Sim. É muito útil para projeções e planejamento progressivo.'],['O cálculo considera aporte mensal no mesmo valor?','Sim. Nesta versão o aporte foi padronizado para um valor fixo mensal.'],['Posso comparar com poupança e CDI?','Sim. A ferramenta é útil para simular e comparar cenários.']],
    'related' => [['calculadora-cdi','💹','CDI'],['calculadora-rendimento-poupanca','🏦','Rendimento da Poupança'],['juros-compostos','📈','Juros Compostos']],
    'js' => "function runTool(){const aporte=parseFloat(document.getElementById('inv-aporte').value);const taxa=parseFloat(document.getElementById('inv-taxa').value)/100;const meses=parseInt(document.getElementById('inv-meses').value,10);clearError();if(isNaN(aporte)||isNaN(taxa)||isNaN(meses)||aporte<0||taxa<0||meses<=0){showError('Preencha aporte, taxa e prazo com valores válidos.');return;}let saldo=0;for(let i=0;i<meses;i++){saldo=(saldo+aporte)*(1+taxa);}document.getElementById('inv-total').textContent='R$ '+fmtBRL(saldo);document.getElementById('inv-aplicado').textContent='R$ '+fmtBRL(aporte*meses);document.getElementById('tool-detail').textContent='Simulação com aporte fixo e rentabilidade mensal constante.';showResult('tool-result');}function clearTool(){['inv-aporte','inv-taxa','inv-meses'].forEach(id=>document.getElementById(id).value='');['inv-total','inv-aplicado'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o investimento antes de copiar o resultado.');return;}copyToClipboard('Valor acumulado: '+document.getElementById('inv-total').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-inss',
    'title' => 'Calculadora de INSS',
    'short' => 'INSS',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '🏛️',
    'gradient' => 'linear-gradient(135deg,#f4f9ff,#dbe9ff)',
    'lead' => 'Calcule uma estimativa de desconto de INSS com base no salário bruto mensal.',
    'button' => 'Calcular INSS',
    'result_title' => 'Estimativa do INSS',
    'keywords' => 'calculadora inss, desconto inss online, inss salário',
    'fields' => [['inss-salario','Salário bruto mensal (R$)','0','0.01','Ex: 4500']],
    'results' => [['inss-desconto','Desconto estimado'],['inss-aliquota','Alíquota usada']],
    'what' => 'A calculadora de INSS mostra uma estimativa do desconto previdenciário mensal sobre o salário bruto. Ela é útil para entender o impacto do desconto no holerite, planejar renda líquida e comparar propostas salariais.',
    'how' => 'Digite o salário bruto mensal e clique no botão de cálculo. A ferramenta aplica uma lógica simplificada por faixas e mostra o desconto estimado, além da alíquota principal considerada na simulação.',
    'example' => 'Quem recebe R$ 4.500 por mês pode usar a calculadora para estimar quanto será destinado ao INSS e quanto isso afeta o valor líquido final do salário.',
    'faq' => [['A conta é oficial?','É uma estimativa prática para apoio e conferência inicial.'],['Posso usar para comparar propostas de emprego?','Sim. Ela ajuda bastante em análises salariais rápidas.'],['A alíquota muda por faixa?','Sim. A previdência usa faixas progressivas, e a ferramenta simplifica isso para uso rápido.']],
    'related' => [['calculadora-imposto-renda','🧾','Imposto de Renda'],['calculadora-salario-liquido','💼','Salário Líquido'],['calculadora-fgts','📦','FGTS']],
    'js' => "function runTool(){const salario=parseFloat(document.getElementById('inss-salario').value);clearError();if(isNaN(salario)||salario<=0){showError('Informe um salário bruto válido maior que zero.');return;}let aliquota=0.075;if(salario>1412&&salario<=2666.68){aliquota=0.09;}else if(salario>2666.68&&salario<=4000.03){aliquota=0.12;}else if(salario>4000.03){aliquota=0.14;}const desconto=salario*aliquota;document.getElementById('inss-desconto').textContent='R$ '+fmtBRL(desconto);document.getElementById('inss-aliquota').textContent=fmtNum(aliquota*100,2)+'%';document.getElementById('tool-detail').textContent='Estimativa simplificada com base em faixas previdenciárias.';showResult('tool-result');}function clearTool(){document.getElementById('inss-salario').value='';['inss-desconto','inss-aliquota'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o INSS antes de copiar o resultado.');return;}copyToClipboard('INSS estimado: '+document.getElementById('inss-desconto').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-fgts',
    'title' => 'Calculadora de FGTS',
    'short' => 'FGTS',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '📦',
    'gradient' => 'linear-gradient(135deg,#edf9f1,#d6f0df)',
    'lead' => 'Estime o depósito mensal de FGTS a partir do salário bruto do trabalhador.',
    'button' => 'Calcular FGTS',
    'result_title' => 'Estimativa do FGTS',
    'keywords' => 'calculadora fgts, fgts salário, depósito fgts',
    'fields' => [['fgts-salario','Salário bruto mensal (R$)','0','0.01','Ex: 3200']],
    'results' => [['fgts-valor','Depósito mensal'],['fgts-anual','Estimativa em 12 meses']],
    'what' => 'A calculadora de FGTS ajuda a descobrir quanto pode ser depositado mensalmente no fundo com base no salário bruto. Ela é útil para planejamento financeiro, conferência trabalhista e acompanhamento de valores acumulados.',
    'how' => 'Digite o salário bruto mensal e clique em calcular. A ferramenta aplica a alíquota padrão de 8% e mostra tanto o depósito mensal quanto uma projeção anual simples.',
    'example' => 'Quem recebe R$ 3.200 por mês pode usar a ferramenta para ver quanto representa o depósito mensal de FGTS e qual seria o total aproximado após um ano.',
    'faq' => [['Esse valor sai do salário líquido?','Não. O FGTS é um depósito do empregador, não um desconto direto no salário do trabalhador.'],['Serve para planejamento?','Sim. É útil para ter uma visão prática do valor acumulado.'],['O cálculo considera juros do fundo?','Não. A projeção anual exibida é simples, sem rendimento adicional.']],
    'related' => [['calculadora-inss','🏛️','INSS'],['calculadora-imposto-renda','🧾','Imposto de Renda'],['calculadora-salario-liquido','💼','Salário Líquido']],
    'js' => "function runTool(){const salario=parseFloat(document.getElementById('fgts-salario').value);clearError();if(isNaN(salario)||salario<=0){showError('Informe um salário bruto válido maior que zero.');return;}const mensal=salario*0.08;document.getElementById('fgts-valor').textContent='R$ '+fmtBRL(mensal);document.getElementById('fgts-anual').textContent='R$ '+fmtBRL(mensal*12);document.getElementById('tool-detail').textContent='Cálculo com alíquota padrão de 8% sobre o salário bruto.';showResult('tool-result');}function clearTool(){document.getElementById('fgts-salario').value='';['fgts-valor','fgts-anual'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o FGTS antes de copiar o resultado.');return;}copyToClipboard('FGTS mensal: '+document.getElementById('fgts-valor').textContent+'\\nFGTS anual: '+document.getElementById('fgts-anual').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-correcao-monetaria',
    'title' => 'Calculadora de Correção Monetária',
    'short' => 'Correção Monetária',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '📊',
    'gradient' => 'linear-gradient(135deg,#f4f8ff,#dfe8ff)',
    'lead' => 'Corrija um valor aplicando uma taxa percentual para simular atualização monetária.',
    'button' => 'Calcular correção',
    'result_title' => 'Valor corrigido',
    'keywords' => 'calculadora correção monetária, valor corrigido, atualização monetária',
    'fields' => [['cm-valor','Valor original (R$)','0','0.01','Ex: 1000'],['cm-taxa','Taxa de correção (%)','0','0.01','Ex: 6.5']],
    'results' => [['cm-corrigido','Valor corrigido'],['cm-aumento','Acréscimo']],
    'what' => 'A calculadora de correção monetária serve para atualizar um valor com base em uma taxa percentual informada. Ela é útil para análises financeiras, revisão de contratos e comparação de valores antigos.',
    'how' => 'Digite o valor original e a taxa percentual desejada. A ferramenta calcula o acréscimo e mostra quanto o valor passa a representar depois da correção aplicada.',
    'example' => 'Se um crédito de R$ 1.000 precisar ser atualizado por uma taxa de 6,5%, a ferramenta mostra o novo valor e o ganho correspondente.',
    'faq' => [['Substitui índice oficial?','Não. É uma simulação prática baseada na taxa informada pelo usuário.'],['Posso usar para contratos?','Sim, como apoio de conferência inicial e planejamento.'],['O cálculo aceita taxa decimal?','Sim. Você pode informar porcentagens com casas decimais.']],
    'related' => [['calculadora-inflacao','📈','Inflação'],['calculadora-aluguel-reajuste','🏠','Reajuste de Aluguel'],['calculadora-juros-atraso','📅','Juros por Atraso']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('cm-valor').value);const taxa=parseFloat(document.getElementById('cm-taxa').value);clearError();if(isNaN(valor)||isNaN(taxa)||valor<0||taxa<0){showError('Informe valor e taxa com números válidos.');return;}const aumento=valor*(taxa/100);const total=valor+aumento;document.getElementById('cm-corrigido').textContent='R$ '+fmtBRL(total);document.getElementById('cm-aumento').textContent='R$ '+fmtBRL(aumento);document.getElementById('tool-detail').textContent='Cálculo simples de correção baseado na taxa percentual informada.';showResult('tool-result');}function clearTool(){['cm-valor','cm-taxa'].forEach(id=>document.getElementById(id).value='');['cm-corrigido','cm-aumento'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule a correção antes de copiar o resultado.');return;}copyToClipboard('Valor corrigido: '+document.getElementById('cm-corrigido').textContent,button);}",
]);

add_tool($tools, [
    'slug' => 'calculadora-aluguel-reajuste',
    'title' => 'Calculadora de Reajuste de Aluguel',
    'short' => 'Reajuste de Aluguel',
    'category' => 'Finanças',
    'category_key' => 'financas',
    'icon' => '🏠',
    'gradient' => 'linear-gradient(135deg,#eef7ff,#d9e9ff)',
    'lead' => 'Simule o novo valor do aluguel após aplicar um índice ou percentual de reajuste.',
    'button' => 'Calcular reajuste',
    'result_title' => 'Novo valor do aluguel',
    'keywords' => 'calculadora reajuste aluguel, reajuste de aluguel online, novo valor aluguel',
    'fields' => [['aluguel-valor','Aluguel atual (R$)','0','0.01','Ex: 1800'],['aluguel-taxa','Reajuste (%)','0','0.01','Ex: 7.5']],
    'results' => [['aluguel-novo','Novo aluguel'],['aluguel-diferenca','Aumento']],
    'what' => 'A calculadora de reajuste de aluguel ajuda a descobrir rapidamente quanto um aluguel passa a custar depois da aplicação de um índice ou percentual de reajuste. É útil para locadores, locatários e administradoras.',
    'how' => 'Informe o valor atual do aluguel e o percentual de reajuste desejado. A ferramenta exibe o novo valor mensal e a diferença entre o aluguel antigo e o reajustado.',
    'example' => 'Se um aluguel de R$ 1.800 receber reajuste de 7,5%, a ferramenta calcula o novo valor e mostra o aumento em reais.',
    'faq' => [['Serve para imóvel residencial e comercial?','Sim. O cálculo percentual funciona da mesma forma para ambos.'],['O índice é oficial?','Você informa a taxa desejada e a ferramenta apenas aplica esse percentual.'],['Posso usar em renegociação?','Sim. É muito útil para simular cenários antes de conversar sobre o contrato.']],
    'related' => [['calculadora-correcao-monetaria','📊','Correção Monetária'],['calculadora-inflacao','📈','Inflação'],['simulador-financiamento','🏠','Financiamento']],
    'js' => "function runTool(){const valor=parseFloat(document.getElementById('aluguel-valor').value);const taxa=parseFloat(document.getElementById('aluguel-taxa').value);clearError();if(isNaN(valor)||isNaN(taxa)||valor<0||taxa<0){showError('Informe aluguel e reajuste com valores válidos.');return;}const aumento=valor*(taxa/100);const novo=valor+aumento;document.getElementById('aluguel-novo').textContent='R$ '+fmtBRL(novo);document.getElementById('aluguel-diferenca').textContent='R$ '+fmtBRL(aumento);document.getElementById('tool-detail').textContent='Reajuste percentual simples aplicado ao valor atual do aluguel.';showResult('tool-result');}function clearTool(){['aluguel-valor','aluguel-taxa'].forEach(id=>document.getElementById(id).value='');['aluguel-novo','aluguel-diferenca'].forEach(id=>document.getElementById(id).textContent='-');document.getElementById('tool-detail').textContent='';document.getElementById('tool-result').classList.remove('show');clearError();}function copyTool(button){if(!document.getElementById('tool-result').classList.contains('show')){showError('Calcule o reajuste antes de copiar o resultado.');return;}copyToClipboard('Novo aluguel: '+document.getElementById('aluguel-novo').textContent,button);}",
]);

foreach ($tools as $tool) {
    file_put_contents($toolsDir . '/' . $tool['slug'] . '.php', render_tool($tool) . PHP_EOL);
    $catalog['tools'][$tool['slug']] = [
        'slug' => $tool['slug'],
        'legacy_file' => $tool['slug'] . '.php',
        'page_key' => 'tool:' . $tool['slug'],
        'name' => $tool['title'],
        'short_name' => $tool['short'],
        'category' => $tool['category'],
        'category_key' => $tool['category_key'],
        'icon' => $tool['icon'],
        'gradient' => $tool['gradient'],
        'excerpt' => 'Ferramenta online para usar ' . $tool['title'] . ' com rapidez e praticidade.',
        'lead' => $tool['lead'],
        'keywords' => $tool['keywords'],
        'schema_type' => 'WebApplication',
        'priority' => '0.8',
        'changefreq' => 'monthly',
        'related' => array_map(static fn(array $item): string => $item[0], $tool['related']),
    ];
}

ksort($catalog['tools']);
file_put_contents($catalogFile, "<?php\n\nreturn " . var_export($catalog, true) . ";\n");
echo 'generated=' . count($tools) . PHP_EOL;
