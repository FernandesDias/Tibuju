<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Produtos</h1>
            </div>
            <div class="col-lg-4">
                <h3>Adicionar novo produto</h3>
            </div>
            <div class="col-lg-8">
                <h3>Alterar produtos existentes</h3>
                <?php
                $this->table->set_heading("Imagem","Excluir","Alterar","Categoria","Código","Titulo","Preco","Status");
                foreach($produtos as $produto){
                    $imagem = img("assets/img/categorias/categoria-sem-foto.png");
                    if(is_file("assets/img/produtos/".  md5($produto->id).".jpg")){
                        $imagem = img("assets/img/produtos/".md5($produto->id).".jpg");
                    }
                    $excluir = anchor(base_url("administracao/produtos/excluir/".md5($produto->id)),"Excluir",array('onclick'=>"return confirm('Confirma exclusão?')"));
                    $alterar = anchor(base_url("administracao/produtos/alterar/".md5($produto->id)),"Alterar");
                    $codigo = $produto->codigo;
                    $categoria = $produto->categoria;
                    $titulo = $produto->titulo;
                    $preco = reais($produto->preco);
                    $status = ($produto->ativo == 1)?"Ativo":"Inativo";
                    $this->table->add_row($imagem,$excluir,$alterar,$categoria,$codigo,$titulo,$preco,$status);
                }
                $this->table->set_template(array('table_open'=>'<table class="table table-striped miniaturas">'));
                echo $this->table->generate();
                echo "<div class='pagination_button'>" . $links_paginacao . "</div>";
                ?>
            </div>
        </div>
    </div>
</div>