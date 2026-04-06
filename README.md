# NANOSISTECCK Tools

> **"N�o estamos criando sites, estamos construindo ativos digitais."**

Plataforma de ferramentas online gratuitas do ecossistema **NANOSISTECCK**.
Foco inicial: `tools.nanosistecck.com`

---

## ?? Funcionalidades Implementadas

### ? P�gina Principal
- Hero section com CTAs
- Barra de estat�sticas
- Grid de 10 ferramentas com cards interativos
- Se��o "Sobre" com benef�cios
- Conte�do SEO otimizado (300+ palavras)
- Slots de an�ncios (AdSense-ready): topo, meio, rodap�

### ? 10 Ferramentas Individuais (cada uma com SEO completo)

| # | Ferramenta | URL |
|---|-----------|-----|
| 1 | Calculadora de Juros Simples | `/ferramentas/juros-simples.php` |
| 2 | Calculadora de Juros Compostos | `/ferramentas/juros-compostos.php` |
| 3 | Simulador de Financiamento (Price/SAC) | `/ferramentas/simulador-financiamento.php` |
| 4 | Calculadora de Porcentagem | `/ferramentas/calculadora-porcentagem.php` |
| 5 | Calculadora de Idade | `/ferramentas/calculadora-idade.php` |
| 6 | Gerador de Nomes | `/ferramentas/gerador-nomes.php` |
| 7 | Gerador de Senhas | `/ferramentas/gerador-senhas.php` |
| 8 | Contador de Caracteres | `/ferramentas/contador-caracteres.php` |
| 9 | Conversor de Texto | `/ferramentas/conversor-texto.php` |
| 10 | Gerador de CPF (educacional) | `/ferramentas/gerador-cpf.php` |

### ? SEO
- Title + meta description �nicos por p�gina
- H1, H2, H3 estruturados
- 300+ palavras de conte�do por ferramenta
- URLs amig�veis
- Schema.org (WebSite) na home
- Canonical URLs
- Open Graph + Twitter Card
- `sitemap.xml` completo
- `robots.txt` configurado
- Breadcrumbs naveg�veis

### ? Layout e Design
- CSS modular e reutiliz�vel (`css/style.css`)
- JS global (`js/main.js`) + injetor de layout (`js/layout.js`)
- Header e Footer din�micos (injetados via JS)
- Design minimalista tecnol�gico
- Paleta: azul (#1a73e8) + verde (#00c48c) + laranja (#ff6b2b)
- Tipografia Inter (Google Fonts)
- Mobile First / Responsivo
- Menu hamburguer para mobile

### ? Monetiza��o (base pronta)
- 3 slots de an�ncio por p�gina (topo leaderboard, meio rectangle, rodap�)
- Placeholders substitu�veis por tags AdSense com 1 linha de HTML

### ? P�ginas Institucionais
- Pol�tica de Privacidade
- Termos de Uso

---

## ?? Estrutura de Arquivos

```
/
+-- index.php                     ? P�gina inicial
+-- sitemap.xml                    ? Sitemap para SEO
+-- robots.txt                     ? Regras para crawlers
+-- politica-privacidade.php
+-- termos-de-uso.php
�
+-- css/
�   +-- style.css                  ? CSS global e componentes
�
+-- js/
�   +-- main.js                    ? Utilit�rios JS globais
�   +-- layout.js                  ? Header/Footer din�micos
�
+-- ferramentas/
    +-- index-ferramentas.php     ? �ndice categorizado
    +-- juros-simples.php
    +-- juros-compostos.php
    +-- simulador-financiamento.php
    +-- calculadora-porcentagem.php
    +-- calculadora-idade.php
    +-- gerador-nomes.php
    +-- gerador-senhas.php
    +-- contador-caracteres.php
    +-- conversor-texto.php
    +-- gerador-cpf.php
```

---

## ?? Pr�ximas Etapas Recomendadas

### Semana 1 � Publica��o
- [ ] Registrar dom�nio `nanosistecck.com` e subdom�nio `tools`
- [ ] Hospedar o site (Cloudflare Pages, Netlify, Vercel � gratuito)
- [ ] Cadastrar no Google Search Console
- [ ] Solicitar indexa��o manual das 12 p�ginas
- [ ] Substituir placeholders de an�ncio pelo c�digo real do AdSense

### Semana 2 � Crescimento
- [ ] Adicionar favicon e �cone do site
- [ ] Adicionar Google Analytics (GA4)
- [ ] Criar mais 10-20 ferramentas (expans�o)
- [ ] Compartilhar no Facebook, Pinterest e grupos do WhatsApp

### Fase 2 � Expans�o
- [ ] `dev.nanosistecck.com` � snippets e c�digos
- [ ] `receitas.nanosistecck.com` � conte�do de alto tr�fego
- [ ] `jogos.nanosistecck.com` � engajamento
- [ ] `lotofacil.nanosistecck.com` � freemium

---

## ??? Modelo de Neg�cio

1. **Tr�fego Org�nico (SEO)** � cada ferramenta = 1 p�gina index�vel
2. **Google AdSense** � 3 slots por p�gina (pronto para ativar)
3. **Produtos Digitais** � futuro
4. **�rea Premium** � futuro
5. **Afiliados** � futuro

---

## ?? Design System

| Token | Valor |
|-------|-------|
| Primary (azul) | `#1a73e8` |
| Accent (verde) | `#00c48c` |
| CTA (laranja) | `#ff6b2b` |
| Background | `#f7f8fc` |
| Font | Inter (Google Fonts) |
| Radius | 12px |

---

## ?? M�tricas a Acompanhar

- P�ginas indexadas no Google Search Console
- Acessos di�rios (Google Analytics)
- Tempo m�dio na p�gina
- Taxa de rejei��o por ferramenta
- Receita AdSense (ap�s aprova��o)

---

*NANOSISTECCK � Executar com intelig�ncia, publicar com velocidade, escalar com consist�ncia.*

---

## Administração segura (novo)

O painel `/admin` agora exige autenticação em banco de dados SQLite (`/data/admin.sqlite`) e possui camada de segurança com:

- Sessão com cookies `HttpOnly`, `SameSite` e proteção contra fixation.
- Proteção CSRF em login e salvamento de configurações.
- Limite de tentativas de login (5 falhas em 15 minutos por usuário/IP).
- Registro de tentativas de login para auditoria.
- Headers de segurança no painel administrativo (CSP, no-cache, anti-frame).

### Criar/atualizar usuário admin

```bash
php scripts/create_admin_user.php <usuario> <senha-forte>
```

> Recomendação: usar senha com 12+ caracteres, combinando letras, números e símbolos.

### Cadastro inicial via página (apenas 1 usuário)

- Acesse `/admin/cadastro` para criar o primeiro administrador.
- Após criar o primeiro usuário, essa página é bloqueada e passa a redirecionar automaticamente para `/admin/login`.
