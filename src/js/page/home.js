import { createApp } from 'vue'
import HomeApp from '../../vue/Home.vue'

export default () => {
	if (document.body.classList.contains('home')) {
		console.log('home.js')
		const app = createApp(HomeApp)
		app.config.performance = true
		app.mount('#app')
	}
}
