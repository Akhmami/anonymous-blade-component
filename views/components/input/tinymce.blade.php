<div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="tinymce.init({
    target: $refs.tinymce,
    themes: 'modern',
    height: 500,
    menubar: false,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
        'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | ' +
        'bold italic underline | alignleft aligncenter ' +
        'alignright | bullist numlist outdent indent removeformat | ' +
        'image link code | help',
    setup: function(editor) {
        editor.on('blur', function(e) {
            value = editor.getContent()
        })
        editor.on('init', function(e) {
            if (value != null) {
                editor.setContent(value)
            }
        })

        function putCursorToEnd() {
            editor.selection.select(editor.getBody(), true);
            editor.selection.collapse(false);
        }
        $watch('value', function(newValue) {
            if (newValue !== editor.getContent()) {
                editor.resetContent(newValue || '');
                putCursorToEnd();
            }
        });
    }
})" wire:ignore>
    <div>
        <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model') }}>
    </div>
</div>
