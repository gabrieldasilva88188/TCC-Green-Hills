🌱 Green Hills – Estufa Automatizada Inteligente
Projeto de Conclusão do Curso Técnico em Desenvolvimento de Sistemas – ETEC Fernando Prestes
📌 Sobre o Projeto

O Green Hills é uma solução de automação para estufas agrícolas, desenvolvida para monitorar e controlar condições ambientais de forma inteligente e remota. O sistema combina sensores físicos com uma aplicação web interativa, permitindo que produtores acompanhem em tempo real a umidade do solo, temperatura e umidade do ar.

Este projeto foi desenvolvido como Trabalho de Conclusão de Curso (TCC) com o objetivo de unir hardware e software para oferecer uma solução acessível e funcional para o cultivo de precisão.
🧠 Funcionalidades

    Monitoramento em tempo real de:

        Temperatura ambiente

        Umidade do ar

        Umidade do solo

    Automação de:

        Irrigação por bomba d’água

        Ventilação com ventoinha

    Conexão de estufas ao usuário via código de identificação

    Sistema de usuários com três níveis:

        adminMaster (controle total)

        admin (gerenciamento de usuários)

        comum (monitoramento apenas)

    Visualização de dados em gráficos interativos (AnyChart)

    Geração de relatórios em PDF

    Interface responsiva com Bootstrap 5

🛠️ Tecnologias Utilizadas
🔌 Hardware

    Arduino UNO R3

    Sensores DHT11/DHT22 e FC-28

    Bomba d’água, válvula solenóide e ventoinha

    Protoboard, jumpers e estrutura física de estufa

💻 Software

    Frontend: HTML5, CSS3, JavaScript, Bootstrap 5

    Backend: PHP 8.1, MySQL 8.0

    Bibliotecas: AnyChart (gráficos), Cleave.js (máscara de CPF)

    Servidor: XAMPP/WAMP ou Docker

🖼️ Telas do Sistema

    Login e Cadastro com controle de acesso

    Tela de conexão de estufas

    Tela de relatórios com gráficos interativos

    Tela de gerenciamento de usuários

    Página “Quem Somos” com apresentação da equipe

🔐 Segurança

    Hashing de senhas com password_hash (bcrypt)

    Validação de CPF e entradas do formulário

    Proteção contra SQL Injection e XSS

    Controle de sessão e permissões por tipo de usuário

🧪 Como Executar o Projeto

    Clone este repositório

    Configure o ambiente local com XAMPP ou Docker (PHP 8.1 + MySQL)

    Importe o arquivo banco.sql para o MySQL

    Atualize as credenciais de conexão no conexao.php

    Faça upload dos arquivos do projeto para htdocs/ ou similar

    Acesse http://localhost/seu_projeto/ no navegador

    O código-fonte do Arduino está na pasta arduino/, e deve ser enviado via Arduino IDE após as conexões com os sensores.

👨‍💻 Equipe de Desenvolvimento

    Felipe Ferreira de Souza

    Gabriel da Silva

    Giovanni Camargo Maruccio

    João Henrique Pedroso Oliveira

    Nikensley Pierre

Orientadores: Claudio Roberto Corredato e Carlos Eduardo Alves de Oliveira
📄 Licença

Este projeto foi desenvolvido exclusivamente para fins acadêmicos. Para uso comercial ou distribuição, entre em contato com os autores.

Se quiser, posso gerar esse README.md já formatado como arquivo Markdown e até te ajudar a organizar o repositório com pastas (/arduino, /web, /docs, etc). Deseja?
Você disse:
https://github.com/gabrieldasilva88188/TCC-Green-Hills esse é meu repositorio se conseguir criar um readme para eu colocar seria muito util
O ChatGPT disse:

Ótimo, Gabriel! Aqui está o conteúdo completo e formatado para você usar diretamente como README.md no seu repositório GitHub TCC-Green-Hills:

# 🌱 Green Hills – Estufa Automatizada Inteligente

> Projeto de Conclusão de Curso Técnico em Desenvolvimento de Sistemas – ETEC Fernando Prestes

## 📌 Sobre o Projeto

O **Green Hills** é uma solução de automação para estufas agrícolas, criada para monitorar e controlar condições ambientais de forma **remota e inteligente**. O sistema une sensores físicos conectados a um **Arduino** e uma aplicação web responsiva, que permite visualizar dados como temperatura, umidade do solo e do ar em tempo real.

Este projeto foi desenvolvido como Trabalho de Conclusão de Curso (TCC) e demonstra a viabilidade do uso da tecnologia no **cultivo de precisão** e na agricultura sustentável.

## 🧠 Funcionalidades

- 📊 Monitoramento em tempo real:
  - Temperatura ambiente
  - Umidade do ar
  - Umidade do solo
- 🤖 Ações automatizadas:
  - Irrigação automática
  - Ventilação
- 👥 Sistema de usuários com três níveis:
  - `adminMaster`: controle total
  - `admin`: gerenciamento de usuários
  - `comum`: acesso à visualização
- 📈 Exibição de dados em gráficos interativos (AnyChart)
- 📄 Geração de relatórios em PDF
- 💬 Interface amigável e responsiva com Bootstrap

## 🛠️ Tecnologias Utilizadas

### 🔌 Hardware
- Arduino UNO R3
- Sensor DHT11/DHT22 (temperatura/umidade do ar)
- Sensor FC-28 (umidade do solo)
- Bomba d’água, válvula solenóide, ventoinha
- Protoboard, jumpers e estrutura física da estufa

### 💻 Software
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend:** PHP 8.1, MySQL 8.0
- **Bibliotecas:** AnyChart (gráficos), Cleave.js (máscara de CPF)
- **Servidor Local:** XAMPP, WAMP ou Docker

## 🖼️ Telas do Sistema

- Login com controle de acesso
- Cadastro de usuários por tipo de permissão
- Conexão de estufas via código
- Relatórios com gráficos interativos
- Geração de PDF com dados coletados
- Tela de gerenciamento de usuários
- Página de apresentação da equipe

## 🔐 Segurança

- ✅ Hash de senhas com `password_hash` (bcrypt)
- ✅ Validação de CPF e dados obrigatórios
- ✅ Prevenção contra SQL Injection e XSS
- ✅ Controle de permissões por sessão e tipo de usuário

## 🚀 Como Executar o Projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/gabrieldasilva88188/TCC-Green-Hills.git

    Instale um servidor local como XAMPP, WAMP ou Docker

    Importe o banco de dados banco.sql para o MySQL

    Configure conexao.php com suas credenciais de acesso

    Copie os arquivos para a pasta do servidor local (ex: htdocs/)

    Acesse via navegador:

    http://localhost/TCC-Green-Hills/

    Envie o código para o Arduino usando o Arduino IDE (disponível na pasta /arduino)

👨‍💻 Equipe de Desenvolvimento

    Felipe Ferreira de Souza

    Gabriel da Silva

    Giovanni Camargo Maruccio

    João Henrique Pedroso Oliveira

    Nikensley Pierre

Orientadores:
Claudio Roberto Corredato
Carlos Eduardo Alves de Oliveira
📄 Licença

Este projeto foi desenvolvido exclusivamente para fins acadêmicos. Para outros usos, entre em contato com os autores.

Obrigado por visitar nosso projeto! 🌿
