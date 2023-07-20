</main><!-- /#main -->

<div class="footer-pusher"></div>

<footer id="footer">
	<div class="container">
		<div class="row">


			<div class="social-icons">
				<?php
				$instagram_icon = get_field('cac_social_instagram_icon', 'option');
				$instagram_url = get_field('cac_social_instagram_url', 'option');
				$pinterest_icon = get_field('cac_social_pinterest_icon', 'option');
				$pinterest_url = get_field('cac_social_pinterest_url', 'option');
				if ($instagram_icon && $instagram_url) : ?>
					<a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer">
						<?php echo wp_get_attachment_image($instagram_icon, 'thumbnail', false, []); ?>
					</a>
				<?php endif;
				if ($pinterest_icon && $pinterest_url) : ?>
					<a href="<?php echo esc_url($pinterest_url); ?>" target="_blank" rel="noopener noreferrer">
						<?php echo wp_get_attachment_image($pinterest_icon, 'thumbnail', false, []); ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="col-12 text-center text-uppercase">
				<p>
					<?php printf(esc_html__('&copy; %1$s %2$s', 'cac'), date_i18n('Y'), 'Codename CAC Interiors Ltd.'); ?>
				</p>
				<p class="lineweaver-credit">
					<a href="https://lineweaverdesign.com" target="_blank">Website design by Lineweaver Design</a>
				</p>
			</div>


		</div><!-- /.row -->
	</div><!-- /.container -->


</footer><!-- /#footer -->
</div><!-- /#wrapper -->
<?php
wp_footer();
?>

<?php include_once('responsive-debugger.php'); ?>
</body>

</html>
