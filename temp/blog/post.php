<?php include("../templates/header.php");
include("../system/database.php");

$request = $conn->prepare("SELECT *,
(SELECT COUNT(tag) FROM registro WHERE 
`registro`.`tag` = `tag`.`tag`) AS count FROM `tag`;");
$request->execute();
$lista_tags = $request->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['pubID'])) {
  $pubID = (isset($_GET['pubID']) ? $_GET['pubID'] : "");
  $sentencia = $conn->prepare("SELECT *,(SELECT correo FROM `users` 
  WHERE `users`.`nombre` = `registro`.`autor` 
  LIMIT 1) as correo FROM `registro` where id = :id ;");

  $sentencia->bindParam(":id", $pubID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);

  $titulo = $registro["titulo"];
  $foto = $registro["foto"];
  $tag = $registro["tag"];
  $autor = $registro["autor"];
  $blog = $registro["blog"];
  $fecha = $registro["fecha"];
  $correo = $registro["correo"];
}

if (isset($_POST['search'])) {
  $search = (isset($_POST['search']) ? $_POST['search'] : "");
  header("Location:/blog/index.php?search=".$search);
}

?>

<?php
$sentencia = $conn->prepare("SELECT id,titulo,foto,fecha FROM `registro` 
ORDER BY `registro`.`fecha` DESC LIMIT 5");
$sentencia->execute();
$lista_blogs = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2><?php echo $titulo; ?></h2>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href=".">Inicio</a></li>
          <li><?php echo $tag; ?></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8">

          <article class="blog-details">
            <?php if($pubID == 18){ ?>
                <iframe id="youtube-7847" frameborder="0" allowfullscreen="1" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                title="Player for FORESLAB Presentación" width="640" height="360" 
                src="https://www.youtube-nocookie.com/embed/Gr9VUnqABfc?autoplay=1&amp;controls=1&amp;disablekb=1&amp;playsinline=1&amp;cc_load_policy=0&amp;cc_lang_pref=auto&amp;widget_referrer=https%3A%2F%2Fforeslab.com%2F&amp;rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;customControls=true&amp;noCookie=true&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fforeslab.com&amp;widgetid=1">
                    
                </iframe>
            <?php }else{ ?>
            <div class="post-img text-center">
              <img src="/assets/img/blog/<?php echo $foto; ?>" alt="blog-photo"  loading="lazy" class="img-fluid">
            </div>
            <?php }?>
            <h4><?php echo $titulo; ?></h4>
            <?php
            echo $blog;
            ?>

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#"><?php echo $tag; ?></a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>

              </ul>
            </div><!-- End meta bottom -->

          </article><!-- End blog post -->

          <div class="post-author d-flex align-items-center">
            <img src="/assets/img/team/<?php echo $autor . ".jpeg"; ?>" class="rounded-circle flex-shrink-0" alt="">
            <div>
              <h4><?php echo $autor; ?></h4>
              <div class="social-links">
                <a href="https://www.linkedin.com/company/foreslab/"><i class="bi bi-linkedin"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100090484663194"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/foreslab.peru/?igshid=YmMyMTA2M2Y%3D"><i class="biu bi-instagram"></i></a>
              </div>
              <p>
                <?php echo $correo; ?>
              </p>
            </div>
          </div><!-- End post author -->


        </div>

        <div class="col-lg-4">

          <div class="sidebar">

            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Buscar</h3>
              <form method="POST" class="mt-3">
                <input type="text"  name="search" id="search">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Categorias</h3>
              <ul class="mt-3">
                <?php foreach ($lista_tags as $tags) { ?>
                  <li><a href="/blog/index.php?tagCategory=<?php echo $tags["tag"]; ?>">
                  <?php echo $tags["tag"]; ?><span>(<?php echo $tags["count"]; ?>)</span></a></li>
                <?php } ?>
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Posts Recientes</h3>

              <div class="mt-3">
                <?php foreach ($lista_blogs as $blog) { ?>

                  <div class="post-item mt-3">
                    <img src="/assets/img/blog/<?php echo $blog["foto"]; ?>" alt="post-<?php echo $blog["id"]; ?>" loading="lazy">
                    <div>
                      <h4><a href="/blog/post.php?pubID=<?php echo $blog["id"]; ?>">
                      <?php echo $blog["titulo"]; ?></a></h4>
                      <time datetime="2020-01-01"><?php echo $blog["fecha"]; ?></time>
                    </div>
                  </div><!-- End recent post item-->
                <?php } ?>

              </div>

            </div><!-- End sidebar recent posts-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->

</main><!-- End #main -->

<?php include("../templates/footer.php"); ?>