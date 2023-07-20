export default () => {
	console.log("nav.js");

	const closeNav = () => {
		console.log("closeNav()");
		document.body.classList.add("nav-transitional");
		document.body.classList.remove("nav-open");
		setTimeout(() => {
			document.body.classList.remove("nav-transitional");
		}, 500);
	};
	const openNav = () => {
		console.log("openNav()");
		window.scrollTo(0, 0);
		document.body.classList.add("nav-transitional");
		setTimeout(() => {
			document.body.classList.add("nav-open");
		}, 0);
		setTimeout(() => {
			document.body.classList.remove("nav-transitional");
		}, 500);
	};

	document
		.querySelector(".hamburger")
		?.addEventListener("click", function (event) {
			document.body.classList.contains("nav-open")
				? closeNav()
				: openNav();
		});

	// get clicks on the nav wrapper and close the nav (note that we have to ignore clicks on the nav itself further down)
	let siteNavWrapper = document.querySelector(".site-nav");
	siteNavWrapper.addEventListener("click", function (event) {
		console.log("siteNavWrapper click", event);
		closeNav();
	});

	// get clicks on the nav and stop them from bubbling up to the wrapper
	let siteNav = document.querySelector(".nav-menu-column");
	siteNav.addEventListener("click", function (event) {
		event.stopPropagation();
	});

	// make the escape key do it too, just for fun
	document.addEventListener("keydown", function (event) {
		if (event.key === "Escape") {
			closeNav();
		}
	});
};
