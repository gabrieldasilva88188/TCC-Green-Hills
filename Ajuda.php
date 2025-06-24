<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda - Green Hills</title>
    <!--
        Importa os códigos de estilo CSS e as bibliotecas ncessárias,, incluindo Bootstrap e FontAwesome.
    --> 
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/style2.css ">
    <link rel="stylesheet" href="./CSS/style_relatorio.css ">
    <link rel="stylesheet" href="./CSS/navstyle.css ">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body>
    <!---
    Inclui o cabeçalho(navbar) do site através de um arquivo php 'header.php'.
    -->
    <?php include 'header.php';?>

    <!---
    Div que contém as perguntas Frequentes em relaçao ao green hills
    -->
    <div class="content">
        <div class="faq-section">
            <h2>Perguntas Frequentes (FAQ)</h2>
            <details>
                <summary>Como posso comprar uma estufa?</summary>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi, omnis? Aliquam quae voluptate nesciunt natus asperiores
                     molestiae doloremque quasi illo, ipsa aut in ad quos recusandae esse amet dignissimos. Aliquam.</p>
            </details>
            <details>
                <summary>Quais são as opções de pagamento?</summary>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consequatur consectetur quibusdam eos, eum ab possimus officiis quidem,
                     ad natus doloremque labore autem aliquam ea assumenda soluta molestiae sint alias!</p>
            </details>
            <details>
                <summary>Como funciona a instalação das estufas?</summary>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti veniam molestias quibusdam delectus iste! 
                    Ut sed soluta doloremque sapiente nostrum voluptas laudantium deleniti tenetur? Eligendi recusandae nihil consequatur magni porro!</p>
            </details>
        </div>
        <!---
            Div que contém Formulário de Ajuda para entrar em contato com a Equipe Green Hills
        -->
        <div class="contact-section">
            <h2>Contato</h2>
            <div class="contact-form">
                <!---
                    Formulário
                -->
                <form>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Mensagem:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <button type="submit"class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
