<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>controle de estoque</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--CSS -->
    <link href="css/main.css" rel="stylesheet">

  </head>
  <body>

    <!-- BEGIN NAV -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Main Menu</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a id="home" href="#">Home</a></li>
            <li><a id="produto" href="#produto">Produtos</a></li>
            <li><a id="cliente" href="#cliente">Clientes</a></li>
            <li><a id="pedido" href="#pedido">Pedidos</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
    <!-- END NAV -->

    <!-- BEGIN Container -->
    <div class="container">

      <div id="contenthome" class="starter-template">
        <h1>Sistema de Controle de Estoque</h1>
        <p class="lead">Use o menu para navegar entre produtos, clientes e pedidos.</p>
      </div>

      <div id="contentproduto" class="starter-template">
        <h1>Produto</h1>
         <button type="button" id="criar-produto" class="btn btn-success btn-criar">Criar Produto</button>
          <table id="table-produto" class="table table-striped">

          </table>
        </div>

      <div id="contentcliente" class="starter-template">
        <h1>Cliente</h1>
         <button type="button" id="criar-cliente" class="btn btn-success btn-criar">Criar Cliente</button>
          <table id="table-cliente" class="table table-striped">

          </table>
        </div>  

      <div id="contentpedido" class="starter-template">
        <h1>Pedido</h1>
         <button type="button" id="criar-pedido" class="btn btn-success btn-criar">Criar Pedido</button>
          <table id="table-pedido" class="table table-striped">

          </table>
        </div>  

    </div>
    <!-- END Container -->

    <!-- BEGIN Modal -->
    <div id="modal-produto" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Produto</h4>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="action-produto" val="insert">
              <div class="form-group">
                <label for="produto-nome" class="control-label">Nome:</label>
                <input type="text" class="form-control" id="produto-nome">
              </div>
              <div class="form-group">
                <label for="produto-descricao" class="control-label">Descricao:</label>
                <textarea class="form-control" id="produto-descricao"></textarea>
              </div>
              <div class="form-group">
                <label for="produto-preco" class="control-label">Preco:</label>
                <input type="text" class="form-control" id="produto-preco">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="save-produto" type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="modal-produto-delete" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Produto Deletar</h4>
          </div>
          <div class="modal-body">
            <p id="p-delete-produto">Tem certeza que voce deseja deletar esse produto?</p>
            <form>
              <input type="hidden" id="action-produto-remove">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="delete-produto" type="button" class="btn btn-danger">Deletar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="modal-cliente" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">cliente</h4>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="action-cliente" val="insert">
              <div class="form-group">
                <label for="cliente-nome" class="control-label">Nome:</label>
                <input type="text" class="form-control" id="cliente-nome">
              </div>
              <div class="form-group">
                <label for="cliente-email" class="control-label">Email:</label>
                <input class="form-control" id="cliente-email"></input>
              </div>
              <div class="form-group">
                <label for="cliente-telefone" class="control-label">Telefone:</label>
                <input type="text" class="form-control" id="cliente-telefone">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="save-cliente" type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="modal-cliente-delete" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">cliente Deletar</h4>
          </div>
          <div class="modal-body">
            <p id="p-delete-cliente">Tem certeza que voce deseja deletar esse cliente?</p>
            <form>
              <input type="hidden" id="action-cliente-remove">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="delete-cliente" type="button" class="btn btn-danger">Deletar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="modal-pedido" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Pedido</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="pedido-cliente" class="control-label">Cliente:</label>
                <select class="form-control" id="pedido-cliente" name="clientes">
                  <option value="0">Sem Clientes</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pedido-produto" class="control-label">Produto:</label>
                <select class="form-control" id="pedido-produto" name="produtos">
                  <option value="0">Sem Produtos</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="save-pedido" type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="modal-pedido-delete" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Pedido Deletar</h4>
          </div>
          <div class="modal-body">
            <p id="p-delete-pedido">Tem certeza que voce deseja deletar esse pedido?</p>
            <form>
              <input type="hidden" id="action-pedido-cliente">
              <input type="hidden" id="action-pedido-produto">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="delete-pedido" type="button" class="btn btn-danger">Deletar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <!-- END Modal -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- JavaScript -->
    <script src="js/main.js"></script>

  </body>
</html>