export default () => {
	console.log('share-print.js')

	document.querySelector('.print-button')?.addEventListener('click', function (event) {
		window.print()
	})

	document.querySelector('.share-button')?.addEventListener('click', function (event) {
		console.log('trigger share dialog')
	})
}
