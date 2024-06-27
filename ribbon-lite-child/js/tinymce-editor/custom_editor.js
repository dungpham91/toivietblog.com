/*----------------------------------------------------
 * Add button to TinyMCE Editor
 *--------------------------------------------------*/
jQuery(function(){

	tinymce.PluginManager.add('custom_mce_editor_js',function(editor, url){

		editor.addButton("button_note",{
			autofocus: false,
			disabled: false,
			hidden: false,
			tooltip: "Insert a note paragraph",
			title : 'Insert Note',
			cmd : 'db_note_function',
			image: url + '/note.png',
		});

		editor.addButton("button_warning",{
			autofocus: false,
			disabled: false,
			hidden: false,
			tooltip: "Insert a warning paragraph",
			title : 'Insert Warning',
			cmd : 'db_warning_function',
			image: url + '/warning.png',
		});

		editor.addButton("button_recommended",{
			autofocus: false,
			disabled: false,
			hidden: false,
			tooltip: "Insert a recommended paragraph",
			title : 'Insert Recommended',
			cmd : 'db_recommended_function',
			image: url + '/recommended.png',
		});

		editor.addButton("button_tips",{
			autofocus: false,
			disabled: false,
			hidden: false,
			tooltip: "Insert a tips paragraph",
			title : 'Insert Tips',
			cmd : 'db_tips_function',
			image: url + '/tips.png',
		});

		editor.addCommand("db_note_function",function(){
			selected = tinyMCE.activeEditor.selection.getContent();
			if( selected ){
				content =  '<p class="mce-note">'+selected+'</p>';
			}else{
				content =  '<p class="mce-note"><strong>Note: </strong>Add your note here.</p>';
			}
			tinymce.execCommand('mceInsertContent', false, content);
		});

		editor.addCommand("db_warning_function",function(){
			selected = tinyMCE.activeEditor.selection.getContent();
			if( selected ){
				content =  '<p class="mce-warning">'+selected+'</p>';
			}else{
				content =  '<p class="mce-warning"><strong>Warning: </strong>Add your warning here.</p>';
			}
			tinymce.execCommand('mceInsertContent', false, content);
		});

		editor.addCommand("db_recommended_function",function(){
			selected = tinyMCE.activeEditor.selection.getContent();
			if( selected ){
				content =  '<p class="mce-recommended">'+selected+'</p>';
			}else{
				content =  '<p class="mce-recommended"><strong>Recommended Reading: </strong>Add your recommended here.</p>';
			}
			tinymce.execCommand('mceInsertContent', false, content);
		});

		editor.addCommand("db_tips_function",function(){
			selected = tinyMCE.activeEditor.selection.getContent();
			if( selected ){
				content =  '<p class="mce-tips">'+selected+'</p>';
			}else{
				content =  '<p class="mce-tips"><strong>Tips: </strong>Add your tips here.</p>';
			}
			tinymce.execCommand('mceInsertContent', false, content);
		});

	});

});
