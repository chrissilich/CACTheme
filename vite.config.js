import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path";

// https://vitejs.dev/config/
export default defineConfig({
	base: "wp-content/themes/cac/dist/",
	plugins: [
		vue({
			template: {
				transformAssetUrls: {
					includeAbsolute: false,
				},
			},
		}),
	],
	build: {
		sourcemap: true,
		watch: {},
		root: path.resolve(__dirname, "src"),
		copyPublicDir: false,
		outDir: path.resolve(__dirname, "dist"),
		emptyOutDir: false,
		rollupOptions: {
			input: path.resolve(__dirname, "src/index.html"),
			output: {
				assetFileNames: (assetInfo) => {
					let extType = assetInfo.name.split(".")[1];
					// send css to root
					if (/css/i.test(extType)) {
						return `style.css`;
					}
					// send images to dist/img
					if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
						extType = "img";
					}
					if (/woff|ttf|otf|woff2/i.test(extType)) {
						extType = "font";
					}
					return `${extType}/[name][extname]`;
				},
				// chunkFileNames: 'assets/js/[name]-[hash].js',
				chunkFileNames: "js/[name].js",
				// entryFileNames: 'assets/js/[name]-[hash].js',
				entryFileNames: "js/[name].js",
			},
		},
	},
	resolve: {
		alias: {
			"~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
			"@": path.resolve(__dirname, "src"),
		},
	},
	server: {
		port: 8080,
		hot: true,
	},
});
