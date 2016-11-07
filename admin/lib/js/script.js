function transitionTo(url){
	window.location=url;
}

$(document).ready(function(){
	if(!$('#link_field').prop('readonly'))
	{
		$('#name_field').liTranslit({
			elAlias: $('#link_field')
		});
	}
});