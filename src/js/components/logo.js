import { gsap } from "gsap";

export default () => {
	let logoBox = document.querySelector("header .logo-column");
	let logoComponent = document.querySelector("header .logo");
	let cacLogo = logoComponent.querySelectorAll(".logo-main");
	let logoDivider = logoComponent.querySelectorAll(".logo-divider");
	let collectionLogos = logoComponent.querySelectorAll(".collection-logo");

	const isMobileBreakpoint = () => {
		return window.innerWidth < 768;
	};

	window.changeHeaderLogo = function (collectionSlug, logoBoxOpacity) {
		console.log("changeHeaderLogo: ", collectionSlug, logoBoxOpacity);

		logoBox.style.backgroundColor = `rgba(255, 255, 255, ${
			logoBoxOpacity / 100
		});`;

		if (!collectionSlug) {
			// go back to the mode where it's just the main CAC logo

			gsap.to(logoDivider, {
				scaleX: 0,
				opacity: 0,
				display: "none",
				duration: 0.3,
			});
			gsap.to(cacLogo, {
				delay: 0.1,
				duration: 0.5,
				y: isMobileBreakpoint() ? "12%" : "7%",
			});
			gsap.to(collectionLogos, {
				delay: 0.1,
				duration: 0.3,
				display: "none",
				opacity: 0,
			});
		} else {
			// show a collection logo with the main one
			let collectionLogo = logoComponent.querySelector(
				".collection-logo.collection-logo--" + collectionSlug
			);
			let groupDelay = 0.5;
			gsap.to(cacLogo, {
				delay: 0 + groupDelay,
				duration: 0.3,
				y: "0%",
			});
			gsap.to(logoDivider, {
				delay: 0.1 + groupDelay,
				scaleX: 1,
				opacity: 1,
				display: "block",
				duration: 0.4,
			});
			gsap.to(collectionLogo, {
				delay: 0.1 + groupDelay,
				duration: 0.6,
				display: "block",
				opacity: 1,
			});
		}
	};
};
