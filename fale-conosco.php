<?php
$currentPage = 'fale-conosco';
$pageTitle = 'Fale Conosco';
include 'includes/header.php';
?>

<section>
    <div class="container text-center py-5">
        <div>
            <h2 class="titulo">REPRESENTANTES</h2>
            <div class="divisor mx-auto"></div>
            <p class="texto">
                Nossa equipe comercial está pronta para te atender em todo o Brasil e também no
                exterior,
                oferecendo consultoria técnica e atendimento personalizado.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="representantes-image-container">
                    <img src="assets/images/representantes.jpeg" alt="Equipe Comercial Wolfstore" class="img-fluid imagem-principal-representantes">
                </div>
            </div>
        </div>

        <div class="container-contato">
            <div class="card-contato">
                <h3>Para um primeiro contato, fique à vontade para nos chamar</h3>
                <a href="https://wa.me/555196062453" class="btn-contact-whatsapp">
                    <i class="bi bi-whatsapp"></i>
                    +55 51 9606-2453
                </a>
            </div>
        </div>
    </div>
</section>

<section class="secao-fale-conosco">
    <div class="container texto">
        <div class="text-center">
            <h2 class="titulo">FALE CONOSCO</h2>
            <div class="divisor mx-auto"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="container-formulario-contato" id="fale-conosco">
                    <form action="envio_emailFaleConosco.php" method="POST" enctype="multipart/form-data"
                        id="contactForm">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                                    <label for="telefone">Telefone</label>
                                </div>
                                <input type="hidden" name="prefixo" id="prefixo">
                            </div>

                            <div class="col-12">
                                <div class="container-arquivo">
                                    <label for="anexo" class="rotulo-arquivo">
                                        <i class="bi bi-paperclip"></i>
                                        <span id="file-name">Anexar arquivo (opcional)</span>
                                    </label>
                                    <input type="file" class="form-control" id="anexo" name="anexo">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="mensagem" name="mensagem" placeholder="Digite sua mensagem" style="height: 150px" required></textarea>
                                    <label for="mensagem">Mensagem</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="submit" class="btn-enviar">
                                    <i class="bi bi-send"></i>Enviar mensagem
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-none d-lg-block col-lg-5">
                <div class="container-informacoes-contato">
                    <div class="card-localizacao">
                        <div class="cabecalho-localizacao">
                            <div class="icone-localizacao">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="titulo-localizacao">
                                <h4>WOLFSTORE MATRIZ</h4>
                                <p>Novo Hamburgo - RS</p>
                            </div>
                        </div>
                        <div class="detalhes-localizacao">
                            <div class="item-localizacao">
                                <i class="bi bi-geo-alt"></i>
                                <span>Joaquim Gonçalves Ledo, 821</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-mailbox"></i>
                                <span>CEP: 93542-590</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-telephone"></i>
                                <span>51-3201-7400</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-clock"></i>
                                <span>Segunda a Quinta: 7:30 às 11:30/13:00 as 18:00</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-clock-history"></i>
                                <span>Sexta-feira: 7:30 às 11:30/13:00 as 17:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-localizacao">
                        <div class="cabecalho-localizacao">
                            <div class="icone-localizacao">
                                <i class="bi bi-building"></i>
                            </div>
                            <div class="titulo-localizacao">
                                <h4>WOLFSTORE FILIAL NOVA SERRANA</h4>
                                <p>Nova Serrana - MG</p>
                            </div>
                        </div>
                        <div class="detalhes-localizacao">
                            <div class="item-localizacao">
                                <i class="bi bi-geo-alt"></i>
                                <span>Rua Benjamin Martins do Espirito Santo, 2337</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-mailbox"></i>
                                <span>CEP: 35524-119</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-telephone"></i>
                                <span>051-3036-7400</span>
                            </div>
                            <div class="item-localizacao">
                                <i class="bi bi-clock"></i>
                                <span>Segunda a sexta: 7:00 às 11:00/12:00 as 17:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/imask.js"></script>
<script src="assets/js/validaNumero.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Máscara para telefone
        IMask(document.getElementById('telefone'), {
            mask: '(00) 00000-0000'
        });

        // Atualiza o nome do arquivo anexado
        document.getElementById('anexo')?.addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Anexar arquivo (opcional)';
            document.getElementById('file-name').textContent = fileName;
        });

        // Animação de entrada
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.section-heading, .representantes-image-container, .container-formulario-contato, .container-informacoes-contato, .card-contato, .card-localizacao').forEach(element => {
            observer.observe(element);
        });

        <?php if (isset($modalStatus) && $modalStatus === "success"): ?>
            setTimeout(function () {
                window.location.href = "https://www.wolfstore.com.br/site/Wolfstore_demo/fale-conosco.php";
            }, 3000);
        <?php endif; ?>
    });
</script>