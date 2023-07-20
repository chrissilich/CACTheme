export default () => {
	const slideshows = document.querySelectorAll('.cac-slideshow')
	console.log('found slideshow', slideshows)

	slideshows.forEach((slideshow, i) => {
		let current = 0
		let slides = slideshow.querySelectorAll('img')

		if (slideshow.hasAttribute('data-cac-slideshow-match-ratio')) {
			// get natural size of first image and scale container to match
			console.log('get sizing from image 0', slides)
			slides[0].addEventListener('load', function () {
				let firstImageRatio = this.naturalWidth / this.naturalHeight
				console.log('firstImageRatio', firstImageRatio)
				slideshow.style.aspectRatio = firstImageRatio / 1
			})
		}

		slides[0].classList.add('active')

		let next = () => {
			let oldSlide = slides[current]
			current = (current + 1) % slides.length
			let newSlide = slides[current]

			newSlide.classList.add('queued')

			setTimeout(() => {
				newSlide.classList.add('entering')
			}, 100) // give it time to "settle" the queued css

			// wait transition time...

			setTimeout(() => {
				newSlide.classList.remove('queued')
				newSlide.classList.remove('entering')
				newSlide.classList.add('active')
				oldSlide.classList.remove('active')
			}, 1500)
		}

		if (slides.length > 1) {
			setTimeout(() => {
				setInterval(next, 5000)
			}, i * 500)
		} else {
			console.log('Only one slide, no slideshow needed', slideshow)
		}
	})
}
