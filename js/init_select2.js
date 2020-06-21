(function($) {
	$(document).ready(function(){
		var select_usluge = $('.s2');
		if(select_usluge)
		{
			select_usluge.select2({
				width: '100%',
      			placeholder: 'Kliknite ovdje za odabir usluge'
			});
		}
	});
})(jQuery);