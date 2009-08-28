function openNav() {
	var targetDiv = $('slidebar');
	new Effect.BlindDown(targetDiv,{duration: 0.5});
	new Effect.Fade('openSlidebar');
	Effect.Appear('closeSlidebar', {delay: 1});
}
function closeNav() {
	var targetDiv = $('slidebar');
	new Effect.BlindUp(targetDiv,{duration: 0.5});
	new Effect.Fade('closeSlidebar'); 
	Effect.Appear('openSlidebar', {delay: 1});
}