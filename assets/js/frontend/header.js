// if you're using a bundler, first import:
import Headroom from 'headroom.js';
// grab an element
const siteHeader = document.querySelector('header');
// construct an instance of Headroom, passing the element
const headroom = new Headroom(siteHeader, {
	offset: 32,
	tolerance: 3,
	classes: {
		initial: 'animated',
		pinned: 'slide-down',
		unpinned: 'slide-up',
		top: 'bg-transparent',
		notTop: 'bg-white shadow-sm',
	},
});
// initialize
headroom.init();
