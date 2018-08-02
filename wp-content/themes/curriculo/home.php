<?php
/**
 * Template Name: Curriculo
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<?php $title = get_the_title(get_the_ID()); ?>
	<style>
		.hero{
			background: url(<?php echo get_field('background_inicial')['url'] ?>);
			background-size: cover;
		}
	</style>
	<section class="container-fluid hero">
		<h1 class="hero__title"><?php echo $title; ?></h1>
		<a href="#contato" class="btn btn-c"><button>contato</button></a>
	</section> <!-- hero -->

	<section class="sobre-section section" id="sobre">
		<div class="container">
			<h2 class="section__title">Sobre</h2>
			<div class="col-sm-6 sobre-section__img">
				<img src="<?php echo get_field('imagem_sobre')['url']; ?>" alt="">
			</div>
			<div class="col-sm-6 sobre-section__conteudo">
				<div class="sobre-section__conteudo--info-tecnica texto-corpo">
					<?php the_field('informacao_tecnica'); ?>
				</div>
				<div class="sobre-section__conteudo--texto-corrido texto-corpo">
					<?php the_field('texto_sobre'); ?>
				</div>
			</div>
		</div> <!-- container -->
	</section> <!-- sobre -->


	<!-- HABILIDADES -->
	<section class="habilidades-section section" id="habilidades">
		<div class="container">
			<h2 class="section__title">Habilidades</h2>

			<div class="habilidades-principais col-sm-8 col-sm-offset-2 border-bottom">
				<h3 class="habilidades-principais__title"><?php the_field('habilidades_primeiro_titulo') ?></h3>

				<?php if(have_rows('primeiro_bloco_de_habilidades')) :
					while(have_rows('primeiro_bloco_de_habilidades')) : the_row();
				?>
				<div class="col-sm-6 habilidades no-padding">
					<div class="col-sm-6 habilidades__sub-title no-padding"><?php the_sub_field('titulo_habilidade') ?></div>
					<div class="col-sm-6 habilidades__circulos no-padding">
						<?php
							$circuloFechado = get_sub_field('nota_habilidade');
							$circuloAberto = 5 - $circuloFechado;

							//codigo usado para iterar e criar os circulos de acordo com a resposta do usuario
							for($i = 0; $i < $circuloFechado; $i++){
								echo '<div class="habilidades__circulos--circulo-fechado"></div>';
							}

							// e aqui ficam os circulos que nao sao abertos
							if($circuloAberto){
								for($i = 0; $i < $circuloAberto; $i++){
								echo '<div class="habilidades__circulos--circulo-aberto"></div>';
								}
							}
						?>
					</div> <!-- circulos -->
				</div> <!-- habilidades -->
				<?php endwhile; endif; ?>
			</div> <!-- habilidades principais -->

			<div class="habilidades-secundárias habilidades-principais col-sm-8 col-sm-offset-2 border-bottom">
				<h3 class="habilidades-secundárias__title habilidades__title"><?php the_field('habilidades_segundo_titulo') ?></h3>

				<?php if(have_rows('segundo_bloco_de_habilidades')) :
					while(have_rows('segundo_bloco_de_habilidades')) : the_row();
				?>
				<div class="col-sm-6 habilidades no-padding">
					<div class="col-sm-6 habilidades__sub-title no-padding"><?php the_sub_field('titulo_habilidade') ?></div>
					<div class="col-sm-6 habilidades__circulos no-padding">
						<?php
							$circuloFechado = get_sub_field('nota_habilidade');
							$circuloAberto = 5 - $circuloFechado;

							//codigo usado para iterar e criar os circulos de acordo com a resposta do usuario
							for($i = 0; $i < $circuloFechado; $i++){
								echo '<div class="habilidades__circulos--circulo-fechado"></div>';
							}

							// e aqui ficam os circulos que nao sao abertos
							if($circuloAberto){
								for($i = 0; $i < $circuloAberto; $i++){
								echo '<div class="habilidades__circulos--circulo-aberto"></div>';
								}
							}
						?>
					</div> <!-- circulos -->
				</div> <!-- habilidades -->
			<?php endwhile; endif; ?>
			</div> <!-- habilidades secundárias -->

			<div class="habilidades-idiomas col-sm-8 col-sm-offset-2">
				<h3 class="habilidades-idiomas__title habilidades__title">Idiomas</h3>
				<?php if(have_rows('idiomas')) :
					while(have_rows('idiomas')) : the_row();
				?>
				<div class="col-sm-6 habilidades no-padding">
					<div class="col-sm-6 habilidades__sub-title no-padding"><?php the_sub_field('titulo_habilidade') ?></div>
					<div class="col-sm-6 habilidades__circulos no-padding">
						<?php
							$circuloFechado = get_sub_field('nota_habilidade');
							$circuloAberto = 5 - $circuloFechado;

							//codigo usado para iterar e criar os circulos de acordo com a resposta do usuario
							for($i = 0; $i < $circuloFechado; $i++){
								echo '<div class="habilidades__circulos--circulo-fechado"></div>';
							}

							// e aqui ficam os circulos que nao sao abertos
							if($circuloAberto){
								for($i = 0; $i < $circuloAberto; $i++){
								echo '<div class="habilidades__circulos--circulo-aberto"></div>';
								}
							}
						?>
					</div> <!-- circulos -->
				</div> <!-- habilidades -->
			<?php endwhile; endif; ?>
			</div> <!-- habilidades idiomas -->
		</div> <!-- container -->
	</section> <!-- habilidades-section -->


	<!-- EXPERIENCIAS -->
	<section class="experiencias-section section" id="experiencias">
		<div class="container">
			<h2 class="section__title">Experiências</h2>
			<div class="time-line">
				<?php if(have_rows('linha_do_tempo')) :
					while(have_rows('linha_do_tempo')) : the_row();
				 ?>
				<div class="col-sm-3 no-padding"><p class="time-line__ano"><?php the_sub_field('ano_da_atividade') ?></p></div>
				<?php endwhile; endif; ?>

				<div class="time-line__progresso col-sm-12"></div><div class="time-line__seta"></div>

				<?php if(have_rows('linha_do_tempo')) :
					while(have_rows('linha_do_tempo')) : the_row();
				 ?>
				<div class="col-sm-3 no-padding">
					<div class="time-line__info">
						<h3 class="time-line__titulo"><?php the_sub_field('titulo_da_atividade') ?></h3>
						<p class="time-line__texto"><?php the_sub_field('sobre_a_atividade') ?></p>
					</div>
				</div> <!-- caixa de informação da timeline -->
				<?php endwhile; endif; ?>
			</div> <!-- time-line -->


			<div class="experiencias col-xs-12 no-padding">
				<?php
					if(have_rows('experiencias')):
					while(have_rows('experiencias')): the_row();
				 ?>

					<div class="col-sm-5 col-sm-offset-1 experiencias__single">
						<div class="col-sm-5 experiencias__icone">
							<img src="<?php echo get_theme_file_uri('assets/images/icone-') . get_sub_field('icone_experiencia') . '.png'; ?>" alt="">
						</div>
						<div class="col-sm-7">
							<h3 class="experiencias__single--titulo"><?php the_sub_field('titulo_experiencia') ?></h3>
							<h4 class="experiencias__single--ano"><?php the_sub_field('ano_experiencia') ?></h4>
						</div>
					</div>
					<div class="col-sm-6 experiencias__single">
						<h3 class="experiencias__single--subtitulo"><?php the_sub_field('subtitulo_experiencia') ?></h3>
						<div class="experiencias__single--corpo texto-corpo">
							<?php the_sub_field('texto_experiencia') ?>

						</div>
					</div>
				<?php endwhile; endif; ?>
			</div> <!-- experiencias -->

		</div> <!-- container -->
	</section> <!-- experiencias-section -->

	<section class="contato-section section" id="contato">
		<div class="container">
			<h2 class="section__title">Contato</h2>
			<div class="col-sm-6" id="contact-form">
				<?php
					get_template_part('contact-form');
				 ?>
			</div>
			<div class="col-sm-5 col-sm-offset-1 contato__links">
				<h3 class="contato__name"><?php echo $title; ?></h3>
				<div class="contato__links--links">
					<a href="https://www.facebook.com/matheus.beltrao.5?ref=bookmarks" target="_blank">
						<i class="fab fa-facebook"></i>
					</a>
					<a href="https://www.instagram.com/matheusbelts/" target="_blank">
						<i class="fab fa-instagram"></i>
					</a>
					<a href="https://www.linkedin.com/in/matheus-beltrao/" target="_blank">
						<i class="fab fa-linkedin"></i>
					</a>
					<a href="https://api.whatsapp.com/send?phone=5583999357721&text=Olá,%20vi%20seu%20curriculo%20através%20do%20site" target="_blank">
						<i class="fab fa-whatsapp-square"></i>
					</a>
				</div>
			</div>
		</div>
	</section>


<?php
get_footer();
