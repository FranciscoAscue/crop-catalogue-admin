<?php include("../templates/header.php");
include("../system/database.php");
?>

<?php
$sentencia = $conn->prepare("SELECT id,titulo,foto,autor,tag,fecha FROM `registro` 
ORDER BY `registro`.`fecha` DESC;");
$sentencia->execute();
$lista_blogs = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['tagCategory'])) {
  $tagCategory = (isset($_GET['tagCategory']) ? $_GET['tagCategory'] : "");
  $sentencia = $conn->prepare("SELECT id,titulo,foto,autor,tag,fecha FROM `registro` 
  WHERE tag = :tag ORDER BY `registro`.`fecha` DESC;");

  $sentencia->bindParam(":tag", $tagCategory);
  $sentencia->execute();
  $lista_blogs = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['search'])) {
  $search = (isset($_GET['search']) ? $_GET['search'] : "");
  $sentencia = $conn->prepare("SELECT id,titulo,foto,autor,tag,fecha FROM `registro` 
    WHERE `blog` LIKE :search ORDER BY `fecha` DESC;");

  $sentencia->bindValue(":search", "%" . $search . "%");
  $sentencia->execute();
  $lista_blogs = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['search'])) {
  $search = (isset($_POST['search']) ? $_POST['search'] : "");
  header("Location:./index.php?search=".$search);
}

?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">

    <div class="page-header d-flex align-items-center" style="background-image: url('');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3">
            <img width="180px" src="/assets/img/blog.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 text-center">
            <h2> Blogs </h2>
            <p>Nuestro blog es tu guía para explorar el emocionante mundo de la biotecnología y la ciencia, y estamos emocionados de compartir contigo nuestro conocimiento y perspectivas sobre los temas que nos apasionan.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container blog_items">
        <ol>
          <li><a href="/blog/">Inicio</a></li>
          <li>Blog - <?php echo $tagCategory; ?></li>

        </ol>
        <div class="justify-content-end">
          <form method="POST" class="mt-3">
            <input  type="text" name="search" id="search">
            <button type="submit"><i style="line-height: 0;" class="bi bi-search"></i></button>
          </form>
        </div><!-- End sidebar search formn-->
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->

  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4 posts-list">

        <?php
        if (empty($lista_blogs)) { ?>
          <h3><i class="bi bi-exclamation-triangle"></i> No se encontro resultados!!</h3>
        <?php } ?>
        <?php foreach ($lista_blogs as $blogs) { ?>

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <a href="/blog/post.php?pubID=<?php echo $blogs["id"]; ?>">
                  <img src="../assets/img/blog/<?php echo $blogs["foto"]; ?>" alt="post-item" class="img-fluid" loading="lazy"></a>
              </div>

              <p class="post-category"><?php echo $blogs["tag"]; ?></p>

              <h2 class="title">
                <a href="/blog/post.php?pubID=<?php echo $blogs["id"]; ?>">
                  <?php echo $blogs["titulo"]; ?></a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="/assets/img/team/<?php echo $blogs["autor"] . ".jpeg"; ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list"><?php echo $blogs["autor"]; ?></p>
                  <p class="post-date">
                    <time datetime="2022-01-01"><?php echo $blogs["fecha"]; ?></time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
        <?php } ?>
      </div><!-- End blog posts list -->

      <!-- <div class="blog-pagination">
        <ul class="justify-content-center">
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
      </div> -->

      <!-- End blog pagination -->

    </div>
  </section><!-- End Blog Section -->


</main><!-- End #main -->

<?php include("../templates/footer.php"); ?>