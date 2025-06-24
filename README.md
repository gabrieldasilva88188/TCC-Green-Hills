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
