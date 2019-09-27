<script src="{{ ___('/admin/ace/ace.js') }}"></script>
<script src="{{ plugin_res('/admin/ace/ext-language_tools.js') }}"></script>
<script src="{{ plugin_res('/admin/ace/theme-monokai.js') }}"></script>
<script>
    function aceEdit(obj, putObj) {
        editor = ace.edit(obj);
        editor.setTheme("ace/theme/terminal");
        editor.session.setMode("ace/mode/json");
        editor.getSession().on('change', function (e) {
            $(putObj).val(editor.getValue());
        });
        editor.setTheme("ace/theme/monokai");
    }
</script>