export default () => {
	if (
		document.body.classList.contains('tax-cac_feature_type') ||
		document.body.classList.contains('single-cac_feature')
	) {
		console.log('features.js')

		document.querySelector('.menu-item-object-cac_feature_type')?.classList.add('current-menu-item-forced')
	}
}
