<?php
$currentPage = 'trabalhe-conosco';
$pageTitle = 'Trabalhe Conosco';
include 'includes/header.php';
?>

<section>
    <div class="container text-center py-5">
        <div class="text-center">
            <h2 class="titulo">VENHA FAZER PARTE DO NOSSO TIME</h2>
            <div class="divisor mx-auto"></div>
            <p class="texto">
                Na Wolfstore, acreditamos em valores sólidos e em um padrão ético que permeia todas as nossas relações,

                honrando os compromissos assumidos.
                Nossa filosofia é simples: Acredite e busque viver <span class="highlight">"CADA VEZ MELHOR."</span>

                A soma do melhor de cada um de nós resulta no sucesso coletivo!
                Traga sua energia e seu melhor para juntos continuarmos escrevendo uma história de vitórias e
                conquistas!
            </p>
        </div>
    </div>
</section>

<section class="secao-trabalhe-conosco">
    <div class="container texto">
        <div class="text-center">
            <h2 class="titulo">Trabalhe Conosco</h2>
            <div class="divisor mx-auto"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="container-formulario-contato" id="trabalhe-conosco">
                    <form action="envio_emailTrabalheConosco.php" method="POST" enctype="multipart/form-data"
                        id="contactForm">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="seu@email.com" required>
                                    <label for="email">E-mail</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="telefone" name="telefone"
                                        placeholder="(00) 00000-0000" required>
                                    <label for="telefone">Telefone</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="container-arquivo">
                                    <label for="anexo" class="rotulo-arquivo">
                                        <i class="bi bi-paperclip"></i>
                                        <span id="file-name">Anexar arquivo</span>
                                    </label>
                                    <input type="file" class="form-control" id="anexo" name="anexo"
                                        accept="application/pdf" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="mensagem" name="mensagem"
                                        placeholder="Digite sua mensagem" style="height: 150px" required></textarea>
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
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/imask.js"></script>
<script src="assets/js/validaNumero.js?v=2"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Máscara para telefone
        IMask(document.getElementById('telefone'), {
            mask: '(00) 00000-0000'
        });

        // Atualiza o nome do arquivo anexado
        document.getElementById('anexo')?.addEventListener('change', function () {
            const fileName = this.files[0]?.name || 'Anexar arquivo';
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
                window.location.href = "https://www.wolfstore.com.br/site/Wolfstore_demo/trabalhe-conosco.php";
            }, 3000);
        <?php endif; ?>
    });
</script>