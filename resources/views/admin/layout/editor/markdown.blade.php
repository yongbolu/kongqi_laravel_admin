<link rel="stylesheet" href="{{ ___('admin/js/simple/simplemde.min.css') }}?v=2">
<link rel="stylesheet" type="text/css" href="{{ ___('admin/js/simple/view.css') }}">
<script src="{{ ___('admin/js/simple/simplemde.min.js') }}"></script>
<script src="{{ ___('admin/js/simple/simplemde_extend_kq.js') }}"></script>
<script src="{{ ___('admin/js/simple/highlight.pack.js') }}"></script>
<script src="{{ ___('admin/js/simple/codemirror-4.inline-attachment.js') }}"></script>
<link rel="stylesheet" href="{{ ___('icon/fa/css/font-awesome.css') }}">
<script>
    function simple_markdown(Obj, cacheName) {
        var cacheName = cacheName || 'MyUniqueID';
        var simplemde = new SimpleMDE({
            element: document.getElementById(Obj),
            spellChecker: false,
            forceSync:true,//同步textare
            autosave: {
                enabled: true,
                uniqueId: cacheName,
                delay: 1000,
            },
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            status: false,
            autoDownloadFontAwesome:false,//fa图标取消下载，手动引入
            toolbar: [

                {
                    name: "undo",
                    action: SimpleMDE.undo,
                    className: "fa fa-undo no-disable",
                    title: "撤销"
                },
                {
                    name: "redo",
                    action: SimpleMDE.redo,
                    className: "fa fa-repeat no-disable",
                    title: "重做"
                },
                {
                    name: "h1",
                    action: SimpleMDE.toggleHeading1,
                    className: "fa-b fa-1",
                    title: "标题1"
                },
                {
                    name: "h2",
                    action: SimpleMDE.toggleHeading2,
                    className: "fa-b fa-2",
                    title: "标题2"
                },
                {
                    name: "h3",
                    action: SimpleMDE.toggleHeading3,
                    className: "fa-b fa-3",
                    title: "标题3"
                },
                {
                    name: "h4",
                    action: function customFunction(editor) {
                        SimpleToggleHeading(editor, 4)
                    },
                    className: "fa-b fa-4",
                    title: "标题4",
                },

                {
                    name: "quote",
                    action: SimpleMDE.toggleBlockquote,
                    className: "fa fa-quote-left",
                    title: "块",
                    default: true
                },
                {
                    name: "bold",
                    action: SimpleMDE.toggleBold,
                    className: "fa fa-bold",
                    title: "加粗"
                },
                {
                    name: "italic",
                    action: SimpleMDE.toggleItalic,
                    className: "fa fa-italic",
                    title: "斜体"
                }
                ,
                {
                    name: "strikethrough",
                    action: SimpleMDE.toggleStrikethrough,
                    className: "fa fa-strikethrough",
                    title: "删除线"
                },

                {
                    name: "code",
                    action: SimpleMDE.toggleCodeBlock,
                    className: "fa fa-code",
                    title: "代码"
                }
                ,

                {
                    name: "align-left",
                    action: function (editor) {
                        SimpleToggleHeading(editor, 'left');
                    },
                    className: "fa fa-align-left",
                    title: "左对齐"
                }
                ,

                {
                    name: "align-left",
                    action: function (editor) {
                        SimpleToggleHeading(editor, 'center');
                    },
                    className: "fa fa-align-justify",
                    title: "居中"
                }
                ,

                {
                    name: "align-left",
                    action: function (editor) {
                        SimpleToggleHeading(editor, 'right');
                    },
                    className: "fa fa-align-right",
                    title: "右对齐"
                }
                ,

                {
                    name: "ordered-list",
                    action: SimpleMDE.toggleOrderedList,
                    className: "fa fa-list-ol",
                    title: "有序"
                }
                ,

                {
                    name: "unordered-list",
                    action: SimpleMDE.toggleOrderedList,
                    className: "fa fa-list-ul",
                    title: "无序"
                }
                ,

                {
                    name: "link",
                    action: SimpleMDE.drawLink,
                    className: "fa fa-link",
                    title: "链接"
                }
                ,

                {
                    name: "link",
                    action: function(editor){
                        SimpleDrawImg(editor);
                    },
                    className: "fa fa-picture-o",
                    title: "图片"
                }
                ,

                {
                    name: "table",
                    action: SimpleMDE.drawTable,
                    className: "fa fa-table",
                    title: "链接"
                },
                {
                    name: "horizontal-rule",
                    action: SimpleMDE.drawHorizontalRule,
                    className: "fa fa-minus",
                    title: "水平线"
                },
                {
                    name: "side-by-side",
                    action: function (editor) {
                        SimpletoggleSideBySide(editor);
                    },
                    className: "fa fa-columns no-disable no-mobile",
                    title: "预览模式",
                    default: true
                },
                {
                    name: "fullscreen",
                    action: SimpleMDE.toggleFullScreen,
                    className: "fa fa-arrows-alt no-disable no-mobile",
                    title: "全屏",
                    default: true
                },
                {
                    name: "page",
                    action: function (editor) {
                        SimpletogglePager(editor);
                    },
                    className: "fa fa-paragraph no-disable no-mobile",
                    title: "插入分页",
                    default: true
                },
            ]
        });
        //默认预览
        SimpletoggleSideBySide(simplemde);
        var inlineAttachmentConfig = {
            uploadUrl: g_upload_url,               //后端上传图片地址
            uploadFieldName: 'file',          //POST字段的名称
            jsonFieldName: 'path',              //返回结果中图片地址对应的字段名称
            progressText: '![图片上传中...]()',    //上传过程中用户看到的文案
            errorText: '图片上传失败',
            urlText: '![描述]({filename})',    //上传成功后插入编辑器中的文案，{filename} 会被替换成图片地址
            extraHeaders: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        };
        inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, inlineAttachmentConfig);

        return simplemde;

    }
</script>