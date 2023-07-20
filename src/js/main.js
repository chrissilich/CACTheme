import "../scss/style.scss";

import "./setup/modernizr.js";
import themeStarter from "./setup/theme-starter.js";
import global from "./setup/global.js";

import logo from "./components/logo.js";
import nav from "./components/nav.js";
import sharePrint from "./components/share-print.js";
import slideshow from "./components/slideshow.js";

import home from "./page/home.js";
import features from "./page/features.js";

themeStarter();
global();

logo();
nav();
sharePrint();
slideshow();

home();
features();
