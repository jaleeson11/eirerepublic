export function initHeadroom() {
	const header = document.querySelector('.navbar');
	const headroom  = new Headroom(header, {
    offset: 150
	});

	headroom.init();
}