(function($){

	PDFUpload = {
		_singlePDFSelector: null,

		_init: function()
		{
			
			$(document).on('click', '.fl-pdf-field .fl-pdf-select', PDFUpload._selectSinglePDF);
			$(document).on('click', '.fl-pdf-field .fl-pdf-replace', PDFUpload._selectSinglePDF);
			$(document).on('click', '.fl-pdf-field .fl-pdf-remove', PDFUpload._removeSinglePDF);
			
		},

		_selectSinglePDF: function()
		{ 
			if(PDFUpload._singlePDFSelector === null) {
			
				PDFUpload._singlePDFSelector = wp.media({
					title: 'Select File',
					button: { text: 'Select File' },
					library : { },
					multiple: false
				}); 
			}
			
			PDFUpload._singlePDFSelector.once('select', $.proxy(PDFUpload._singlePDFSelected, this));
			PDFUpload._singlePDFSelector.open();
		},

		_singlePDFSelected: function()
		{
			var pdf	  = PDFUpload._singlePDFSelector.state().get('selection').first().toJSON(),
				wrap	   = $(this).closest('.fl-pdf-field'),
				image	  = wrap.find('.fl-pdf-preview-img img'),
				filename   = wrap.find('.fl-pdf-preview-filename'),
				pdfField = wrap.find('input[type=hidden]');
			
			image.attr('src', pdf.icon);
			filename.html(pdf.filename);
			wrap.removeClass('fl-pdf-empty');
			wrap.find('label.error').remove();
			pdfField.val(pdf.id).trigger('change');
		},

		_removeSinglePDF: function()
		{
			var wrap	   = $(this).closest('.fl-pdf-field'),
				image	  = wrap.find('.fl-pdf-preview-img img'),
				filename   = wrap.find('.fl-pdf-preview-filename'),
				pdfField = wrap.find('input[type=hidden]');
				
			image.attr('src', '');
			filename.html('');
			wrap.addClass('fl-pdf-empty');
			pdfField.val('').trigger('change');
		}

	};
	
	$(function(){
		PDFUpload._init();
// 		console.log("post init");
	});
    
})(jQuery);
