<div class="evento-espaco-home">
    <div class="tipo" id="evento">Eventos culturais</div>
    <div class="div-ev-es">
        <?php
        for ($i = 0; $i < count($this->dados2); $i++) {
            ?>
            <div class="espaco-evento-i">
                <h1 class="nome"><?= $this->dados2[$i]['nome'] ?></h1>
                <img src="/MaisCulturaBrasiliaMVC/Midia/<?= $this->dados2[$i]['foto'] ?>"/>
                <p><button type='button' class='btn111' data-toggle='modal' data-target='#myModal1<?= $this->dados2[$i]["cod"] ?>'>Ler Mais</button></p>
            </div>
            <?php
        }
        ?>
        <?php
        for ($i = 0; $i < count($this->dados2); $i++) {
            ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal1<?= $this->dados2[$i]['cod'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <h1 class='titulo' align='center'> <?= $this->dados2[$i]['nome'] ?></h1>            
                            <img class='cultura' src='/MaisCulturaBrasiliaMVC/Midia/<?= $this->dados2[$i]['foto'] ?>'/>
                            <h1 class='titulo' align='center'>Um pouco da história</h1>
                            <p align='center'><?= $this->dados2[$i]['descricao'] ?></p>
                            <h1 class='titulo' align='center'>Funcionamento</h1>
                            <p>
                                <b>Local: </b><?= $this->dados2[$i]['local'] ?>

                            </p> 
                            <p><b>Horários: </b><?= $this->dados2[$i]['horario'] ?></p>
                            <h1 class='titulo' align='center'>Comentários</h1>
                            <form action="" method="POST">
                                <textarea  name="comentario" rows='4' cols='50' class='campo12' placeholder='Digite aqui seu comentário' required="required"></textarea><br>
                                <button class='btn'>Enviar</button>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- Modal -->
    </div>
</div>
