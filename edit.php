<?php

    include "db_conn.php";
    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
        $nome_blog = $_POST['nome_blog'];
        $url_blog = $_POST['url_blog'];
        $coment_blog = $_POST['coment_blog'];

        $sql = "UPDATE `crud` SET `nome_blog`='$nome_blog',`url_blog`='$url_blog',`coment_blog`='$coment_blog' WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: index.php?msg=Atualização feita com sucesso");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }


    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Application</title>
  </head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
        Gerencie o seu Blog
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edite as informações</h3>
            <p class="text-muted">Altere as informações dos seus Blogs aqui!</p>
        </div>

        <?php
            
            $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nome do Blog:</label>
                    <input type="text" class="form-control" name="nome_blog" value="<?php echo $row['nome_blog']?>" required>
                </div>
   
                <div class="col">
                    <label class="form-label">URL do Blog</label>
                    <input type="url" class="form-control" name="url_blog" value="<?php echo $row['url_blog']?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Sobre o Blog</label>
                <input type="text" class="form-control" name="coment_blog" value="<?php echo $row['coment_blog']?>" required>
            </div>

            <div class="form-group mb-3">
                <label></label>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        </div>
    </div>
    
    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>
  </body>
</html>