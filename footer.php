
<!-- Footer -->

<footer class="text-center mt-5 pt-3 border-top text-lg-start bg-light text-muted">

  <section class="pb-1">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4 titre-footer">
            </i>COMPLÉMENT-RH 
          </h6>
          <a href="https://complement-rh.fr/" target="_blank">
            <img class ="img-fluid mt-2"src="<?php echo (get_template_directory_uri() . '/assets/icone/favicon.png') ?>" alt="">
          </a>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4 titre-footer">
            Important
          </h6>
          <p>
            <a href="https://complement-rh.fr/mentions-legales/" class="text-reset" target="_blank">Mentions légales</a>
          </p>
          <p>
            <a href="https://complement-rh.fr/politique-de-confidentialite/" class="text-reset" target="_blank">Politique confidentialité</a>
          </p>
        </div>
      </div>
    </div>
  </section>

  <div class="text-center p-4 text-white" style="background-color: #1b1b1b;">
    © 2021 Copyright @ Designed by:
    <a class="text-reset fw-bold" href="https://paradisiak.com/" target="_blank">Paradisiak</a>
  </div>
</footer>

<!-- Intégration des données cookies & RGPD -->

<div id="wrapper">
    <div class="cookie-container text-center alert alert-dismissible fade show" role="alert">
      <p class="cookie-text text-center text-justify mt-5">
        Nous utilisons des cookies pour vous garantir la meilleure expérience sur notre site. Si vous continuez à utiliser ce dernier, nous considérerons que vous acceptez l'utilisation des cookies. Voir notre
        <a href="https://complement-rh.fr/politique-de-confidentialite/" target="_blank">Notre politique de confidentialité</a>.
      </p>
      <button class="cookie-btn mt-2" title="Nous respectons votre vie privée et les règles RGPD"><i class="fa fa-check" aria-hidden="true"></i> Accepter et fermer</button>
      <button type="button" class="btn-close btn-danger" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<script>
    const cookieContainer = document.querySelector(".cookie-container");
    const cookieButton = document.querySelector(".cookie-btn");

    cookieButton.addEventListener("click", () => {
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieBannerDisplayed", "true");
    });

    setTimeout(() => {
    if (!localStorage.getItem("cookieBannerDisplayed")) {
    cookieContainer.classList.add("active");
    }
    }, 1500);
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="<?php echo(get_template_directory_uri() . '/assets/js/main.js') ?>" defer></script>

</body>
</html>