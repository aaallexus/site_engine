$(document).ready(function(){
	$('.categorytree-container').each(function(){
		var self=this;
		var body=$(this).next().next();
		if($(this).prev().val()=='')
		{
			$(this).empty();
			$(this).append('<ul><li></li></ul>');
		}
		else
		{
			value=$(this).prev().val().split(',');
			$(this).empty();
			$(this).append('<ul>');
			var array=new Array();
			$.each(value,function(){
				if(this!='')
				{
					if($.inArray(this*1,array)==-1)
					{
						$('ul',self).append('<li>'+$('li[data-id-record='+(this*1)+'] > span',body).text()+'</li>');
						array.push(this*1);
					}
				}
			});
			delete array;
		}
	});
	$('.categorytree-container').click(function(){
		background=$(this).next();
		var body=background.next();
		value=$(this).prev().val().split(',');
		if(body.is(':hidden'))
		{
			$.each(value,function(){
				if(this!='')
					$('li[data-id-record='+this+'] > input:checkbox',body).prop('checked',true);
			});
			background.show();
			body.show();
		}
		else
		{
			background.show();
			body.hide();
		}
		delete body;
	});
	$('.categorytree-background').click(function(){
		body=$(this).next();
		value=$(this).prev().prev();
		text=$(this).prev();
		value.val('');
		text.empty();
		values=new Array();
		titles=new Array();
		titles.push('<ul>');
		if($('input:checkbox:checked',body).length==0)
		{
			titles.push('<li></li>');
		}
		else
		{
			$('input:checkbox:checked',body).each(function(){
				values.push($(this).parent().attr('data-id-record'));
				titles.push('<li>'+$(this).next().text()+'</li>');
			});
		}
		titles.push('</ul>');
		value.val(values.join(','));
		text.html(titles.join(''));
		$(this).next().hide();
		$(this).hide();
	});
});