export default () => {
	console.log("global.js");

	// waypoints trigger some css animations just by class .animate-when-visible adding .animate
	document.querySelectorAll(".animate-when-visible").forEach((el) => {
		// needs rewrite with something build for esmodule
		// new Waypoint({
		// 	element: el,
		// 	offset: '90%',
		// 	handler: function (direction) {
		// 		this.element.classList.add('animate')
		// 		// console.log('animate on scroll', this.element)
		// 	},
		// })
	});
};
