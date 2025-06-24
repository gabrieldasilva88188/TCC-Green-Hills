<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Estufas - Green Hills</title>
    <!--
        Importa os códigos de estilo CSS e as bibliotecas ncessárias,, incluindo Bootstrap e FontAwesome.
    --> 
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/style2.css">
    <link rel="stylesheet" href="./CSS/navstyle.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!---
    Inclui o cabeçalho(navbar) do site através de um arquivo php 'header.php'.
    -->
    <?php include 'header.php';?>

    <!---
    Caixa que guarda os cards que contém as informações das estufas de um usuario
    -->
    <div class="containerhouses">
        
        <div class="greenhouses">
        <!---
        Cards que guardam as informçaoes sobre cada estufa de um usuario
        -->
            <div class="greenhouse-card" onclick="showDetails('estufa1')">
                <img src="GreenHills.png" alt="Estufa">
                <h3>Estufa 1</h3>
                <p>Id: 123485121222</p>
                <p>Plantação: Feijão</p>
            </div>
            <div class="greenhouse-card" onclick="showDetails('estufa2')">
                <img src="GreenHills.png" alt="Estufa">
                <h3>Estufa 2</h3>
                <p>Id: 123485121223</p>
                <p>Plantação: Tomate</p>
            </div>
            <div class="greenhouse-card" onclick="showDetails('estufa3')">
                <img src="GreenHills.png" alt="Estufa">
                <h3>Estufa 3</h3>
                <p>Id: 123485121224</p>
                <p>Plantação: Variado</p>
            </div>
            <div class="greenhouse-card" onclick="showDetails('estufa4')">
                <img src="GreenHills.png" alt="Estufa">
                <h3>Estufa 4</h3>
                <p>Id: 123485121225</p>
                <p>Plantação: Tabaco</p>
            </div>
        </div>
        <!--
        Div que mostra os detalhes de cada estufa
        -->
        <div class="greenhouse-details" id="estufa1" style="display:none;">
        <button class="btn btn-close" onclick="closeDetails()"></button>
            <h2>Estufa 1 <i class="fas fa-edit" onclick="openEditModal('estufa1')"></i></h2>
            <p>Id: 123485121222</p>
            <p>Plantação: Feijão</p>
            <!--
            Botao Para expandir as informaçoes da estufa mostrando mais detalhadamente
            -->
            <a href="relatorio.php">
            <button class="btn  btnexp" onclick="toggleExpand('estufa1')">Expandir</button>
            </a>
        </div>
        <div class="greenhouse-details" id="estufa2" style="display:none;">
        <button class="btn btn-close" onclick="closeDetails()"></button>
            <h2>Estufa 2 <i class="fas fa-edit" onclick="openEditModal('estufa2')"></i></h2>
            <p>Id: 123485121223</p>
            <p>Plantação: Tomate</p>
            <a href="relatorio.php">
            <button class="btn  btnexp" onclick="toggleExpand('estufa2')">Expandir</button>
            </a>
        </div>
        <div class="greenhouse-details" id="estufa3" style="display:none;">
        <button class="btn btn-close" onclick="closeDetails()"></button>
            <h2>Estufa 3 <i class="fas fa-edit" onclick="openEditModal('estufa3')"></i></h2>
            <p>Id: 123485121224</p>
            <p>Plantação: Variado</p>
            <a href="relatorio.php">
            <button class="btn  btnexp" onclick="toggleExpand('estufa3')">Expandir</button>
            </a>
        </div>
        <div class="greenhouse-details" id="estufa4" style="display:none;">
        <button class="btn btn-close" onclick="closeDetails()"></button>
            <h2>Estufa 4 <i class="fas fa-edit" onclick="openEditModal('estufa4')"></i></h2>
            <p>Id: 123485121225</p> <p>Plantação: Tabaco</p>
            <a href="relatorio.php">
            <button class="btn  btnexp" onclick="toggleExpand('estufa4')">Expandir</button>
            </a>
        </div>
    </div>

    <!-- Modal para editar as informaçoes estufa-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Estufa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!--
                        Campos para serem editados da estufa.
                    -->
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="greenhouseName" class="form-label">Nome da Estufa</label>
                            <input type="text" class="form-control" id="greenhouseName">
                        </div>
                        <div class="mb-3">
                            <label for="greenhouseId" class="form-label">ID</label>
                            <input type="text" class="form-control" id="greenhouseId">
                        </div>
                        <div class="mb-3">
                            <label for="greenhousePlant" class="form-label">Plantação</label>
                            <input type="text" class="form-control" id="greenhousePlant">
                        </div>
                        <button type="button" class="btn  botao" onclick="deleteGreenhouse()">Deletar</button>
                    <button type="button" class="btn  botao" onclick="saveChanges()">Salvar</button>
                    </form>
                </div>
                 <!--<div class="modal-footer">
                    
                        Botão de Salvar as mudanças do editar e Botao de deletar a estufa.
                    <button type="button" class="btn btn-danger botao2" onclick="deleteGreenhouse()">Deletar</button>
                    <button type="button" class="btn btn-primary botao2" onclick="saveChanges()">Salvar</button>
                    
                </div> -->
            </div>
        </div>
    </div>

    <script>
        //Função para mostrar os detalhes da estufa clicada
        function showDetails(estufaId) {
            var details = document.getElementsByClassName('greenhouse-details');
            for (var i = 0; i < details.length; i++) {
                details[i].style.display = 'none';
            }
            document.getElementById(estufaId).style.display = 'block';
        }
        //Função para fechar os detalhes da estufa
        function closeDetails() {
            var details = document.getElementsByClassName('greenhouse-details');
            for (var i = 0; i < details.length; i++) {
                details[i].style.display = 'none';
            }
        }
        //Fnção para expandir  os detalhes da estufa
        function toggleExpand(estufaId) {
            var details = document.getElementById(estufaId);
            if (details.style.height === 'auto') {
                details.style.height = 'initial';
            } else {
                details.style.height = 'auto';
            }
        }
        //Função para abrir o modal de edição da estufa
        function openEditModal(estufaId) {
            // Pega os dados da estufa e preenche o modal
            var greenhouseName = document.querySelector(`#${estufaId} h2`).innerText;
            var greenhouseId = document.querySelector(`#${estufaId} p:nth-of-type(1)`).innerText.split(': ')[1];
            var greenhousePlant = document.querySelector(`#${estufaId} p:nth-of-type(2)`).innerText.split(': ')[1];
            
            document.getElementById('greenhouseName').value = greenhouseName;   // Preenche o nome da estufa no modal
            document.getElementById('greenhouseId').value = greenhouseId;   // Preenche o ID da estufa no modal
            document.getElementById('greenhousePlant').value = greenhousePlant; // Preenche o tipo de plantação no modal
            
            // Abre o modal
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));

            myModal.show();
        }
        //Funçao para salvar as mudanças do editar
        function saveChanges() {
            // Inserir código para salvar mudanças
            alert("Mudanças salvas com sucesso!");
        }
        // Funçao para deletar uma estufa 
        function deleteGreenhouse() {
            // Inserir código para deletar a estufa
            alert("Estufa deletada com sucesso!");
        }
    </script>
</body>
</html>
