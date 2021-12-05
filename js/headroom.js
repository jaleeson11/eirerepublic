import Headroom from '../node_modules/headroom.js/dist/headroom.min.js';

const header = document.querySelector('.navbar');
const headroom  = new Headroom(header, {
    offset: 150
});

headroom.init();
